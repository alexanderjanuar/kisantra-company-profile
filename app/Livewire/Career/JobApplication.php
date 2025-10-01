<?php

namespace App\Livewire\Career;

use App\Models\JobPosting;
use Illuminate\Support\Facades\Mail;
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

    // Predefined options
    public $sumberInfoOptions = [
        'Instagram' => 'Instagram',
        'Facebook' => 'Facebook',
        'LinkedIn' => 'LinkedIn',
        'Website Perusahaan' => 'Website Perusahaan',
        'Teman Dekat' => 'Teman Dekat',
        'Keluarga' => 'Keluarga',
        'Job Portal' => 'Job Portal',
        'Koran/Media Cetak' => 'Koran/Media Cetak',
        'Lainnya' => 'Lainnya'
    ];

    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'alamat' => 'required|string|max:500',
        'nomor_telepon' => 'required|string|max:20',
        'email_aktif' => 'required|email|max:255',
        'sumber_info' => 'required|string',
        'sumber_info_lainnya' => 'required_if:sumber_info,Lainnya|nullable|string|max:255',
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

    public function updatedDivisi()
    {
        $this->divisi = $this->jobPosting->division ?: 'Lainnya';
    }

    public function updatedNamaPosisi()
    {
        $this->nama_posisi = $this->jobPosting->title;
    }

    public function updatedSumberInfo()
    {
        if ($this->sumber_info !== 'Lainnya') {
            $this->sumber_info_lainnya = '';
        }
    }

    // This method is called automatically when files are uploaded
    public function updatedFiles()
    {
        // Validate files immediately after upload
        $this->validateOnly('files.*');
    }

    public function removeFile($index)
    {
        // Remove file from array
        if (isset($this->files[$index])) {
            unset($this->files[$index]);
            $this->files = array_values($this->files); // Re-index array
        }
    }

    public function submitApplication()
    {
        $this->isSubmitting = true;
        
        try {
            $this->validate();

            $finalSumberInfo = $this->sumber_info === 'Lainnya' 
                ? $this->sumber_info_lainnya 
                : $this->sumber_info;

            $applicationData = [
                'nama_lengkap' => $this->nama_lengkap,
                'alamat' => $this->alamat,
                'nomor_telepon' => $this->nomor_telepon,
                'email_aktif' => $this->email_aktif,
                'divisi' => $this->divisi,
                'nama_posisi' => $this->nama_posisi,
                'sumber_info' => $finalSumberInfo,
                'applied_at' => now()->format('d F Y, H:i:s'),
            ];

            $recruitmentEmail = env('RECRUITMENT_EMAIL', 'recruitment@kisantra.com');
            
            // Send email to HR/Recruitment with files attached
            Mail::to($recruitmentEmail)->send(new \App\Mail\JobApplicationEmail(
                $applicationData,
                $this->jobPosting->title,
                $this->nama_lengkap,
                $this->email_aktif,
                $this->files // Files are passed here
            ));

            // Send confirmation email to applicant
            Mail::to($this->email_aktif)->send(new \App\Mail\ApplicationConfirmationEmail(
                $applicationData,
                $this->jobPosting->title,
                $this->nama_lengkap,
                $this->files // Add files parameter
            ));

            $this->showSuccessMessage = true;
            $this->resetForm();

        } catch (\Exception $e) {
            $this->addError('general', 'Terjadi kesalahan saat mengirim lamaran: ' . $e->getMessage());
            \Log::error('Job application email error: ' . $e->getMessage());
        } finally {
            $this->isSubmitting = false;
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
            'sumber_info', 'sumber_info_lainnya', 'files'
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