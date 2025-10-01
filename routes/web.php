<?php

use App\Livewire\Career\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

// In routes/web.php
Route::get('/karir', Index::class)->name('career.index');
Route::get('/karir/{jobPosting}/apply', \App\Livewire\Career\JobApplication::class)->name('career.apply');