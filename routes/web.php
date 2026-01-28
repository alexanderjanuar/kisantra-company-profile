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
Route::get('/karir/{jobPosting}/apply', action: \App\Livewire\Career\JobApplication::class)->name('career.apply');

Route::get('/konsultasi', \App\Livewire\Consultation\Index::class)->name('consultation.index');

Route::get('/tentang-kami', function () {
    return Inertia::render('About');
})->name('about.index');

Route::get('/layanan', function () {
    return Inertia::render('Layanan');
})->name('layanan.index');

Route::get('/kontak', \App\Livewire\Contact\Index::class)->name('contact.index');

// Articles routes with Inertia for SPA navigation
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

Route::get('/articles/{slug}', function ($slug) {
    $article = \App\Models\Article::published()
        ->where('slug', $slug)
        ->with('categories:id,name,slug')
        ->firstOrFail();

    // Get related articles from same category
    $relatedArticles = \App\Models\Article::published()
        ->where('id', '!=', $article->id)
        ->whereHas('categories', function ($query) use ($article) {
            $query->whereIn('categories.id', $article->categories->pluck('id'));
        })
        ->with('categories:id,name,slug')
        ->select('id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at')
        ->latest('published_at')
        ->limit(3)
        ->get();

    return Inertia::render('ArticleDetail', [
        'article' => $article,
        'related_articles' => $relatedArticles
    ]);
})->name('articles.show');

// Legacy berita routes (redirect to new articles routes for SEO)
Route::get('/berita', function () {
    return redirect('/articles', 301);
})->name('news.index');

Route::get('/berita/{slug}', function ($slug) {
    return redirect("/articles/{$slug}", 301);
})->name('news.show');

// Route::get('/konsultasi', [KisantraConsultController::class, 'create'])->name('kisantra.consult.create');
Route::post('/kisantra-consult', [KisantraConsultController::class, 'store'])->name('kisantra.consult.store');

// Route::redirect('/laravel/login', '/login')->name('login');
// Route::get('/login', function () {
//     return redirect(route('filament.admin.auth.login'));
// })->name('login');
