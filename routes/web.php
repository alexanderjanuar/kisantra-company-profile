<?php

use App\Http\Controllers\KisantraConsultController;
use App\Livewire\Career\Index;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KisantraMailController;
use Inertia\Inertia;

Route::get('/', function () {
    $articles = \App\Models\Article::published()
        ->with('categories:id,name,slug')
        ->select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at')
        ->latest('published_at')
        ->limit(3)
        ->get();

    return Inertia::render('Home', [
        'articles' => $articles
    ]);
})->name('home.index');

// In routes/web.php
Route::get('/karir', action: \App\Livewire\Career\Index::class)->name('career.index');
Route::get('/karir/{jobPosting}/apply', action:         \App\Livewire\Career\JobApplication::class)->name('career.apply');


Route::get('/konsultasi', \App\Livewire\Consultation\Index::class)->name('consultation.index');

Route::get('/tentang-kami', function () {
    return Inertia::render('About');
})->name('about.index');

Route::get('/layanan', function () {
    return Inertia::render('Layanan');
})->name('layanan.index');


Route::get('/kontak', \App\Livewire\Contact\Index::class)->name('contact.index');

Route::get('/berita', \App\Livewire\News\Index::class)->name('news.index');
Route::get('/berita/{slug}', \App\Livewire\News\Show::class)->name('news.show');

Route::get('/articles', function () {
    $articles = \App\Models\Article::published()
        ->with('categories:id,name,slug')
        ->select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at')
        ->latest('published_at')
        ->get();

    return Inertia::render('Articles', [
        'articles' => $articles
    ]);
})->name('articles.index');



// Route::get('/konsultasi', [KisantraConsultController::class, 'create'])->name('kisantra.consult.create');
Route::post('/kisantra-consult', [KisantraConsultController::class, 'store'])->name('kisantra.consult.store');

// Route::redirect('/laravel/login', '/login')->name('login');
// Route::get('/login', function () {
//     return redirect(route('filament.admin.auth.login'));
// })->name('login');

