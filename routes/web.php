<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

// In routes/web.php
Route::get('/karir', App\Livewire\Career::class)->name('career');