<?php

use App\Livewire\Career\Index;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;


Route::get('/', App\Livewire\Home\Index::class)->name('home.index');

// In routes/web.php
Route::get('/karir', Index::class)->name('career.index');
Route::get('/karir/{jobPosting}/apply', \App\Livewire\Career\JobApplication::class)->name('career.apply');


Route::get('/kontak', \App\Livewire\Contact\Index::class)->name('contact.index');

// Route::redirect('/laravel/login', '/login')->name('login');
// Route::get('/login', function () {
//     return redirect(route('filament.admin.auth.login'));
// })->name('login');

