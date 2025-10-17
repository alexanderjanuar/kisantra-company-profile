<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;

class Index extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $country_code = 'ID';
    public $phone = '';
    public $message = '';
    public $services = [];

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'message' => 'required|string|max:1000',
        'services' => 'required|array|min:1',
    ];

    protected $messages = [
        'first_name.required' => 'Nama depan wajib diisi',
        'last_name.required' => 'Nama belakang wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Masukkan alamat email yang valid',
        'phone.required' => 'Nomor telepon wajib diisi',
        'message.required' => 'Pesan wajib diisi',
        'services.required' => 'Pilih minimal satu layanan',
        'services.min' => 'Pilih minimal satu layanan',
    ];

    public function submit()
    {
        $this->validate();

        // Prepare contact data
        $contactData = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'country_code' => $this->country_code,
            'phone' => $this->phone,
            'message' => $this->message,
            'services' => $this->services,
        ];

        // Send email
        try {
            Mail::to('kisantra.official@gmail.com')->send(new ContactFormMail($contactData));

            // Log successful email
            Log::info('Contact email sent successfully', $contactData);

            session()->flash('success', 'Terima kasih telah menghubungi kami! Kami akan segera merespons pesan Anda.');
            
            // Reset form after successful submission
            $this->reset([
                'first_name',
                'last_name',
                'email',
                'phone',
                'message',
                'services'
            ]);

        } catch (\Exception $e) {
            // Log the error
            Log::error('Contact email failed: ' . $e->getMessage());
            
            session()->flash('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.contact.index')
            ->layout('layouts.app');
    }
}