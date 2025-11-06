<div class="relative min-h-screen overflow-hidden bg-white flex items-center py-20" style="background-image: url('{{ asset('image/Pattern/BlueWave.jpg') }}'); background-size: cover;">
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
                            class="shadow-md group relative bg-white rounded-2xl p-10 lg:p-12 min-h-[500px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>

                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            <div
                                class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 rounded-full opacity-20 group-hover:scale-150 group-hover:opacity-30 transition-all duration-700">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8 relative">
                                    <div
                                        class="absolute inset-0 bg-blue-100 rounded-2xl blur-xl opacity-50 group-hover:opacity-0 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative bg-gradient-to-br from-blue-50 to-blue-100 group-hover:from-white/20 group-hover:to-white/10 p-4 rounded-2xl w-fit transition-all duration-500">
                                        <svg class="w-12 h-12 text-blue-600 group-hover:text-white transition-colors duration-500"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2zm0 2v12h16V6H4zm2 2h2v2H6V8zm0 4h2v2H6v-2zm4-4h8v2h-8V8zm0 4h8v2h-8v-2z" />
                                        </svg>
                                    </div>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span class="group-hover:text-white transition-colors duration-500">Keuangan</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-4 mb-8 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Penyusunan laporan keuangan bulanan dan tahunan</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Analisis arus kas dan proyeksi keuangan</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Audit internal dan rekonsiliasi bank</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Konsultasi investasi dan pengelolaan aset</span>
                                    </li>
                                </ul>

                                {{-- Read More Button --}}
                                <div class="mt-auto">
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
                            class="group relative shadow-md bg-white rounded-2xl p-10 lg:p-12 min-h-[500px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            <div
                                class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 rounded-full opacity-20 group-hover:scale-150 group-hover:opacity-30 transition-all duration-700">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8 relative">
                                    <div
                                        class="absolute inset-0 bg-blue-100 rounded-2xl blur-xl opacity-50 group-hover:opacity-0 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative bg-gradient-to-br from-blue-50 to-blue-100 group-hover:from-white/20 group-hover:to-white/10 p-4 rounded-2xl w-fit transition-all duration-500">
                                        <svg class="w-12 h-12 text-blue-600 group-hover:text-white transition-colors duration-500"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 4h7v5h5v11H6V4zm2 8h8v2H8v-2zm0 4h8v2H8v-2z" />
                                        </svg>
                                    </div>
                                </div>
                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span
                                        class="group-hover:text-white transition-colors duration-500">Perpajakan</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-4 mb-8 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Penyusunan dan pelaporan SPT Tahunan/Bulanan.</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Penanganan SP2DK dan surat menyurat dengan DJP</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Konsultasi tax planning dan review pajak</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Pendampingan pemeriksaan pajak dan keberatan</span>
                                    </li>
                                </ul>

                                <div class="mt-auto">
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
                            class="group relative shadow-md bg-white rounded-2xl p-10 lg:p-12 min-h-[500px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            <div
                                class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 rounded-full opacity-20 group-hover:scale-150 group-hover:opacity-30 transition-all duration-700">
                            </div>

                            {{-- Content --}}
                            <div class="relative z-10 flex flex-col h-full">
                                {{-- Icon (no container) --}}
                                <div class="mb-8 relative">
                                    <div
                                        class="absolute inset-0 bg-blue-100 rounded-2xl blur-xl opacity-50 group-hover:opacity-0 transition-opacity duration-500">
                                    </div>
                                    <div
                                        class="relative bg-gradient-to-br from-blue-50 to-blue-100 group-hover:from-white/20 group-hover:to-white/10 p-4 rounded-2xl w-fit transition-all duration-500">
                                        <svg class="w-12 h-12 text-blue-600 group-hover:text-white transition-colors duration-500"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                                        </svg>
                                    </div>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-2xl lg:text-3xl font-bold mb-7 transition-colors duration-500"
                                    style="color: #1e293b;">
                                    <span class="group-hover:text-white transition-colors duration-500">Perizinan</span>
                                </h3>

                                {{-- Description Points --}}
                                <ul class="space-y-4 mb-8 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Pengurusan NIB (Nomor Induk Berusaha) dan OSS</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Izin usaha sektor perdagangan dan industri</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>SIUP, TDP, dan izin domisili perusahaan</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Akta pendirian dan perubahan PT/CV</span>
                                    </li>
                                </ul>

                                {{-- Read More Button --}}
                                <div class="mt-auto">
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
                            class="group relative shadow-md bg-white rounded-2xl p-10 lg:p-12 min-h-[500px] h-full border border-gray-100 hover:border-blue-500 transition-all duration-500 overflow-hidden">
                            {{-- Background Image Overlay (appears on hover) --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl">
                            </div>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-30 transition-opacity duration-500 rounded-2xl"
                                style="background-image: url('{{ asset('image/Home/Services/teamThumb2_3.png') }}'); background-size: cover; background-position: center;">
                            </div>

                            <div
                                class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100 rounded-full opacity-20 group-hover:scale-150 group-hover:opacity-30 transition-all duration-700">
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
                                <ul class="space-y-4 mb-8 flex-grow">
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Pengembangan website dan aplikasi mobile</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Social media marketing dan Google Ads</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Sistem ERP dan digitalisasi dokumen</span>
                                    </li>
                                    <li
                                        class="flex items-start text-gray-600 group-hover:text-white/95 text-base leading-relaxed transition-colors duration-500">
                                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>E-commerce setup dan marketplace management</span>
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
                <div class="swiper-pagination !relative !bottom-0 mt-14 !flex !justify-center !items-center"></div>
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
                        slidesPerView: 1.5,
                        spaceBetween: 24,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 28,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 32,
                    },
                    1280: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                },
            });
        });
        </script>

        {{-- Custom Pagination Styling --}}
        <style>
            .servicesSwiper {
                overflow: visible !important;
            }

            .servicesSwiper .swiper-wrapper {
                align-items: stretch;
            }

            .servicesSwiper .swiper-slide {
                height: auto;
            }

            /* Enhanced Pagination Styling */
            .servicesSwiper .swiper-pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .servicesSwiper .swiper-pagination-bullet {
                width: 10px;
                height: 10px;
                background: #cbd5e1;
                opacity: 1;
                border-radius: 9999px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
                position: relative;
            }

            .servicesSwiper .swiper-pagination-bullet::before {
                content: '';
                position: absolute;
                inset: -4px;
                border: 2px solid transparent;
                border-radius: 9999px;
                transition: all 0.3s ease;
            }

            .servicesSwiper .swiper-pagination-bullet:hover {
                background: #94a3b8;
                transform: scale(1.2);
            }

            .servicesSwiper .swiper-pagination-bullet-active {
                width: 40px;
                background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                box-shadow: 0 4px 20px rgba(59, 130, 246, 0.5);
            }

            .servicesSwiper .swiper-pagination-bullet-active::before {
                border-color: rgba(59, 130, 246, 0.3);
                inset: -6px;
            }

            /* Smooth animations */
            @keyframes pulse {

                0%,
                100% {
                    opacity: 0.6;
                }

                50% {
                    opacity: 0.8;
                }
            }
        </style>
    </div>
</div>