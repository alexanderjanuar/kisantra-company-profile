<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationData;
    public $jobTitle;
    public $applicantName;
    public $applicantEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($applicationData, $jobTitle, $applicantName, $applicantEmail)
    {
        $this->applicationData = $applicationData;
        $this->jobTitle = $jobTitle;
        $this->applicantName = $applicantName;
        $this->applicantEmail = $applicantEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Lamaran Kerja: ' . $this->jobTitle . ' - ' . $this->applicantName,
            replyTo: [$this->applicantEmail],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.job-application-simple',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}