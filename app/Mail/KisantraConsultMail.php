<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KisantraConsultMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public bool $isAutoReply;

    /**
     * @param array $data  Form payload
     * @param bool $isAutoReply  true if sending to participant
     */
    public function __construct(array $data, bool $isAutoReply = false)
    {
        $this->data = $data;
        $this->isAutoReply = $isAutoReply;
    }

    public function build()
    {
        $subject = $this->isAutoReply
            ? 'Terima Kasih – Sesi Tanya Kisantra'
            : 'Pendaftaran Baru – Sesi Tanya Kisantra';

        return $this->subject($subject)
            ->replyTo($this->data['email'], $this->data['nama']) // helps direct replies
            ->view('emails.kisantra-consult');
    }
}
