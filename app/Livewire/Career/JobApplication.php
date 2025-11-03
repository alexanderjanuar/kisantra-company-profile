<?php

namespace App\Livewire\Career;

use App\Models\JobPosting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobApplication extends Component
{
    use WithFileUploads;

    public JobPosting $jobPosting;
    
    // Form fields
    public $nama_lengkap = '';
    public $alamat = '';
    public $nomor_telepon = '';
    public $email_aktif = '';
    public $divisi = '';
    public $nama_posisi = '';
    public $sumber_info = '';
    public $sumber_info_lainnya = '';
    public $files = [];
    
    // UI states
    public $isSubmitting = false;
    public $showSuccessMessage = false;
    public $apiResponse = null;

    // API Configuration
    public $apiUrl = 'https://attendance.kisantra.com/api/job-applications';

    // Predefined options - Map to API enum values
    public $sumberInfoOptions = [
        'instagram' => 'Instagram',
        'facebook' => 'Facebook',
        'linkedin' => 'LinkedIn',
        'website' => 'Website Perusahaan',
        'referral' => 'Referral/Teman',
        'jobstreet' => 'Job Portal',
        'indeed' => 'Indeed',
        'walk_in' => 'Walk In',
        'twitter' => 'Twitter',
        'other' => 'Lainnya'
    ];

    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'alamat' => 'required|string|max:500',
        'nomor_telepon' => 'required|string|max:20',
        'email_aktif' => 'required|email|max:255',
        'sumber_info' => 'required|string',
        'sumber_info_lainnya' => 'required_if:sumber_info,other|nullable|string|max:255',
        'files.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120', // 5MB max per file
    ];

    protected $messages = [
        'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
        'alamat.required' => 'Alamat wajib diisi.',
        'nomor_telepon.required' => 'Nomor telepon (WA) wajib diisi.',
        'email_aktif.required' => 'Email aktif wajib diisi.',
        'email_aktif.email' => 'Format email tidak valid.',
        'sumber_info.required' => 'Sumber informasi pekerjaan wajib dipilih.',
        'sumber_info_lainnya.required_if' => 'Mohon sebutkan sumber informasi lainnya.',
        'files.*.mimes' => 'File harus berformat PDF, DOC, DOCX, JPG, JPEG, atau PNG.',
        'files.*.max' => 'Ukuran file maksimal 5MB.',
    ];

    public function mount(JobPosting $jobPosting)
    {
        if ($jobPosting->status !== 'active') {
            abort(404, 'Job posting is no longer available.');
        }

        if ($jobPosting->application_deadline && now()->gt($jobPosting->application_deadline)) {
            abort(410, 'Application deadline has passed.');
        }

        $this->jobPosting = $jobPosting;
        $this->divisi = $jobPosting->division ?: 'Lainnya';
        $this->nama_posisi = $jobPosting->title;
    }

    public function updatedSumberInfo()
    {
        if ($this->sumber_info !== 'other') {
            $this->sumber_info_lainnya = '';
        }
    }

    public function updatedFiles()
    {
        $this->validateOnly('files.*');
    }

    public function removeFile($index)
    {
        if (isset($this->files[$index])) {
            unset($this->files[$index]);
            $this->files = array_values($this->files);
        }
    }

    public function submitApplication()
    {
        $this->isSubmitting = true;
        
        try {
            $this->validate();

            // Determine final source
            $finalSumberInfo = $this->sumber_info === 'other' 
                ? $this->sumber_info_lainnya 
                : $this->sumber_info;

            // Get departments from API first (to get the correct department_id)
            $departmentId = $this->getDepartmentFromAPI();

            // Submit to API
            $apiResponse = $this->submitToAPI($departmentId, $finalSumberInfo);

            if ($apiResponse && $apiResponse['success']) {
                $this->apiResponse = $apiResponse;
                
                // Send emails with API response data
                $this->sendEmails($finalSumberInfo, $apiResponse['data']);
                
                $this->showSuccessMessage = true;
                $this->resetForm();
            } else {
                // Handle API validation errors and other errors
                $this->handleApiErrors($apiResponse);
                return;
            }

        } catch (\Exception $e) {
            $this->addError('general', 'Terjadi kesalahan saat mengirim lamaran: ' . $e->getMessage());
            \Log::error('Job application API error: ' . $e->getMessage(), [
                'user_email' => $this->email_aktif,
                'position' => $this->nama_posisi,
                'api_url' => $this->apiUrl,
                'trace' => $e->getTraceAsString()
            ]);
        } finally {
            $this->isSubmitting = false;
        }
    }

    private function handleApiErrors($apiResponse)
    {
        if (!$apiResponse) {
            $this->addError('general', 'Tidak dapat terhubung ke server. Silakan coba lagi.');
            return;
        }

        // Handle validation errors from API
        if (isset($apiResponse['errors'])) {
            $errors = $apiResponse['errors'];
            
            // Map API field names to Livewire field names
            $fieldMapping = [
                'nama' => 'nama_lengkap',
                'alamat' => 'alamat',
                'nomor_telepon' => 'nomor_telepon',
                'email' => 'email_aktif',
                'posisi' => 'nama_posisi',
                'sumber' => 'sumber_info',
                'daftar_melalui' => 'daftar_melalui',
                'files' => 'files',
                'files.*' => 'files'
            ];

            foreach ($errors as $field => $messages) {
                $livewireField = $fieldMapping[$field] ?? $field;
                
                if (is_array($messages)) {
                    $this->addError($livewireField, implode(' ', $messages));
                } else {
                    $this->addError($livewireField, $messages);
                }
            }
        } 
        // Handle general error message
        elseif (isset($apiResponse['message'])) {
            $this->addError('general', 'API Error: ' . $apiResponse['message']);
        } 
        // Fallback error
        else {
            $this->addError('general', 'Terjadi kesalahan pada server. Silakan coba lagi.');
        }
    }

    private function getDepartmentFromAPI()
    {
        try {
            // Get departments from API
            $response = Http::get($this->apiUrl . '/departments');
            
            if ($response->successful()) {
                $departments = $response->json()['data'] ?? [];
                
                // Find matching department by name or use the first one
                foreach ($departments as $dept) {
                    if (strtolower($dept['name']) === strtolower($this->divisi)) {
                        return $dept['id'];
                    }
                }
                
                // If no exact match, return first department or default to 1
                return !empty($departments) ? $departments[0]['id'] : 1;
            }
            
            // Fallback to department ID 1 if API fails
            return 1;
            
        } catch (\Exception $e) {
            \Log::warning('Failed to get departments from API: ' . $e->getMessage());
            return 1; // Default department ID
        }
    }

    private function submitToAPI($departmentId, $finalSumberInfo)
    {
        try {
            // Prepare form data
            $formData = [
                'nama' => $this->nama_lengkap,
                'alamat' => $this->alamat,
                'nomor_telepon' => $this->nomor_telepon,
                'email' => $this->email_aktif,
                'posisi' => $this->nama_posisi,
                'department_id' => $departmentId,
                'sumber' => $this->sumber_info,
                'daftar_melalui' => 'website',
                'catatan' => "Applied via company website for position: {$this->nama_posisi}. Division: {$this->divisi}. Source info: {$finalSumberInfo}",
            ];

            // Handle file uploads
            if (!empty($this->files)) {
                // For multipart form data with files
                $response = Http::timeout(30)->asMultipart();
                
                // Add form fields
                foreach ($formData as $key => $value) {
                    $response = $response->attach($key, $value);
                }
                
                // Add files
                foreach ($this->files as $index => $file) {
                    $response = $response->attach(
                        "files[{$index}]", 
                        file_get_contents($file->getRealPath()),
                        $file->getClientOriginalName()
                    );
                }
                
                $apiResponse = $response->post($this->apiUrl);
            } else {
                // JSON request if no files
                $apiResponse = Http::timeout(30)->asJson()->post($this->apiUrl, $formData);
            }

            // Parse response
            if ($apiResponse->successful()) {
                $responseData = $apiResponse->json();
                
                \Log::info('Job application submitted successfully to API', [
                    'response' => $responseData,
                    'email' => $this->email_aktif
                ]);
                
                return $responseData;
            } else {
                // Handle different HTTP status codes
                $status = $apiResponse->status();
                $errorData = $apiResponse->json();
                
                \Log::error('API submission failed', [
                    'status' => $status,
                    'response' => $errorData,
                    'response_body' => $apiResponse->body(),
                    'form_data' => $formData
                ]);

                // Return error data for proper handling
                return [
                    'success' => false,
                    'message' => $this->getStatusErrorMessage($status),
                    'errors' => $errorData['errors'] ?? null,
                    'api_message' => $errorData['message'] ?? 'Unknown API error',
                    'status' => $status
                ];
            }

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            \Log::error('API Connection failed: ' . $e->getMessage(), [
                'api_url' => $this->apiUrl,
                'form_data' => $formData ?? null
            ]);
            
            return [
                'success' => false,
                'message' => 'Tidak dapat terhubung ke server. Periksa koneksi internet Anda.',
                'errors' => null
            ];
        } catch (\Exception $e) {
            \Log::error('Exception during API submission: ' . $e->getMessage(), [
                'form_data' => $formData ?? null
            ]);
            
            return [
                'success' => false,
                'message' => 'Terjadi kesalahan teknis: ' . $e->getMessage(),
                'errors' => null
            ];
        }
    }

    private function getStatusErrorMessage($status)
    {
        return match($status) {
            400 => 'Data yang dikirim tidak valid.',
            401 => 'Tidak memiliki akses untuk mengirim lamaran.',
            403 => 'Akses ditolak oleh server.',
            404 => 'Endpoint API tidak ditemukan.',
            422 => 'Data validasi gagal.',
            429 => 'Terlalu banyak permintaan. Silakan coba lagi nanti.',
            500 => 'Server mengalami masalah internal.',
            502 => 'Server gateway bermasalah.',
            503 => 'Layanan tidak tersedia sementara.',
            504 => 'Koneksi ke server timeout.',
            default => "Server error (HTTP {$status})"
        };
    }

    private function sendEmails($finalSumberInfo, $apiResponseData)
    {
        $applicationData = [
            'nama_lengkap' => $this->nama_lengkap,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->nomor_telepon,
            'email_aktif' => $this->email_aktif,
            'divisi' => $this->divisi,
            'nama_posisi' => $this->nama_posisi,
            'sumber_info' => $finalSumberInfo,
            'applied_at' => now()->format('d F Y, H:i:s'),
            'api_response' => $apiResponseData,
            'application_id' => $apiResponseData['id'] ?? null,
            'api_saved' => true,
        ];

        $recruitmentEmail = env('RECRUITMENT_EMAIL', 'recruitment@kisantra.com');
        
        try {
            // Send email to HR/Recruitment with files attached
            Mail::to($recruitmentEmail)->send(new \App\Mail\JobApplicationEmail(
                $applicationData,
                $this->jobPosting->title,
                $this->nama_lengkap,
                $this->email_aktif,
                $this->files
            ));

            // Send confirmation email to applicant
            // Mail::to($this->email_aktif)->send(new \App\Mail\ApplicationConfirmationEmail(
            //     $applicationData,
            //     $this->jobPosting->title,
            //     $this->nama_lengkap,
            //     $this->files
            // ));

            \Log::info('Job application emails sent successfully', [
                'api_application_id' => $apiResponseData['id'] ?? null,
                'applicant_email' => $this->email_aktif
            ]);

        } catch (\Exception $e) {
            \Log::error('Failed to send application emails: ' . $e->getMessage(), [
                'api_application_id' => $apiResponseData['id'] ?? null,
                'applicant_email' => $this->email_aktif
            ]);
            // Don't throw - application is already saved via API
        }
    }

    public function backToJobs()
    {
        return redirect()->route('career.index');
    }

    private function resetForm()
    {
        $this->reset([
            'nama_lengkap', 'alamat', 'nomor_telepon', 'email_aktif', 
            'sumber_info', 'sumber_info_lainnya', 'files', 'apiResponse'
        ]);
        
        // Re-set the auto-filled fields
        $this->divisi = $this->jobPosting->division ?: 'Lainnya';
        $this->nama_posisi = $this->jobPosting->title;
    }

    public function render()
    {
        return view('livewire.career.job-application')
            ->layout('layouts.app')
            ->title('Lamar ' . $this->jobPosting->title . ' - Karir');
    }
}