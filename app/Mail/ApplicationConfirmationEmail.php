<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class ApplicationConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationData;
    public $jobTitle;
    public $applicantName;
    public $files;

    /**
     * Create a new message instance.
     */
    public function __construct($applicationData, $jobTitle, $applicantName, $files = [])
    {
        $this->applicationData = $applicationData;
        $this->jobTitle = $jobTitle;
        $this->applicantName = $applicantName;
        $this->files = $files;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Lamaran - ' . $this->jobTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.application-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $attachments = [];

        // Add uploaded files as attachments
        if (!empty($this->files)) {
            foreach ($this->files as $file) {
                 $attachments[] = Attachment::fromPath($file['path'])
                    ->as($file['name'])
                    ->withMime($file['mime']);
            }
        }

        return $attachments;
    }
}