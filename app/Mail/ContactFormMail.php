<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    /**
     * Create a new message instance.
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pesan Kontak Baru dari ' . $this->contactData['first_name'] . ' ' . $this->contactData['last_name'],
            replyTo: [
                new Address($this->contactData['email'], $this->contactData['first_name'] . ' ' . $this->contactData['last_name']),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'first_name' => $this->contactData['first_name'],
                'last_name' => $this->contactData['last_name'],
                'email' => $this->contactData['email'],
                'country_code' => $this->contactData['country_code'],
                'phone' => $this->contactData['phone'],
                'contactData' => $this->contactData,
                'services' => $this->contactData['services'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}