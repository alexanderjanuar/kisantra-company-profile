<?php

use App\Http\Controllers\KisantraConsultController;
use App\Livewire\Career\Index;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KisantraMailController;

Route::get('/', App\Livewire\Home\Index::class)->name('home.index');

// In routes/web.php
Route::get('/karir', action: \App\Livewire\Career\Index::class)->name('career.index');
Route::get('/karir/{jobPosting}/apply', action: \App\Livewire\Career\JobApplication::class)->name('career.apply');


Route::get('/konsultasi', \App\Livewire\Consultation\Index::class)->name('consultation.index');

Route::get('/tentang-kami', \App\Livewire\AboutUs\Index::class)->name('about.index');



Route::get('/kontak', \App\Livewire\Contact\Index::class)->name('contact.index');

Route::get('/berita', \App\Livewire\News\Index::class)->name('news.index');
Route::get('/berita/{slug}', \App\Livewire\News\Show::class)->name('news.show');



// Route::get('/konsultasi', [KisantraConsultController::class, 'create'])->name('kisantra.consult.create');
Route::post('/kisantra-consult', [KisantraConsultController::class, 'store'])->name('kisantra.consult.store');

// Route::redirect('/laravel/login', '/login')->name('login');
// Route::get('/login', function () {
//     return redirect(route('filament.admin.auth.login'));
// })->name('login');

