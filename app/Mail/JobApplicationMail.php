<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class JobApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $jobId;
    public $jobTitle;
    public $applicantName;
    public $applicantEmail;
    public $applicantPhone;
    public $coverLetter;
    public $resumePath;
    public $resumeName;

    /**
     * Create a new message instance.
     */
    public function __construct($emailData)
    {
        $this->jobId = $emailData['job_id'];
        $this->jobTitle = $emailData['job_title'];
        $this->applicantName = $emailData['applicant_name'];
        $this->applicantEmail = $emailData['applicant_email'];
        $this->applicantPhone = $emailData['applicant_phone'];
        $this->coverLetter = $emailData['cover_letter'];
        $this->resumePath = $emailData['resume_path'];
        $this->resumeName = $emailData['resume_name'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Job Application: ' . $this->jobTitle . ' - ' . $this->applicantName,
            replyTo: [$this->applicantEmail],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.job-application-recruitment',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->resumePath)
                ->as($this->resumeName)
        ];
    }
}
