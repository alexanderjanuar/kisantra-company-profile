<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationMail;
use Illuminate\Support\Facades\Log;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required',
            'job_title' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        try {
            // Store resume file
            $resumePath = $request->file('resume')->store('resumes', 'public');

            // Prepare email data
            $emailData = [
                'job_id' => $validated['job_id'],
                'job_title' => $validated['job_title'],
                'applicant_name' => $validated['name'],
                'applicant_email' => $validated['email'],
                'applicant_phone' => $validated['phone'],
                'cover_letter' => $validated['cover_letter'],
                'resume_path' => storage_path('app/public/' . $resumePath),
                'resume_name' => $request->file('resume')->getClientOriginalName(),
            ];

            // Send email to recruitment
            Mail::to('hr.kisantra@gmail.com')->send(new JobApplicationMail($emailData));

            return response()->json([
                'message' => 'Application submitted successfully',
                'data' => $emailData
            ], 200);

        } catch (\Exception $e) {
            Log::error('Job application error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to submit application',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
