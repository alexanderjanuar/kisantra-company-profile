<div>
    <style>
        .prose {
            line-height: 1.8;
            color: #111827;
        }

        .prose h2 {
            font-size: 1.875rem;
            font-weight: 700;
            margin-top: 2em;
            margin-bottom: 1em;
            color: #111827;
        }

        .prose h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            color: #111827;
        }

        .prose p {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            line-height: 1.75;
        }

        .prose img {
            margin-top: 2em;
            margin-bottom: 2em;
            border-radius: 0.5rem;
        }

        .prose ul,
        .prose ol {
            list-style-type: disc;
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            padding-left: 1.625em;
        }

        .prose li {
            list-style-type: disc;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .prose strong {
            font-weight: 600;
            color: #111827;
        }

        .prose a {
            color: #2563eb;
            text-decoration: underline;
            font-weight: 500;
        }

        .prose a:hover {
            color: #1d4ed8;
        }

        .prose blockquote {
            font-style: italic;
            border-left: 4px solid #2563eb;
            padding-left: 1em;
            color: #4b5563;
            margin: 1.6em 0;
        }

        /* Article Show Page - Featured Image Styling */
        .article-featured-image {
            margin-bottom: 2rem;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .article-featured-image img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        /* Article Content Images */
        .prose img {
            margin-top: 2em;
            margin-bottom: 2em;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Related Articles Image Styling */
        .related-article-image {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/3;
        }

        .related-article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 500ms ease-in-out;
        }

        .group:hover .related-article-image img {
            transform: scale(1.05);
        }

        /* Latest Articles Sidebar Image */
        .sidebar-article-image {
            width: 5rem;
            height: 5rem;
            border-radius: 0.5rem;
            overflow: hidden;
            flex-shrink: 0;
        }

        .sidebar-article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 300ms ease-in-out;
        }

        .group:hover .sidebar-article-image img {
            transform: scale(1.1);
        }

        /* Article Content Images */
        .prose img {
            margin-top: 2em;
            margin-bottom: 2em;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            max-width: 100%;
            height: auto;
        }

        /* Center align images in content */
        .prose img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Image captions (if using figure/figcaption) */
        .prose figure {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose figcaption {
            margin-top: 0.75em;
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
            font-style: italic;
        }

        /* Hover effect on content images */
        .prose img:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
            transition: all 300ms ease-in-out;
        }

        /* Responsive images */
        .prose img {
            cursor: zoom-in;
        }
    </style>
    {{-- Hero Section with Featured Image --}}
    <div class="relative overflow-hidden ">
        <div class="relative z-10 max-w-[1500px] w-full mx-auto px-4 sm:px-8 py-12 sm:py-12">
            {{-- Article Meta --}}
            <header class="mb-6 sm:mb-8">
                <!-- Category Badge -->
                <div class="mb-3 sm:mb-4">
                    <a href=""
                        class="inline-block px-3 py-1 bg-blue-500 dark:bg-blue-600 text-white text-xs sm:text-sm font-medium rounded-full hover:bg-blue-600 dark:hover:bg-blue-500 transition-colors duration-200">

                    </a>
                </div>

                <!-- Title -->
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900leading-tight mb-4 sm:mb-6 transition-colors duration-300">
                    {{ $article->title }}
                </h1>

                <!-- Article Meta -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-4 sm:pb-6 mb-6 sm:mb-8 gap-4 transition-colors duration-300">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <!-- Author Info -->
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            @if ($article->author->avatar)
                            <img src="{{ asset('storage/authors/' . $article->author->avatar) }}"
                                alt="{{ $article->author->name }}"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover">
                            @else
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-500 dark:text-gray-400 text-sm sm:text-base"></i>
                            </div>
                            @endif
                            <div>
                                <p class="font-medium text-sm sm:text-base text-gray-900">
                                    <a href="" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                        {{ $article->author->name }}
                                    </a>
                                </p>
                                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    {{ $article->published_at->format('d M Y') }} • {{ $article->read_time ?? 5 }}
                                    min read
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="flex items-center space-x-2 sm:space-x-3">
                        <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mr-1 sm:mr-2">Share:</span>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
                            target="_blank"
                            class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 dark:bg-gray-700 hover:bg-blue-500 dark:hover:bg-blue-500 rounded-full flex items-center justify-center transition-colors duration-200 group">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600 dark:text-gray-300 group-hover:text-white"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                            target="_blank"
                            class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 dark:bg-gray-700 hover:bg-blue-600 dark:hover:bg-blue-600 rounded-full flex items-center justify-center transition-colors duration-200 group">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600 dark:text-gray-300 group-hover:text-white"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}"
                            target="_blank"
                            class="w-7 h-7 sm:w-8 sm:h-8 bg-gray-100 dark:bg-gray-700 hover:bg-green-500 dark:hover:bg-green-500 rounded-full flex items-center justify-center transition-colors duration-200 group">
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600 dark:text-gray-300 group-hover:text-white"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                            </svg>
                        </a>
                    </div>
                </div>
            </header>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-[1500px] mx-auto px-4 sm:px-8 hidden lg:block">
        <div class="grid lg:grid-cols-12 gap-8">
            {{-- Article Content --}}
            <article class="lg:col-span-8">
                {{-- Featured Image --}}
                @if($article->featured_image)
                <div class="mb-8 rounded-2xl overflow-hidden" data-aos="fade-up">
                    <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                        class="w-full h-auto object-cover">
                </div>
                @endif

                {{-- Excerpt --}}
                @if($article->excerpt)
                <div class="mb-8 p-6 bg-blue-50 border-l-4 border-blue-600 rounded-r-lg" data-aos="fade-up">
                    <p class="text-lg text-gray-700 leading-relaxed italic">
                        {{ $article->excerpt }}
                    </p>
                </div>
                @endif

                {{-- Article Content --}}
                <div class="prose prose-lg prose-blue max-w-none mb-12" data-aos="fade-up">
                    {!! $article->content !!}
                </div>

                {{-- Comments Section (Placeholder) --}}
                <div class="mb-12" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">
                        Komentar ({{ $article->comments_count ?? 0 }})
                    </h3>
                    <div class="bg-blue-50 rounded-xl p-8 text-center">
                        <svg class="w-16 h-16 mx-auto text-blue-300 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <p class="text-gray-600">Komentar akan segera hadir</p>
                    </div>
                </div>
            </article>

            {{-- Sidebar --}}
            <aside class="lg:col-span-4">
                <div class="sticky top-8 space-y-8">
                    {{-- Latest Articles --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6" data-aos="fade-left">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            Artikel Terbaru
                        </h3>
                        <div class="space-y-4">
                            @foreach($latestArticles as $latestArticle)
                            <a href="{{ route('news.show', $latestArticle->slug) }}" class="block group">
                                <div class="flex gap-3">
                                    <div class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden">
                                        <img src="{{ $latestArticle->featured_image ? Storage::url($latestArticle->featured_image) : asset('image/placeholder.jpg') }}"
                                            alt="{{ $latestArticle->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 text-sm mb-1">
                                            {{ $latestArticle->title }}
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            {{ $latestArticle->published_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6" data-aos="fade-left"
                        data-aos-delay="100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Kategori
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categories as $category)
                            <a href="{{ route('news.index', ['selectedCategory' => $category->id]) }}"
                                class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-full text-sm font-medium transition-colors">
                                {{ $category->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    {{-- Related Articles --}}
    @if (isset($relatedArticles) && $relatedArticles->count() > 0)
    <div class="bg-white rounded-lg p-4 sm:p-6 transition-colors duration-300">
        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-3 sm:mb-4">Artikel Terkait</h3>
        <div class="space-y-4">
            @foreach ($relatedArticles->take(4) as $related)
            <article class="group">
                <a href="{{ route('article', $related->slug) }}" class="block">
                    <div class="flex space-x-3">
                        @if ($related->featured_image)
                        <img src="{{ asset('storage/articles/' . $related->featured_image) }}"
                            alt="{{ $related->title }}"
                            class="w-14 h-14 sm:w-16 sm:h-16 object-cover rounded-lg flex-shrink-0 group-hover:opacity-80 transition-opacity">
                        @else
                        <div
                            class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-newspaper text-gray-400 dark:text-gray-500 text-sm"></i>
                        </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <h4
                                class="text-xs sm:text-sm font-medium text-gray-900 dark:text-white group-hover:text-orange-600 dark:group-hover:text-orange-400 line-clamp-2 transition-colors">
                                {{ $related->title }}
                            </h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                {{ $related->published_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
    @endif
</div>