@php
$articles = \App\Models\Article::query()
    ->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'author_id'])
    ->with(['author:id,name', 'categories:id,name,slug,color'])
    ->withCount('comments')
    ->published()
    ->latest('published_at')
    ->take(3)
    ->get();
@endphp

<div class="relative overflow-hidden bg-[#0f0f0f] py-24">
    {{-- Subtle Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#42B2CD]/3 rounded-full blur-3xl"></div>
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 w-full max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="inline-block text-[#42B2CD] text-xs font-medium tracking-[3px] uppercase mb-6">
                Artikel Terbaru
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-white mb-4 tracking-tight">
                Berita & <span class="text-[#42B2CD]">Insight</span>
            </h2>
            <p class="text-gray-400 text-base max-w-lg mx-auto">
                Temukan artikel dan panduan terbaru untuk membantu bisnis Anda berkembang
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
            <article
                class="group bg-white/[0.03] backdrop-blur-sm rounded-2xl overflow-hidden transition-all duration-500 hover:bg-white/[0.05] border border-white/[0.06] hover:border-[#42B2CD]/20"
                data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                <a href="{{ route('news.show', $article->slug) }}" class="block">
                    {{-- Image Container --}}
                    <div class="relative overflow-hidden aspect-[16/10]">
                        <img src="{{ $article->featured_image ? Storage::url($article->featured_image) : asset('image/placeholder.jpg') }}"
                            alt="{{ $article->title }}"
                            class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700"
                            loading="lazy">

                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f0f] via-transparent to-transparent"></div>

                        {{-- Category Badge --}}
                        @if($article->categories->first())
                        <div class="absolute top-4 left-4 z-10">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-white/90 bg-white/10 backdrop-blur-sm border border-white/10">
                                {{ $article->categories->first()->name }}
                            </span>
                        </div>
                        @endif

                        {{-- Date Badge --}}
                        <div class="absolute top-4 right-4 z-10 text-right">
                            <div class="text-2xl font-semibold text-white leading-none">
                                {{ $article->published_at->format('d') }}
                            </div>
                            <div class="text-xs text-white/60 uppercase tracking-wider mt-1">
                                {{ $article->published_at->format('M') }}
                            </div>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        {{-- Meta Info --}}
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-4">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-[#42B2CD]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-400">{{ $article->author->name }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-500">{{ $article->comments_count ?? 0 }}</span>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h3 class="text-lg font-medium text-white/90 mb-3 line-clamp-2 leading-snug group-hover:text-[#42B2CD] transition-colors duration-300">
                            {{ $article->title }}
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-sm text-gray-500 mb-5 line-clamp-2 leading-relaxed">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 100) }}
                        </p>

                        {{-- Read More --}}
                        <div class="flex items-center gap-2 text-[#42B2CD] text-sm font-medium group-hover:gap-3 transition-all duration-300">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </article>
            @empty
            <div class="col-span-full">
                <div class="text-center py-16 px-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/5 rounded-full mb-6">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-white mb-2">Belum Ada Artikel</h3>
                    <p class="text-gray-500 max-w-md mx-auto text-sm">Artikel menarik akan segera hadir. Silakan kembali lagi nanti.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- View All Button --}}
        @if($articles->count() > 0)
        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('news.index') }}"
                class="group inline-flex items-center gap-3 bg-transparent border border-white/20 hover:border-[#42B2CD] text-white hover:text-[#42B2CD] px-8 py-4 rounded-full font-medium text-sm transition-all duration-300">
                Lihat Semua Artikel
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
        @endif
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>
