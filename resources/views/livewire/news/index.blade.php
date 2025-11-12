<div>
    {{-- Header Section --}}
    <div class="relative h-96 flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('image/Pattern/BreadCrumbBanner.jpg') }}" alt="Layanan Kami Banner"
                class="w-full h-full object-cover">

            <div class="absolute inset-0"
                style="background-image: linear-gradient(282deg, rgba(0,16,47,.5) 19.19%, rgba(0,13,38,.85) 61.36%);">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Berita</h1>

            <!-- Breadcrumb -->
            <div class="flex items-center justify-center text-sm space-x-2">
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors">
                    Beranda
                </a>
                <svg class="w-4 h-4 text-[#42B2CD]" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-[#42B2CD]">Berita</span>
            </div>
        </div>

        <img class="absolute top-0 left-0 z-1" src="image\Pattern\TopWave.png"></img>
        <img class="absolute top-0 right-80 z-1" src="image\Pattern\CircleTopStrip.png"></img>
    </div>

    {{-- Articles Grid Section --}}
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-8 lg:px-16 py-12 sm:py-16 min-h-[100vh]">
        {{-- Filter/Category Section (Optional) --}}
        <div class="mb-8" data-aos="fade-up">
            <div class="flex flex-wrap gap-3 justify-center">
                <button wire:click="$set('selectedCategory', null)"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300
                    {{ $selectedCategory === null ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Semua
                </button>
                @foreach($categories as $category)
                <button wire:click="$set('selectedCategory', {{ $category->id }})"
                    class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300
                    {{ $selectedCategory === $category->id ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- Articles Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @forelse($articles as $article)
            <a href="{{ route('news.show', $article->slug) }}" class="block group bg-white overflow-hidden"
                data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                {{-- Image --}}
                <div class="relative overflow-hidden aspect-[4/3] rounded-2xl mb-8">
                    <img src="{{ $article->featured_image ? Storage::url($article->featured_image) : asset('image/placeholder.jpg') }}"
                        alt="{{ $article->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                    {{-- Date Badge - Bottom Right --}}
                    <div class="absolute bottom-0 right-0 bg-white rounded-tl-lg px-6 py-3 text-center shadow-md">
                        <div class="text-2xl font-bold text-blue-500 leading-none">
                            {{ $article->published_at->format('d') }}
                        </div>
                        <div class="text-[14px] text-blue-300 uppercase font-light mt-0.5">
                            {{ $article->published_at->format('M') }}
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div>
                    {{-- Meta Info --}}
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-6.5 h-6.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 text-[15px]">By {{ $article->author->name }}</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-6.5 h-6.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 text-[15px]">{{ $article->comments_count ?? 0 }} Comments</span>
                        </div>
                    </div>

                    {{-- Title --}}
                    <h3
                        class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 leading-9 group-hover:text-blue-600 transition-colors duration-500">
                        {{ $article->title }}
                    </h3>

                    {{-- Excerpt --}}
                    <p class="text-gray-600 mb-5 line-clamp-2 leading-relaxed">
                        {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 100) }}
                    </p>

                    {{-- Read More Button --}}
                    <span
                        class="inline-flex items-center gap-2 text-blue-500 font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                        Read Details
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Artikel</h3>
                <p class="text-gray-600">Artikel akan segera hadir. Silakan kembali lagi nanti.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($articles->hasPages())
        <div class="mt-12" data-aos="fade-up">
            {{ $articles->links() }}
        </div>
        @endif
    </div>
</div>