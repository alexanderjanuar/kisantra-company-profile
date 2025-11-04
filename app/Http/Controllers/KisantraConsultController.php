<?php

namespace App\Http\Controllers;

use App\Mail\KisantraConsultMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class KisantraConsultController extends Controller
{
    public function create()
    {
        // Your Blade file from earlier
        return view('kisantra-session');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'         => ['required','string','max:200'],
            'usaha'        => ['nullable','string','max:200'],
            'npwp'         => ['nullable','string','max:100'],
            'jenis_usaha'  => ['nullable','string','max:200'],
            'alamat'       => ['nullable','string','max:1000'],
            'telepon'      => ['required','regex:/^08\d{8,12}$/'],
            'email'        => ['required','email','max:200'],
            'topik'        => ['required','string','max:3000'],
            'sumber'       => ['nullable','string','max:200'],
            'persetujuan'  => ['required','string'],
        ], [
            'telepon.regex' => 'Nomor HP/WA harus diawali 08 dan panjang 10–14 digit.',
            'persetujuan.required' => 'Persetujuan diundang ke grup harus dipilih.',
        ]);

        try {
            // Send to Kisantra inbox
            Mail::to('kisantra.official@gmail.com')->send(new KisantraConsultMail($data));

            // (Optional) auto-reply to participant
            // Mail::to($data['email'])->send(new KisantraConsultMail($data, true));

            return back()->with('status', 'Pendaftaran berhasil dikirim. Cek email Anda untuk info selanjutnya.');
        } catch (\Throwable $e) {
            Log::error('Kisantra session mail failed: '.$e->getMessage());
            return back()
                ->withErrors(['email' => 'Maaf, terjadi kendala saat mengirim email. Coba lagi beberapa saat.'])
                ->withInput();
        }
    }
}