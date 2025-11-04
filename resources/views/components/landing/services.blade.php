<div class="relative min-h-screen overflow-hidden bg-white flex items-center py-20">
    {{-- Background Pattern --}}
    <div class="absolute inset-x-0 top-0 h-full z-0 flex items-start justify-center pt-10">
        <div class="relative w-[1400px] h-full">
            <div class="absolute inset-0 bg-repeat opacity-10"
                style="background-image: url('{{ asset('image/Logo/KisantraPattern.jpg') }}'); background-size: 1200px 1200px;">
            </div>
            {{-- Blur overlay from all sides to center --}}
            <div class="absolute inset-0 bg-gradient-to-r from-white via-transparent to-white"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-white/30 via-transparent to-white"></div>
            <div class="absolute inset-0"
                style="background: radial-gradient(ellipse at center, rgba(255,255,255,0.6) 0%, rgba(255,255,255,0.4) 20%, rgba(255,255,255,0.7) 50%, rgba(255,255,255,0.9) 70%, rgba(255,255,255,1) 100%);">
            </div>
            {{-- Additional blur effect at center --}}
            <div class="absolute inset-0"
                style="background: radial-gradient(circle at center, rgba(255,255,255,0.5) 0%, transparent 35%);">
            </div>
        </div>
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 w-full mx-auto px-4 sm:px-6 lg:px-12 xl:px-20">
        {{-- Section Header --}}
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <div class="inline-block bg-blue-50 text-blue-500 px-4 py-2 rounded-lg text-sm font-medium mb-6">
                Layanan Kami
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900" style="color: #1e293b;">
                Mitra Terpercaya untuk<br>Kebutuhan Bisnis Anda
            </h2>
        </div>

        {{-- Services Grid with Swiper.js --}}
        <div class="relative">
            {{-- Swiper Container --}}
            <div class="swiper servicesSwiper">
                <div class="swiper-wrapper">
                    {{-- Service Card 1: Keuangan --}}
                    <div class="swiper-slide">
                        <div
                            class="shadow-md group relative bg-white rounded-2xl p-10 lg:p-12 min-h-[550px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8">
                                    <svg class="w-16 h-16 text-blue-600 group-hover:text-white transition-colors duration-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2zm0 2v12h16V6H4zm2 2h2v2H6V8zm0 4h2v2H6v-2zm4-4h8v2h-8V8zm0 4h8v2h-8v-2z" />
                                    </svg>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span class="group-hover:text-white transition-colors duration-500">Keuangan</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-5 mb-10 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Perencanaan keuangan strategis untuk menyelaraskan teknologi dengan tujuan
                                            bisnis Anda.</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Penilaian komprehensif dan rekomendasi untuk mengoptimalkan infrastruktur
                                            keuangan Anda.</span>
                                    </li>
                                </ul>

                                {{-- Read More Button --}}
                                <div class="mt-auto pt-4">
                                    <a href="#"
                                        class="inline-flex items-center gap-2 bg-blue-600 group-hover:bg-white text-white group-hover:text-blue-600 px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-500 hover:shadow-lg hover:scale-105">
                                        Selengkapnya
                                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Service Card 2: Perpajakan --}}
                    <div class="swiper-slide">
                        <div
                            class="group relative shadow-md bg-white rounded-2xl p-10 lg:p-12 min-h-[550px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8">
                                    <svg class="w-16 h-16 text-blue-600 group-hover:text-white transition-colors duration-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 4h7v5h5v11H6V4zm2 8h8v2H8v-2zm0 4h8v2H8v-2z" />
                                    </svg>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span
                                        class="group-hover:text-white transition-colors duration-500">Perpajakan</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-5 mb-10 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Konsultasi perpajakan untuk memastikan kepatuhan dan optimalisasi pajak
                                            perusahaan.</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Perencanaan pajak strategis untuk meminimalkan beban pajak secara
                                            legal.</span>
                                    </li>
                                </ul>

                                {{-- Read More Button --}}
                                <div class="mt-auto pt-4">
                                    <a href="#"
                                        class="inline-flex items-center gap-2 bg-blue-600 group-hover:bg-white text-white group-hover:text-blue-600 px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-500 hover:shadow-lg hover:scale-105">
                                        Selengkapnya
                                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Service Card 3: Perizinan --}}
                    <div class="swiper-slide">
                        <div
                            class="group relative shadow-md bg-white rounded-2xl p-10 lg:p-12 min-h-[550px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8">
                                    <svg class="w-16 h-16 text-blue-600 group-hover:text-white transition-colors duration-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                                    </svg>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span class="group-hover:text-white transition-colors duration-500">Perizinan</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-5 mb-10 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Bantuan pengurusan perizinan usaha dan legalitas perusahaan yang
                                            lengkap.</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Konsultasi regulasi dan kepatuhan untuk memastikan operasional yang
                                            legal.</span>
                                    </li>
                                </ul>

                                {{-- Read More Button --}}
                                <div class="mt-auto pt-4">
                                    <a href="#"
                                        class="inline-flex items-center gap-2 bg-blue-600 group-hover:bg-white text-white group-hover:text-blue-600 px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-500 hover:shadow-lg hover:scale-105">
                                        Selengkapnya
                                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Service Card 4: Digital --}}
                    <div class="swiper-slide">
                        <div
                            class="group relative shadow-md bg-white rounded-2xl p-10 lg:p-12 min-h-[550px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8">
                                    <svg class="w-16 h-16 text-blue-600 group-hover:text-white transition-colors duration-500"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM4 9h10.5v3.5H4V9zm0 5.5h10.5V18H4v-3.5zM20 18h-3.5V9H20v9z" />
                                    </svg>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span class="group-hover:text-white transition-colors duration-500">Digital</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-5 mb-10 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Transformasi digital untuk meningkatkan efisiensi dan daya saing bisnis
                                            Anda.</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white text-base leading-relaxed transition-colors duration-500">
                                        <span
                                            class="text-gray-400 group-hover:text-white mr-3 mt-1 transition-colors duration-500">•</span>
                                        <span>Strategi pemasaran digital dan pengembangan sistem informasi
                                            terintegrasi.</span>
                                    </li>
                                </ul>

                                {{-- Read More Button --}}
                                <div class="mt-auto pt-4">
                                    <a href="#"
                                        class="inline-flex items-center gap-2 bg-blue-600 group-hover:bg-white text-white group-hover:text-blue-600 px-6 py-3 rounded-xl font-semibold text-sm transition-all duration-500 hover:shadow-lg hover:scale-105">
                                        Selengkapnya
                                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pagination --}}
                <div class="swiper-pagination !relative !bottom-0 mt-12"></div>
            </div>
        </div>

        {{-- Swiper JS Initialization --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const servicesSwiper = new Swiper('.servicesSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                speed: 700,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
        });
        </script>

        {{-- Custom Pagination Styling --}}
        <style>
            .servicesSwiper .swiper-pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 8px;
            }

            .servicesSwiper .swiper-pagination-bullet {
                width: 8px;
                height: 8px;
                background: #d1d5db;
                opacity: 1;
                border-radius: 9999px;
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .servicesSwiper .swiper-pagination-bullet:hover {
                background: #9ca3af;
                transform: scale(1.1);
            }

            .servicesSwiper .swiper-pagination-bullet-active {
                width: 32px;
                background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
            }

            /* Ensure all cards have equal height */
            .servicesSwiper .swiper-wrapper {
                align-items: stretch;
            }
        </style>
    </div>
</div>