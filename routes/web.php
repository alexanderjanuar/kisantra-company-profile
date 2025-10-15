<?php

use App\Livewire\Career\Index;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;


Route::get('/', App\Livewire\Home\Index::class)->name('home.index');

// In routes/web.php
Route::get('/karir', Index::class)->name('career.index');
Route::get('/karir/{jobPosting}/apply', \App\Livewire\Career\JobApplication::class)->name('career.apply');

// Route::redirect('/laravel/login', '/login')->name('login');

Route::get('/login', function () {
    $prevUrl = url()->previous();

    if (! $prevUrl) {
        abort(404); // or redirect some where
    }

    $path = parse_url($prevUrl, PHP_URL_PATH);

    $panelId = explode('/', trim($path, '/'))[0];

    if (! in_array($panelId, array_keys(Filament::getPanels()))) {
        abort(404);
    }

    return redirect(route("filament.{$panelId}.auth.login"));
})->name('login');