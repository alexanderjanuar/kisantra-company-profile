<?php

namespace App\Livewire\News;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Show extends Component
{
    public $slug;
    public Article $article;

    public function mount($slug)
    {
        $this->slug = $slug;
        
        $this->article = Article::with(['author', 'categories', 'comments'])
            ->withCount('comments')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment views
        $this->article->incrementViews();
    }

    public function render()
    {
        $latestArticles = Article::published()
            ->where('id', '!=', $this->article->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $categories = Category::active()
            ->withCount('articles')
            ->having('articles_count', '>', 0)
            ->ordered() 
            ->get();

        $relatedArticles = Article::published()
            ->where('id', '!=', $this->article->id)
            ->whereHas('categories', function ($query) {
                $query->whereIn('categories.id', $this->article->categories->pluck('id'));
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('livewire.news.show', [
            'latestArticles' => $latestArticles,
            'categories' => $categories,
            'relatedArticles' => $relatedArticles,
        ])->layout('layouts.app');
    }
}