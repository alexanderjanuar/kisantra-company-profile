<nav x-data="{ 
        mobileMenuOpen: false,
        dropdownOpen: false,
        scrolled: false,
        init() {
            // Check scroll position on load
            this.checkScroll();
            // Add scroll listener
            window.addEventListener('scroll', () => this.checkScroll());
        },
        checkScroll() {
            const bannerSection = document.querySelector('.page-banner');
            if (bannerSection) {
                const bannerBottom = bannerSection.offsetHeight - 100;
                this.scrolled = window.scrollY > bannerBottom;
            } else {
                // If no banner section exists, check if scrolled more than 50px
                this.scrolled = window.scrollY > 50;
            }
        }
    }"
    :class="scrolled ? 'bg-white/95 backdrop-blur-md border-b border-gray-200' : 'bg-transparent border-b border-transparent'"
    class="fixed top-0 left-0 right-0 z-[100] transition-all duration-300">

    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-14 sm:h-16">
            {{-- Left side - Logo --}}
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('image/Logo/Logo Horizontal.png') }}" alt="Logo"
                        class="w-32 sm:w-40 md:w-48 lg:w-48 transition-all duration-300"
                        :class="scrolled ? 'brightness-100' : 'brightness-0 invert'">
                </a>
            </div>

            {{-- Center - Desktop Navigation Links --}}
            <div class="hidden lg:flex lg:gap-4 lg:items-center">
                <a href="{{ route('home.index') }}"
                    :class="scrolled 
                        ? '@if(request()->routeIs('home.index')) bg-blue-500 text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-100 @endif' 
                        : '@if(request()->routeIs('home.index')) bg-white/20 text-white @else text-white/90 hover:text-white hover:bg-white/10 @endif'"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 ease-in-out whitespace-nowrap">
                    Beranda
                </a>

                {{-- Dropdown Menu for Tentang Kami, Produk & Layanan, Kontak --}}
                <div class="relative" @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false">
                    <button
                        :class="scrolled 
                            ? '@if(request()->routeIs('about*') || request()->routeIs('layanan*') || request()->routeIs('contact*')) bg-blue-500 text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-100 @endif' 
                            : '@if(request()->routeIs('about*') || request()->routeIs('layanan*') || request()->routeIs('contact*')) bg-white/20 text-white @else text-white/90 hover:text-white hover:bg-white/10 @endif'"
                        class="inline-flex items-center justify-center gap-1 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 ease-in-out whitespace-nowrap">
                        <span>Tentang Kami</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="dropdownOpen ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    {{-- Dropdown Content --}}
                    <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50"
                        @click.away="dropdownOpen = false" x-cloak>

                        <a href="{{ route('about.index') }}"
                            class="@if(request()->routeIs('about*')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif block px-4 py-2.5 text-sm transition-colors duration-150">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Tentang Kami</span>
                            </div>
                        </a>

                        <a href="{{ route('layanan.index') }}"
                            class="@if(request()->routeIs('layanan*')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif block px-4 py-2.5 text-sm transition-colors duration-150">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Produk & Layanan</span>
                            </div>
                        </a>

                        <a href="{{ route('contact.index') }}" wire:navigate
                            class="@if(request()->routeIs('contact*')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif block px-4 py-2.5 text-sm transition-colors duration-150">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Kontak</span>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="{{ route('career.index') }}" wire:navigate
                    :class="scrolled 
                        ? '@if(request()->routeIs('career*') || request()->routeIs('job-postings*')) bg-blue-500 text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-100 @endif' 
                        : '@if(request()->routeIs('career*') || request()->routeIs('job-postings*')) bg-white/20 text-white @else text-white/90 hover:text-white hover:bg-white/10 @endif'"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 ease-in-out whitespace-nowrap">
                    Karir
                </a>

                <a href="{{ route('consultation.index') }}"
                    :class="scrolled 
                        ? '@if(request()->routeIs('consultation.index*')) bg-blue-500 text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-100 @endif' 
                        : '@if(request()->routeIs('consultation.index*')) bg-white/20 text-white @else text-white/90 hover:text-white hover:bg-white/10 @endif'"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 ease-in-out whitespace-nowrap">
                    Konsultasi
                </a>

                <a href="{{ route('news.index') }}"
                    :class="scrolled 
                        ? '@if(request()->routeIs('news*')) bg-blue-500 text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-100 @endif' 
                        : '@if(request()->routeIs('news*')) bg-white/20 text-white @else text-white/90 hover:text-white hover:bg-white/10 @endif'"
                    class="inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 ease-in-out whitespace-nowrap">
                    Berita
                </a>
            </div>

            {{-- Mobile menu button --}}
            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    :class="scrolled ? 'bg-white text-gray-500 hover:text-gray-700 hover:bg-gray-50' : 'bg-white/10 text-white hover:bg-white/20'"
                    class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-all duration-300 ease-in-out"
                    aria-controls="mobile-menu" :aria-expanded="mobileMenuOpen.toString()">
                    <span class="sr-only">Buka menu utama</span>
                    <!-- Hamburger icon -->
                    <svg x-show="!mobileMenuOpen" class="block h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Close icon -->
                    <svg x-show="mobileMenuOpen" class="block h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-lg" id="mobile-menu">

        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home.index') }}" @click="mobileMenuOpen = false" wire:navigate
                class="@if(request()->routeIs('home.index')) bg-blue-500 text-white font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Beranda
            </a>

            {{-- Mobile Dropdown Section --}}
            <div x-data="{ mobileDropdownOpen: false }" class="space-y-1">
                <button @click="mobileDropdownOpen = !mobileDropdownOpen"
                    class="@if(request()->routeIs('about*') || request()->routeIs('layanan*') || request()->routeIs('contact*')) bg-blue-500 text-white font-medium @else text-gray-700 hover:bg-gray-50 @endif w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                    <span>Tentang Kami</span>
                    <svg class="w-5 h-5 transition-transform duration-200"
                        :class="mobileDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="mobileDropdownOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0" class="pl-4 space-y-1">
                    <a href="{{ route('about.index') }}" @click="mobileMenuOpen = false"
                        class="@if(request()->routeIs('about*')) bg-blue-50 text-blue-600 font-medium @else text-gray-600 hover:bg-gray-50 @endif block px-3 py-2 rounded-lg text-sm transition duration-150 ease-in-out">
                        Tentang Kami
                    </a>

                    <a href="{{ route('layanan.index') }}" @click="mobileMenuOpen = false"
                        class="@if(request()->routeIs('layanan*')) bg-blue-50 text-blue-600 font-medium @else text-gray-600 hover:bg-gray-50 @endif block px-3 py-2 rounded-lg text-sm transition duration-150 ease-in-out">
                        Produk & Layanan
                    </a>

                    <a href="{{ route('contact.index') }}" @click="mobileMenuOpen = false" wire:navigate
                        class="@if(request()->routeIs('contact*')) bg-blue-50 text-blue-600 font-medium @else text-gray-600 hover:bg-gray-50 @endif block px-3 py-2 rounded-lg text-sm transition duration-150 ease-in-out">
                        Kontak
                    </a>
                </div>
            </div>

            <a href="{{ route('career.index') }}" @click="mobileMenuOpen = false" wire:navigate
                class="@if(request()->routeIs('career*') || request()->routeIs('job-postings*')) bg-blue-500 text-white font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Karir
            </a>

            <a href="{{ route('consultation.index') }}" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('consultation.index*')) bg-blue-500 text-white font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Konsultasi
            </a>

            <a href="{{ route('news.index') }}" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('news*')) bg-blue-500 text-white font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Berita
            </a>
        </div>

        <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">
            <div class="text-xs text-gray-500 text-center">
                © 2025 Your Company Name
            </div>
        </div>
    </div>

</nav>