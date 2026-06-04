<?php

use App\Http\Controllers\KisantraConsultController;
use App\Http\Controllers\JobApplicationController;
use App\Models\Announcement;
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

Route::get('/karir', function () {
    $jobs = \App\Models\JobPosting::active()
        ->with('batch')
        ->select('id', 'title', 'location', 'employment_type', 'work_type', 'description', 'requirements', 'division', 'recruitment_batch_id', 'created_at')
        ->latest()
        ->get();

    $mapJob = fn ($job) => [
        'id' => $job->id,
        'title' => $job->title,
        'location' => $job->location,
        'type' => $job->employment_type_display,
        'work_type' => $job->work_type_display,
        'department' => $job->division ?: 'Umum',
        'description' => $job->description,
        'requirements' => $job->requirements,
        'batch' => $job->batch?->name,
    ];

    // Group active jobs by their batch (closed batches fall back to "Lainnya").
    $grouped = [];
    $ungrouped = [];
    foreach ($jobs as $job) {
        $batch = $job->batch;
        if ($batch && $batch->status !== 'closed') {
            if (! isset($grouped[$batch->id])) {
                $grouped[$batch->id] = [
                    'batch' => [
                        'name' => $batch->name,
                        'slug' => $batch->slug,
                        'description' => $batch->description,
                        'start_date' => $batch->start_date,
                        'end_date' => $batch->end_date,
                        'status' => $batch->status,
                        'status_display' => $batch->status_display,
                    ],
                    'jobs' => [],
                ];
            }
            $grouped[$batch->id]['jobs'][] = $mapJob($job);
        } else {
            $ungrouped[] = $mapJob($job);
        }
    }

    $groups = array_values($grouped);
    if (! empty($ungrouped)) {
        $groups[] = ['batch' => null, 'jobs' => $ungrouped];
    }

    return Inertia::render('Karir', [
        'groups' => $groups,
    ]);
})->name('career.index');

Route::get('/konsultasi', \App\Livewire\Consultation\Index::class)->name('consultation.index');

Route::get('/tentang-kami', function () {
    return Inertia::render('About');
})->name('about.index');

Route::get('/layanan', function () {
    return Inertia::render('Layanan');
})->name('layanan.index');

Route::get('/kontak', function () {
    return Inertia::render('Contact');
})->name('contact.index');

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

// Announcements (Pengumuman) routes
Route::get('/pengumuman', function () {
    $announcements = Announcement::published()
        ->withCount('attachments')
        ->orderByDesc('is_pinned')
        ->latest('published_at')
        ->get(['id', 'title', 'slug', 'excerpt', 'featured_image', 'is_pinned', 'published_at'])
        ->map(fn ($a) => [
            'id' => $a->id,
            'title' => $a->title,
            'slug' => $a->slug,
            'excerpt' => $a->excerpt,
            'featured_image' => $a->featured_image,
            'is_pinned' => (bool) $a->is_pinned,
            'published_at' => $a->published_at,
            'attachments_count' => $a->attachments_count,
        ]);

    return Inertia::render('Pengumuman', [
        'announcements' => $announcements,
    ]);
})->name('announcements.index');

Route::get('/pengumuman/{slug}', function ($slug) {
    $announcement = Announcement::published()
        ->where('slug', $slug)
        ->with('attachments')
        ->firstOrFail();

    $related = Announcement::published()
        ->where('id', '!=', $announcement->id)
        ->orderByDesc('is_pinned')
        ->latest('published_at')
        ->limit(3)
        ->get(['id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at'])
        ->map(fn ($a) => [
            'id' => $a->id,
            'title' => $a->title,
            'slug' => $a->slug,
            'excerpt' => $a->excerpt,
            'featured_image' => $a->featured_image,
            'published_at' => $a->published_at,
        ]);

    return Inertia::render('PengumumanDetail', [
        'announcement' => [
            'id' => $announcement->id,
            'title' => $announcement->title,
            'slug' => $announcement->slug,
            'excerpt' => $announcement->excerpt,
            'featured_image' => $announcement->featured_image,
            'content' => str_replace('//storage/', '/storage/', $announcement->content),
            'is_pinned' => (bool) $announcement->is_pinned,
            'published_at' => $announcement->published_at,
            'attachments' => $announcement->attachments->map(fn ($file) => [
                'name' => $file->file_name,
                'url' => $file->url,
                'description' => $file->description,
            ]),
        ],
        'related_announcements' => $related,
    ]);
})->name('announcements.show');

// Legacy berita routes (redirect to new articles routes for SEO)
Route::get('/berita', function () {
    return redirect('/articles', 301);
})->name('news.index');

Route::get('/berita/{slug}', function ($slug) {
    return redirect("/articles/{$slug}", 301);
})->name('news.show');

// Route::get('/konsultasi', [KisantraConsultController::class, 'create'])->name('kisantra.consult.create');
Route::post('/kisantra-consult', [KisantraConsultController::class, 'store'])->name('kisantra.consult.store');

// Job Application Route
Route::post('/api/apply-job', [JobApplicationController::class, 'store'])->name('job.apply');

// Route::redirect('/laravel/login', '/login')->name('login');
// Route::get('/login', function () {
//     return redirect(route('filament.admin.auth.login'));
// })->name('login');
