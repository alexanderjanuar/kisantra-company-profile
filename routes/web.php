<?php

use App\Livewire\Career\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

// In routes/web.php
Route::get('/karir', Index::class)->name('career');
Route::get('/karir/{jobPosting}/apply', \App\Livewire\Career\JobApplication::class)->name('career.apply');

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email to verify SMTP configuration.', function ($message) {
            $message->to('recruitment@kisantra.com')
                    ->subject('Test Email - SMTP Configuration');
        });
        
        return 'Test email sent successfully! Check your inbox at recruitment@kisantra.com';
    } catch (\Exception $e) {
        return 'Email failed to send. Error: ' . $e->getMessage();
    }
});