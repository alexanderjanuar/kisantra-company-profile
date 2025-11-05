<?php

namespace App\Livewire\News;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selectedCategory = null;

    protected $queryString = ['selectedCategory'];

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $articles = Article::query()
            ->with(['author', 'categories'])
            ->withCount('comments')
            ->published()
            ->when($this->selectedCategory, function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('categories.id', $this->selectedCategory);
                });
            })
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $categories = Category::active()
            ->ordered()
            ->get();

        return view('livewire.news.index', [
            'articles' => $articles,
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}