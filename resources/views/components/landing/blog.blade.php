@php
// Optimized query - only select needed fields and use minimal relations
$articles = \App\Models\Article::query()
->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'author_id'])
->withCount('comments')
->published()
->latest('published_at')
->take(3)
->get();
@endphp

<div class="relative overflow-hidden bg-white flex items-center py-16"
    style="background-image: url('{{ asset('image/Pattern/WhitePattern.jpg') }}'); background-size: cover;">
    {{-- Main Content Container --}}
    <div class="relative max-w-[1600px] z-10 w-full mx-auto px-4 sm:px-6 lg:px-12 xl:px-20">
        {{-- Section Header --}}
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
            <div class="inline-block bg-blue-50 text-blue-500 px-4 py-2 rounded-lg text-sm font-medium mb-4">
                Artikel Terbaru
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-navy-900" style="color: #1e293b;">
                Berita & Insight Terkini
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
            <a href="{{ route('news.show', $article->slug) }}"
                class="block group bg-white rounded-2xl shadow-sm hover:shadow-lg overflow-hidden transition-all duration-300"
                data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                {{-- Image --}}
                <div class="relative overflow-hidden">
                    <img src="{{ $article->featured_image ? Storage::url($article->featured_image) : asset('image/placeholder.jpg') }}"
                        alt="{{ $article->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    {{-- Date Badge - Top Right --}}
                    <div
                        class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 text-center shadow-sm">
                        <div class="text-lg font-bold text-blue-500 leading-none">
                            {{ $article->published_at->format('d') }}
                        </div>
                        <div class="text-xs text-blue-400 uppercase font-medium">
                            {{ $article->published_at->format('M') }}
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-5">
                    {{-- Meta Info --}}
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ $article->author->name }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ $article->comments_count ?? 0 }}</span>
                        </div>
                    </div>

                    {{-- Title --}}
                    <h3
                        class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 leading-6 group-hover:text-blue-600 transition-colors duration-300">
                        {{ $article->title }}
                    </h3>

                    {{-- Excerpt --}}
                    <p class="text-sm text-gray-600 mb-4 line-clamp-2 leading-relaxed">
                        {{ $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 80) }}
                    </p>

                    {{-- Read More Button --}}
                    <span
                        class="inline-flex items-center gap-1 text-blue-500 font-medium text-sm group-hover:gap-2 transition-all duration-300">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-8">
                <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-1">Belum Ada Artikel</h3>
                <p class="text-sm text-gray-600">Artikel akan segera hadir. Silakan kembali lagi nanti.</p>
            </div>
            @endforelse
        </div>

        {{-- View All Articles Button --}}
        @if($articles->count() > 0)
        <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('news.index') }}"
                class="inline-flex items-center gap-2 text-blue-600 hover:underline px-6 py-3 rounded-lg font-medium transition-colors duration-300">
                Lihat Semua Artikel
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
        @endif
    </div>
</div>