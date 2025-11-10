<div>
    <style>
        body {
            font-family: 'Montserrat';font-size: 18px;
        }

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
    <div class="relative overflow-hidden">
        <div class="relative z-10 max-w-[1500px] w-full mx-auto px-4 sm:px-8 py-12 sm:py-12">
            {{-- Article Meta --}}
            <header class="mb-6 sm:mb-8">
                <!-- Category Badge -->
                <div class="mb-3 sm:mb-4">
                    @if($article->categories->isNotEmpty())
                    <a href="{{ route('news.index', ['selectedCategory' => $article->categories->first()->id]) }}"
                        class="inline-block px-3 py-1 bg-blue-500 dark:bg-blue-600 text-white text-xs sm:text-sm font-medium rounded-full hover:bg-blue-600 dark:hover:bg-blue-500 transition-colors duration-200">
                        {{ $article->categories->first()->name }}
                    </a>
                    @endif
                </div>

                <!-- Title -->
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4 sm:mb-6 transition-colors duration-300">
                    {{ $article->title }}
                </h1>

                <!-- Article Meta -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-4 sm:pb-6 mb-6 sm:mb-8 gap-4 transition-colors duration-300">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <!-- Author Info -->
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            @if ($article->author->avatar ?? false)
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
                                    {{ $article->author->name }}
                                </p>
                                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    {{ $article->published_at->format('d M Y') }} • {{ $article->reading_time }}
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
    <div class="max-w-[1500px] mx-auto px-4 sm:px-8">
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

                {{-- Attachments Section for Mobile --}}
                @if($article->attachments->isNotEmpty())
                <div class="lg:hidden mb-8 bg-white rounded-2xl border border-gray-200 p-6" data-aos="fade-up">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        Lampiran
                    </h3>
                    <div class="space-y-3">
                        @foreach($article->attachments as $attachment)
                        <a href="{{ Storage::url($attachment->file_path) }}" download="{{ $attachment->file_name }}"
                            class="flex items-center gap-3 p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors group">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                @php
                                $extension = strtolower(pathinfo($attachment->file_name, PATHINFO_EXTENSION));
                                $iconClass = match($extension) {
                                'pdf' => 'fa-file-pdf text-red-600',
                                'doc', 'docx' => 'fa-file-word text-blue-600',
                                'xls', 'xlsx' => 'fa-file-excel text-green-600',
                                'zip', 'rar' => 'fa-file-archive text-yellow-600',
                                'jpg', 'jpeg', 'png', 'gif' => 'fa-file-image text-purple-600',
                                default => 'fa-file text-gray-600'
                                };
                                @endphp
                                <i class="fas {{ $iconClass }} text-lg"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p
                                    class="font-medium text-gray-900 group-hover:text-blue-600 transition-colors truncate text-sm">
                                    {{ $attachment->file_name }}
                                </p>
                                @if($attachment->description)
                                <p class="text-xs text-gray-500 line-clamp-1 mt-0.5">
                                    {{ $attachment->description }}
                                </p>
                                @endif
                                <p class="text-xs text-gray-400 mt-0.5">
                                    {{ $attachment->file_size_formatted }} • {{ $attachment->download_count }} downloads
                                </p>
                            </div>
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

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
                <div class="sticky top-8 space-y-6">
                    {{-- Attachments --}}
                    @if($article->attachments->isNotEmpty())
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl border border-gray-100 overflow-hidden"
                        data-aos="fade-left">
                        <div class="px-6 py-4">
                            <h3 class="text-lg font-bold text-black flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                File Lampiran
                            </h3>
                            <p class="text-blue-600 text-xs mt-1">{{ $article->attachments->count() }} file tersedia</p>
                        </div>
                        <div class="p-4 space-y-2">
                            @foreach($article->attachments as $attachment)
                            <a href="{{ Storage::url($attachment->file_path) }}" download="{{ $attachment->file_name }}"
                                class="flex items-start gap-3 p-3 bg-white hover:bg-blue-50 rounded-xl transition-all duration-300 group hover:shadow-md border border-gray-100">
                                <div class="flex-shrink-0 w-12 h-12 rounded-lg flex items-center justify-center shadow-sm
                                    @php
                                    $extension = strtolower(pathinfo($attachment->file_name, PATHINFO_EXTENSION));
                                    echo match($extension) {
                                        'pdf' => 'bg-gradient-to-br from-red-100 to-red-200',
                                        'doc', 'docx' => 'bg-gradient-to-br from-blue-100 to-blue-200',
                                        'xls', 'xlsx' => 'bg-gradient-to-br from-green-100 to-green-200',
                                        'zip', 'rar' => 'bg-gradient-to-br from-yellow-100 to-yellow-200',
                                        'jpg', 'jpeg', 'png', 'gif' => 'bg-gradient-to-br from-purple-100 to-purple-200',
                                        default => 'bg-gradient-to-br from-gray-100 to-gray-200'
                                    };
                                    @endphp
                                ">
                                    @php
                                    $iconClass = match($extension) {
                                    'pdf' => 'fa-file-pdf text-red-600',
                                    'doc', 'docx' => 'fa-file-word text-blue-600',
                                    'xls', 'xlsx' => 'fa-file-excel text-green-600',
                                    'zip', 'rar' => 'fa-file-archive text-yellow-600',
                                    'jpg', 'jpeg', 'png', 'gif' => 'fa-file-image text-purple-600',
                                    default => 'fa-file text-gray-600'
                                    };
                                    @endphp
                                    <i class="fas {{ $iconClass }} text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p
                                        class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm line-clamp-2 leading-snug">
                                        {{ $attachment->file_name }}
                                    </p>
                                    @if($attachment->description)
                                    <p class="text-xs text-gray-600 line-clamp-2 mt-1 leading-relaxed">
                                        {{ $attachment->description }}
                                    </p>
                                    @endif
                                    <div class="flex items-center gap-3 mt-2">
                                        <span class="inline-flex items-center gap-1 text-xs text-gray-500">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            {{ $attachment->file_size_formatted }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 text-xs text-gray-500">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            {{ $attachment->download_count }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 self-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 group-hover:bg-blue-600 flex items-center justify-center transition-colors">
                                        <svg class="w-4 h-4 text-blue-600 group-hover:text-white transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Latest Articles --}}
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden" data-aos="fade-left">
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                                Artikel Terbaru
                            </h3>
                        </div>
                        <div class="p-4 space-y-3">
                            @foreach($latestArticles as $index => $latestArticle)
                            <a href="{{ route('news.show', $latestArticle->slug) }}" class="block group">
                                <div class="flex gap-3 p-2 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="relative flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden shadow-sm">
                                        <img src="{{ $latestArticle->featured_image ? Storage::url($latestArticle->featured_image) : asset('image/placeholder.jpg') }}"
                                            alt="{{ $latestArticle->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4
                                            class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 text-sm mb-1.5 leading-snug">
                                            {{ $latestArticle->title }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-xs text-gray-500">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $latestArticle->published_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @if(!$loop->last)
                            <div class="border-b border-gray-100"></div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden" data-aos="fade-left"
                        data-aos-delay="100">
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                Kategori Artikel
                            </h3>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-wrap gap-2">
                                @foreach($categories as $category)
                                <a href="{{ route('news.index', ['selectedCategory' => $category->id]) }}"
                                    class="group inline-flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-600 hover:to-indigo-600 text-blue-700 hover:text-white rounded-full text-sm font-medium transition-all duration-300 shadow-sm hover:shadow-md">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $category->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>