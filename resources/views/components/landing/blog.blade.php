@php
// Optimized query - only select needed fields and use minimal relations
$articles = \App\Models\Article::query()
->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at', 'author_id'])
->with(['author:id,name', 'categories:id,name,slug,color'])
->withCount('comments')
->published()
->latest('published_at')
->take(3)
->get();
@endphp

<div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-blue-50 py-20">
    {{-- Decorative Elements --}}
    <div
        class="absolute top-0 left-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
    </div>
    <div
        class="absolute top-0 right-0 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
    </div>
    <div
        class="absolute bottom-0 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000">
    </div>

    {{-- Main Content Container --}}
    <div class="relative max-w-[1600px] z-10 w-full mx-auto px-4 sm:px-6 lg:px-12 xl:px-20">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div
                class="inline-flex items-center gap-2 bg-blue-100 text-blue-600 px-5 py-2.5 rounded-full text-sm font-semibold mb-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                    <path
                        d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                </svg>
                Artikel Terbaru
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Berita & <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Insight</span>
                Terkini
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Temukan artikel, tips, dan panduan terbaru untuk membantu bisnis Anda berkembang
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <article
                class="group bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 border border-gray-100"
                data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                <a href="{{ route('news.show', $article->slug) }}" class="block">
                    {{-- Image Container --}}
                    <div class="relative overflow-hidden aspect-[16/10] bg-gradient-to-br from-gray-200 to-gray-300">
                        <img src="{{ $article->featured_image ? Storage::url($article->featured_image) : asset('image/placeholder.jpg') }}"
                            alt="{{ $article->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            loading="lazy">

                        {{-- Gradient Overlay --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-black/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>

                        {{-- Category Badge - Top Left --}}
                        @if($article->categories->first())
                        <div class="absolute top-4 left-4 z-10">
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold text-white shadow-lg backdrop-blur-sm"
                                style="background-color: {{ $article->categories->first()->color ?? 'rgba(59, 130, 246, 0.9)' }}">
                                {{ $article->categories->first()->name }}
                            </span>
                        </div>
                        @endif

                        {{-- Date Badge - Top Right --}}
                        <div
                            class="absolute top-4 right-4 z-10 bg-white/95 backdrop-blur-md rounded-xl px-3 py-2 shadow-lg text-center min-w-[60px] border border-white/20">
                            <div class="text-2xl font-bold text-blue-600 leading-none">
                                {{ $article->published_at->format('d') }}
                            </div>
                            <div class="text-[10px] text-gray-600 uppercase font-semibold tracking-wider mt-0.5">
                                {{ $article->published_at->format('M') }}
                            </div>
                        </div>

                        {{-- Read Time Badge - Bottom Right (shown on hover) --}}
                        <div
                            class="absolute bottom-4 right-4 z-10 bg-black/70 backdrop-blur-sm text-white px-3 py-1.5 rounded-lg text-xs font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $article->reading_time ?? '5 min' }}
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        {{-- Meta Info --}}
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-4 pb-4 border-b border-gray-100">
                            <div class="flex items-center gap-1.5 hover:text-blue-600 transition-colors">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">{{ $article->author->name }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>{{ $article->comments_count ?? 0 }} Komentar</span>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 leading-snug group-hover:text-blue-600 transition-colors duration-300">
                            {{ $article->title }}
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-sm text-gray-600 mb-5 line-clamp-3 leading-relaxed">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 120) }}
                        </p>

                        {{-- Read More Button --}}
                        <div class="flex items-center justify-between">
                            <span
                                class="inline-flex items-center gap-2 text-blue-600 font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>
            </article>
            @empty
            <div class="col-span-full">
                <div class="text-center py-16 px-4">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Artikel</h3>
                    <p class="text-gray-600 max-w-md mx-auto">Artikel menarik akan segera hadir. Silakan kembali lagi
                        nanti untuk membaca konten terbaru kami.</p>
                </div>
            </div>
            @endforelse
        </div>

        {{-- View All Articles Button --}}
        @if($articles->count() > 0)
        <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('news.index') }}"
                class="group inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-4 rounded-xl font-semibold text-base shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                <span>Lihat Semua Artikel</span>
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
        @endif
    </div>

    {{-- Custom Animations --}}
    <style>
        @keyframes blob {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            25% {
                transform: translate(20px, -50px) scale(1.1);
            }

            50% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            75% {
                transform: translate(50px, 50px) scale(1.05);
            }
        }

        .animate-blob {
            animation: blob 20s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Smooth line clamp for better text truncation */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>