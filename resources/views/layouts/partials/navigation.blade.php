<nav class="bg-white border-b border-gray-200" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-14 sm:h-16">
            {{-- Left side - Logo --}}
            <div class="flex-shrink-0">
                <a href="#" class="flex items-center">
                    <img src="{{ asset('image/Logo/Logo Horizontal.png') }}" alt="Logo"
                        class="w-32 sm:w-40 md:w-48 lg:w-56">
                </a>
            </div>

            {{-- Center - Desktop Navigation Links --}}
            <div class="hidden lg:flex lg:space-x-8">
                <a href="#"
                    class="@if(request()->routeIs('home')) border-blue-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                    Beranda
                </a>

                <a href="#"
                    class="@if(request()->routeIs('about')) border-blue-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                    Tentang Kami
                </a>

                <a href="#"
                    class="@if(request()->routeIs('products')) border-blue-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                    Produk & Layanan
                </a>

                <a href="#"
                    class="@if(request()->routeIs('career*') || request()->routeIs('job-postings*')) border-blue-500 text-gray-900 font-semibold @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                    Karir
                </a>

                <a href="#"
                    class="@if(request()->routeIs('news')) border-blue-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                    Berita
                </a>

                <a href="#"
                    class="@if(request()->routeIs('contact')) border-blue-500 text-gray-900 @else border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">
                    Kontak
                </a>
            </div>

            {{-- Mobile menu button --}}
            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition duration-150 ease-in-out"
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

    {{-- Mobile menu - Simplified Design --}}
    <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-white border-b border-gray-200 shadow-lg" id="mobile-menu">

        <!-- Simple mobile menu -->
        <div class="px-4 py-3 space-y-1">
            <a href="#" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('home')) bg-blue-50 text-blue-700 font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Beranda
            </a>

            <a href="#" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('about')) bg-blue-50 text-blue-700 font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Tentang Kami
            </a>

            <a href="#" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('products')) bg-blue-50 text-blue-700 font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Produk & Layanan
            </a>

            <a href="#" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('career*') || request()->routeIs('job-postings*')) bg-blue-50 text-blue-700 font-semibold @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                <div class="flex items-center justify-between">
                    <span>Karir</span>
                    @if(request()->routeIs('career*') || request()->routeIs('job-postings*'))
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded-full">
                        Aktif
                    </span>
                    @endif
                </div>
            </a>

            <a href="#" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('news')) bg-blue-50 text-blue-700 font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Berita
            </a>

            <a href="#" @click="mobileMenuOpen = false"
                class="@if(request()->routeIs('contact')) bg-blue-50 text-blue-700 font-medium @else text-gray-700 hover:bg-gray-50 @endif block px-3 py-2.5 rounded-lg text-base transition duration-150 ease-in-out">
                Kontak
            </a>
        </div>

        <!-- Optional: Add divider and additional mobile-only content -->
        <div class="px-4 py-3 border-t border-gray-100 bg-gray-50">
            <div class="text-xs text-gray-500 text-center">
                © 2025 Your Company Name
            </div>
        </div>
    </div>
</nav>