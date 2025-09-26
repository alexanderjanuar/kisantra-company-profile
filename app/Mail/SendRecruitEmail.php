<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use App\Models\JobPosting;

class SendRecruitEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $applicationData;
    public $jobPosting;
    public $filePaths;

    /**
     * Create a new message instance.
     */
    public function __construct($applicationData, JobPosting $jobPosting, $filePaths = [])
    {
        $this->applicationData = $applicationData;
        $this->jobPosting = $jobPosting;
        $this->filePaths = $filePaths;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Lamaran Kerja: ' . $this->jobPosting->title . ' - ' . $this->applicationData['nama_lengkap'],
            replyTo: $this->applicationData['email_aktif'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.job-application',
            with: [
                'applicationData' => $this->applicationData,
                'jobPosting' => $this->jobPosting,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        
        if ($this->filePaths) {
            foreach ($this->filePaths as $filePath) {
                if (file_exists(storage_path('app/public/' . $filePath))) {
                    $attachments[] = Attachment::fromStorageDisk('public', $filePath);
                }
            }
        }
        
        return $attachments;
    }
}