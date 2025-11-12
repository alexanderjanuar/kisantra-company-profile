<div>
    <!-- Background Image with Overlay -->
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
            <h1 class="text-5xl font-bold mb-4">Layanan Kami</h1>

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
                <span class="text-[#42B2CD]">Layanan Kami</span>
            </div>
        </div>

        <img class="absolute top-0 left-0 z-1" src="image\Pattern\TopWave.png"></img>
        <img class="absolute top-0 right-80 z-1" src="image\Pattern\CircleTopStrip.png"></img>
    </div>

    <!-- Services Section - DYNAMIC (Inside Livewire Component) -->
    <!-- Services Section - DYNAMIC (Inside Livewire Component) -->
    <div class="py-16">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 relative">
            <!-- Decorative Blobs -->
            <div class="absolute -top-20 -left-20 w-72 h-72 bg-[#42B2CD]/10 rounded-full blur-3xl pointer-events-none">
            </div>
            <div
                class="absolute -bottom-20 -right-20 w-96 h-96 bg-[#42B2CD]/15 rounded-full blur-3xl pointer-events-none">
            </div>
            <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-[#42B2CD]/5 rounded-full blur-3xl pointer-events-none">
            </div>

            <!-- Mobile Decorative Blobs (visible only on mobile) -->
            <div
                class="lg:hidden absolute top-10 right-10 w-40 h-40 bg-[#42B2CD]/10 rounded-full blur-2xl pointer-events-none">
            </div>
            <div
                class="lg:hidden absolute bottom-10 left-10 w-32 h-32 bg-[#42B2CD]/15 rounded-full blur-2xl pointer-events-none">
            </div>
            <div
                class="lg:hidden absolute top-1/3 right-1/4 w-24 h-24 bg-[#42B2CD]/8 rounded-full blur-xl pointer-events-none">
            </div>
            <!-- Hero Section with Form and Image -->
            <div class="mb-16 relative overflow-hidden">


                <div class="relative overflow-hidden">
                    <div class="grid lg:grid-cols-2 gap-8 items-center">

                        <!-- Left Side - Text & Form (Full width on mobile) -->
                        <div class="p-6 sm:p-8 lg:p-12 animate-fade-right">
                            <div class="mb-6">
                                <span
                                    class="inline-block px-4 py-2 bg-[#42B2CD]/10 text-[#42B2CD] rounded-full text-sm font-semibold mb-4">
                                    Rekomendasi Layanan
                                </span>
                                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-[#414141] mb-4">
                                    Temukan Layanan yang Tepat untuk Bisnis Anda
                                </h2>
                                <p class="text-gray-600 text-base sm:text-lg mb-8">
                                    Jawab beberapa pertanyaan sederhana dan kami akan merekomendasikan layanan yang
                                    paling sesuai dengan kebutuhan Anda
                                </p>
                            </div>

                            <!-- Quick Filter Form -->
                            <form wire:submit.prevent="applyQuickFilter" class="space-y-4 sm:space-y-5">
                                <!-- Business Type -->
                                <div>
                                    <label class="block text-sm font-semibold text-[#414141] mb-2">
                                        Jenis Usaha Anda
                                    </label>
                                    <select wire:model="quickFilter.businessType"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#42B2CD] focus:ring-2 focus:ring-[#42B2CD]/20 transition-colors text-sm sm:text-base">
                                        <option value="">Pilih jenis usaha...</option>
                                        <option value="new">Baru Memulai Usaha</option>
                                        <option value="umkm">UMKM / Usaha Kecil</option>
                                        <option value="company">Perusahaan / PT</option>
                                        <option value="personal">Perorangan</option>
                                    </select>
                                </div>

                                <!-- PKP Status -->
                                <div>
                                    <label class="block text-sm font-semibold text-[#414141] mb-2">
                                        Status PKP (Pengusaha Kena Pajak)
                                    </label>
                                    <div class="grid grid-cols-3 gap-2 sm:gap-3">
                                        <label
                                            class="flex items-center justify-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 sm:py-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-[#42B2CD] hover:bg-[#42B2CD]/5 transition-all"
                                            :class="{'border-[#42B2CD] bg-[#42B2CD]/10': $wire.quickFilter.pkpStatus === 'yes'}">
                                            <input type="radio" wire:model="quickFilter.pkpStatus" value="yes"
                                                class="text-[#42B2CD] focus:ring-[#42B2CD]">
                                            <span class="text-xs sm:text-sm font-medium">Sudah PKP</span>
                                        </label>
                                        <label
                                            class="flex items-center justify-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 sm:py-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-[#42B2CD] hover:bg-[#42B2CD]/5 transition-all"
                                            :class="{'border-[#42B2CD] bg-[#42B2CD]/10': $wire.quickFilter.pkpStatus === 'no'}">
                                            <input type="radio" wire:model="quickFilter.pkpStatus" value="no"
                                                class="text-[#42B2CD] focus:ring-[#42B2CD]">
                                            <span class="text-xs sm:text-sm font-medium">Belum PKP</span>
                                        </label>
                                        <label
                                            class="flex items-center justify-center gap-1 sm:gap-2 px-2 sm:px-4 py-2 sm:py-3 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-[#42B2CD] hover:bg-[#42B2CD]/5 transition-all"
                                            :class="{'border-[#42B2CD] bg-[#42B2CD]/10': $wire.quickFilter.pkpStatus === 'not_sure'}">
                                            <input type="radio" wire:model="quickFilter.pkpStatus" value="not_sure"
                                                class="text-[#42B2CD] focus:ring-[#42B2CD]">
                                            <span class="text-xs sm:text-sm font-medium">Tidak Yakin</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Service Need -->
                                <div>
                                    <label class="block text-sm font-semibold text-[#414141] mb-2">
                                        Layanan yang Dibutuhkan
                                    </label>
                                    <select wire:model="quickFilter.serviceNeed"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#42B2CD] focus:ring-2 focus:ring-[#42B2CD]/20 transition-colors text-sm sm:text-base">
                                        <option value="">Semua Layanan</option>
                                        <option value="Perpajakan">Perpajakan</option>
                                        <option value="Keuangan">Keuangan</option>
                                        <option value="Perizinan">Perizinan</option>
                                        <option value="Digital">Digital Marketing</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-3 bg-[#42B2CD] hover:bg-[#3A9FB8] text-white px-4 sm:px-6 py-3 sm:py-4 rounded-xl font-bold text-base sm:text-lg transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <span>Tampilkan Rekomendasi Layanan</span>
                                </button>
                            </form>
                        </div>

                        <!-- Right Side - Image (Hidden on mobile) -->
                        <div class="hidden lg:block relative h-full min-h-[500px] lg:min-h-[600px] animate-fade-left">
                            <div class="absolute inset-0">
                                <img src="{{ asset('image/Home/BerandaBanner.png') }}" alt="Kisantra Services"
                                    class="w-full h-full object-cover lg:object-contain">
                            </div>


                            <!-- Decorative Elements on Image -->
                            <div
                                class="absolute top-10 right-10 w-20 h-20 bg-[#42B2CD]/20 rounded-full blur-2xl animate-pulse">
                            </div>
                            <div
                                class="absolute bottom-20 left-10 w-32 h-32 bg-[#42B2CD]/15 rounded-full blur-2xl animate-pulse-delayed">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Scroll Target for Results -->
            <div id="services-results"></div>

            <!-- Section Header -->
            <div class="mb-12 animate-fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#414141] mb-4">
                    Temukan Produk & Layanan Kisantra
                </h2>
            </div>

            <!-- Main Content: Sidebar + Products -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <!-- LEFT SIDEBAR - Filters -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24 animate-fade-right">

                        <!-- Search Box -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-[#414141] mb-3">
                                Cari Layanan
                            </label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" wire:model.live.debounce.300ms="search"
                                    placeholder="Cari berdasarkan nama..."
                                    class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#42B2CD] focus:ring-2 focus:ring-[#42B2CD]/20 transition-colors">
                            </div>
                        </div>

                        <hr class="my-6 border-gray-200">

                        <!-- Category Filter -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-[#414141] mb-3">
                                Berdasarkan Kategori
                            </label>
                            <div class="space-y-2">
                                <label
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="radio" wire:model.live="selectedCategory" value="all"
                                        class="w-4 h-4 text-[#42B2CD] focus:ring-[#42B2CD]">
                                    <span class="text-sm text-gray-700 font-medium">Semua Layanan</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="radio" wire:model.live="selectedCategory" value="Perpajakan"
                                        class="w-4 h-4 text-slate-600 focus:ring-slate-600">
                                    <span class="text-sm text-gray-700 font-medium">Perpajakan</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="radio" wire:model.live="selectedCategory" value="Keuangan"
                                        class="w-4 h-4 text-emerald-600 focus:ring-emerald-600">
                                    <span class="text-sm text-gray-700 font-medium">Keuangan</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="radio" wire:model.live="selectedCategory" value="Perizinan"
                                        class="w-4 h-4 text-indigo-600 focus:ring-indigo-600">
                                    <span class="text-sm text-gray-700 font-medium">Perizinan</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="radio" wire:model.live="selectedCategory" value="Digital"
                                        class="w-4 h-4 text-amber-600 focus:ring-amber-600">
                                    <span class="text-sm text-gray-700 font-medium">Digital</span>
                                </label>
                            </div>
                        </div>

                        <!-- Reset Filter Button -->
                        <button wire:click="resetFilters"
                            class="w-full flex items-center justify-center gap-2 text-sm text-gray-600 hover:text-[#42B2CD] py-2 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Reset Filter
                        </button>

                    </div>
                </div>

                <!-- RIGHT SIDE - Products Grid -->
                <div class="lg:col-span-3">

                    <!-- Results Count -->
                    <div class="mb-6 animate-fade-up">
                        <p class="text-gray-600">
                            Menampilkan <span class="font-semibold text-[#42B2CD]">{{ count($this->filteredServices)
                                }}</span> layanan
                        </p>
                    </div>

                    <!-- Services Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                        @forelse($this->filteredServices as $index => $service)
                        <div
                            class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 {{ $service['styles']['border_hover'] }} group animate-fade-up animate-delay-{{ min($index * 100, 800) }}">

                            <!-- Card Header with Icon and Category Badge -->
                            <div class="p-6 border-b border-gray-100">
                                <div class="flex items-start justify-between mb-3">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br {{ $service['styles']['icon_bg'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                                        {!! $service['icon'] !!}
                                    </div>
                                    <span
                                        class="px-3 py-1 {{ $service['styles']['badge_bg'] }} {{ $service['styles']['badge_text'] }} text-xs font-semibold rounded-full">
                                        {{ $service['category'] }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-bold text-[#414141] mb-2 transition-colors">
                                    {{ $service['name'] }}
                                </h3>
                                {{-- <p class="text-sm text-gray-500 line-clamp-2">
                                    {!! $service['description'] !!}
                                </p> --}}
                            </div>

                            <!-- Card Body - Price -->
                            <div class="p-6">
                                <div class="mb-4">
                                    <p class="text-2xl font-bold {{ $service['styles']['price_text'] }}">
                                        {{ $service['price'] }}
                                    </p>
                                    @if($service['price_note'])
                                    <p class="text-xs text-gray-500 mt-1">{{ $service['price_note'] }}</p>
                                    @endif
                                </div>

                                <!-- Features List -->
                                @if(!empty($service['features']))
                                <div class="space-y-2 mb-4">
                                    @foreach(array_slice($service['features'], 0, 3) as $feature)
                                    <div class="flex items-start gap-2">
                                        <svg class="w-4 h-4 {{ $service['styles']['feature_icon'] }} mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $feature }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <!-- Card Footer -->
                            <div class="px-6 pb-6">
                                <button wire:click="openModal({{ $service['id'] }})"
                                    class="group inline-flex items-center gap-2 text-slate-700 hover:text-slate-900 font-semibold transition-colors cursor-pointer">
                                    <span>Lihat Detail</span>
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full">
                            <div class="bg-white rounded-2xl shadow-md p-12 text-center animate-fade-up">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                                <h3 class="text-xl font-bold text-gray-700 mb-2">Tidak ada layanan ditemukan</h3>
                                <p class="text-gray-500 mb-4">Coba ubah kata kunci pencarian atau filter kategori</p>
                                <button wire:click="resetFilters"
                                    class="inline-flex items-center gap-2 text-[#42B2CD] hover:text-[#3A9FB8] font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                        </path>
                                    </svg>
                                    Reset Filter
                                </button>
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>

            </div>

            <!-- CTA Section -->
            <div
                class="mt-16 bg-gradient-to-br from-[#42B2CD] to-[#3A9FB8] rounded-3xl p-8 md:p-12 text-center animate-fade-up animate-delay-200">
                <h3 class="text-3xl font-bold text-white mb-4">Tidak Menemukan Layanan yang Anda Cari?</h3>
                <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                    Tim kami siap membantu Anda menemukan solusi yang tepat untuk kebutuhan bisnis Anda
                </p>
                <a href="{{ route('consultation.index') }}"
                    class="inline-flex items-center gap-3 bg-white text-[#42B2CD] px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    Konsultasi Gratis
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

        </div>

        <!-- Include Service Detail Modal -->
        @include('livewire.service.partials.service-modal')
    </div>

    <!-- Auto Scroll Script -->
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('scroll-to-results', () => {
                const element = document.getElementById('services-results');
                if (element) {
                    element.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start',
                        inline: 'nearest'
                    });
                }
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>
        /* Fade Up Animation */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Fade Right Animation */
        @keyframes fadeRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Fade Left Animation */
        @keyframes fadeLeft {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Pulse Delayed Animation */
        @keyframes pulseDelayed {

            0%,
            100% {
                opacity: 0.5;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.1);
            }
        }

        /* Animation Classes */
        .animate-fade-up {
            animation: fadeUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .animate-fade-right {
            animation: fadeRight 0.6s ease-out forwards;
            opacity: 0;
        }

        .animate-fade-left {
            animation: fadeLeft 0.6s ease-out forwards;
            opacity: 0;
        }

        .animate-pulse-delayed {
            animation: pulseDelayed 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            animation-delay: 0.3s;
        }

        /* Stagger Animation Delays */
        .animate-delay-100 {
            animation-delay: 0.1s;
        }

        .animate-delay-200 {
            animation-delay: 0.2s;
        }

        .animate-delay-300 {
            animation-delay: 0.3s;
        }

        .animate-delay-400 {
            animation-delay: 0.4s;
        }

        .animate-delay-500 {
            animation-delay: 0.5s;
        }

        .animate-delay-600 {
            animation-delay: 0.6s;
        }

        .animate-delay-700 {
            animation-delay: 0.7s;
        }

        .animate-delay-800 {
            animation-delay: 0.8s;
        }

        /* Ensure animations trigger */
        .animate-on-scroll {
            opacity: 0;
        }

        .animate-on-scroll.animated {
            animation-play-state: running;
        }
    </style>
</div>