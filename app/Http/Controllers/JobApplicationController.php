<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Mail\JobApplicationMail;
use Illuminate\Support\Facades\Log;
use App\Models\JobPosting;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required|integer',
            'job_title' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'alamat' => 'required|string|max:500',
            'linkedin_url' => 'nullable|url',
            'source' => 'required|string',
            'cover_letter' => 'nullable|string',
            'files.*' => 'required|file|mimes:pdf,doc,docx|max:5120', // Max 5MB per file
        ]);

        try {
            Log::info('[JobApplication] Step 1: Validation passed', $validated);

            $uploadedFiles = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('resumes', 'public');
                    $uploadedFiles[] = [
                        'path' => storage_path('app/public/' . $path),
                        'name' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType(),
                    ];
                }
                Log::info('[JobApplication] Step 2: Files uploaded', ['files' => array_column($uploadedFiles, 'name')]);
            } else {
                Log::info('[JobApplication] Step 2: No files attached');
            }

            // --- EXTERNAL API INTEGRATION ---
            try {
                $job = JobPosting::find($validated['job_id']);
                $division = $job ? $job->division : 'General'; // Default to General if not found

                $departmentMap = [
                    'Digital Marketing' => 1,
                    'Sistem Digital' => 2,
                    'Administrasi Pajak' => 3,
                    'HR' => 4,
                ];
                $deptId = $departmentMap[$division] ?? 4; // Default to HR (4) if unknown

                Log::info('[JobApplication] API Step: Preparing to send to external API', [
                    'job_id' => $validated['job_id'],
                    'division' => $division,
                    'dept_id' => $deptId
                ]);

                $pendingRequest = Http::timeout(45); // Increased timeout for file uploads

                // Attach files for API
                if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {
                         $pendingRequest->attach(
                            'file_terkait[]',
                            file_get_contents($file->getRealPath()),
                            $file->getClientOriginalName()
                        );
                    }
                }

                $response = $pendingRequest->post('https://attendance.kisantra.com/api/job-applications', [
                    // USER INPUT
                    'nama' => $validated['name'],
                    'email' => $validated['email'],
                    'nomor_telepon' => $validated['phone'],
                    'alamat' => $validated['alamat'],
                    'linkedin_url' => $validated['linkedin_url'],
                    'sumber' => $validated['source'],
                    'cover_letter' => $validated['cover_letter'],

                    // DEVELOPER AUTO-FILL
                    'posisi' => $validated['job_title'],
                    'department_id' => $deptId,
                ]);

                if ($response->successful()) {
                    Log::info('[JobApplication] API Step: Success', $response->json());
                } else {
                    Log::error('[JobApplication] API Step: Failed', [
                        'status' => $response->status(),
                    ]);
                    // We log but do NOT throw exception to ensure email backup still works
                    // OR we should throw? User said "Apply the api".
                    // Usually better to have at least one successful logic.
                    // If API fails, we still want to receive the email application.
                }

            } catch (\Exception $e) {
                Log::error('[JobApplication] API Step: Exception', ['message' => $e->getMessage()]);
                // Continue to email sending
            }
            // --------------------------------

            $emailData = [
                'job_id' => $validated['job_id'],
                'job_title' => $validated['job_title'],
                'applicant_name' => $validated['name'],
                'applicant_email' => $validated['email'],
                'applicant_phone' => $validated['phone'] ?? '-',
                'applicant_address' => $validated['alamat'],
                'linkedin_url' => $validated['linkedin_url'] ?? '-',
                'source' => $validated['source'] ?? '-',
                'cover_letter' => $validated['cover_letter'] ?? '-',
                'files' => $uploadedFiles,
            ];

            Log::info('[JobApplication] Step 3: Email data prepared, sending to HR...');

            Mail::to('hr.kisantra@gmail.com')
                ->send(new JobApplicationMail($emailData));

            Log::info('[JobApplication] Step 4: HR email sent, sending confirmation to applicant...');

            Mail::to($validated['email'])
                ->send(new \App\Mail\ApplicationConfirmationEmail(
                    $emailData,
                    $validated['job_title'],
                    $validated['name'],
                    $uploadedFiles
                ));

            Log::info('[JobApplication] Step 5: Confirmation email sent. All done.');

            return redirect()->back()->with('success', 'Application submitted successfully');

        } catch (\Exception $e) {
            Log::error('[JobApplication] FAILED at: ' . $e->getMessage());
            Log::error('[JobApplication] Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()->withErrors([
                'server' => 'Gagal mengirim lamaran. Silakan coba lagi.',
            ]);
        }
    }
}
