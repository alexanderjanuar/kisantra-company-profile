<div class="relative min-h-[80vh] overflow-hidden flex items-center py-20">
    {{-- Decorative Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        {{-- Blob 1 - Top Left (Bigger) --}}
        <div class="absolute top-30 left-15 w-[500px] h-[500px] bg-blue-200 rounded-full opacity-40 blur-3xl"></div>

        {{-- Blob 2 - Top Right (Bigger) --}}
        <div class="absolute top-10 -right-40 w-[600px] h-[600px] bg-blue-100 rounded-full opacity-50 blur-3xl"></div>

        {{-- Blob 4 - Bottom Right (Bigger) --}}
        <div class="absolute bottom-0 -right-48 w-[550px] h-[550px] bg-indigo-100 rounded-full opacity-40 blur-3xl">
        </div>

        {{-- Decorative Dotted Pattern (Bigger) --}}
        <div class="absolute top-32 right-32 grid grid-cols-4 gap-4 opacity-15">
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
            <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
        </div>

    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 w-full max-w-[1920px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 ">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 lg:gap-12 xl:gap-16 items-start">

            {{-- Left Side - Content --}}
            <div class="space-y-6 sm:space-y-8" data-aos="fade-right" data-aos-duration="1000">
                {{-- Section Label --}}
                <div class="inline-block bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium">
                    FAQ Kami
                </div>

                {{-- Main Heading --}}
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight"
                    style="color: #1e293b;">
                    Pertanyaan yang Sering<br class="hidden sm:block">Diajukan Tentang Kisantra
                </h2>

                {{-- Description --}}
                <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                    Kisantra adalah perusahaan konsultan yang berfokus pada layanan keuangan dan perpajakan. Kami
                    membantu bisnis Anda dalam pengelolaan keuangan, kepatuhan pajak, dan optimalisasi finansial untuk
                    pertumbuhan yang berkelanjutan.
                </p>

                {{-- Contact Button and Phone --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 pt-4">
                    <a href="#"
                        class="group inline-flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-full font-semibold text-sm sm:text-base transition-all duration-300 hover:shadow-lg w-full sm:w-auto justify-center sm:justify-start">
                        Hubungi Kami
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs sm:text-sm text-gray-500">Hubungi Kami</p>
                            <p class="text-base sm:text-lg font-bold" style="color: #1e293b;">+62 812 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Side - FAQ Accordion --}}
            <div class="space-y-4" data-aos="fade-left" data-aos-duration="1000">
                {{-- FAQ Item 1 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="0"
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">1.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Layanan Apa yang Anda Tawarkan untuk Konsultan Bisnis?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Kami menawarkan berbagai layanan konsultan bisnis termasuk perencanaan strategis, analisis
                            keuangan, optimasi operasional, dan konsultasi manajemen untuk membantu bisnis Anda
                            berkembang.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150"
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">2.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Lokasi Mana Saja yang Anda Layani? Apakah Menyediakan Layanan Global?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Kami melayani klien di seluruh Indonesia dan juga menyediakan layanan konsultasi secara
                            online untuk klien internasional. Kami siap membantu bisnis Anda di mana pun lokasinya.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300"
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">3.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Bagaimana Cara Saya Melacak Progres Proyek Saya?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Kami menyediakan dashboard khusus dan laporan berkala untuk memantau progres proyek Anda.
                            Tim kami juga akan memberikan update rutin melalui email dan meeting untuk memastikan
                            transparansi penuh.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="450"
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">4.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Berapa Estimasi Waktu Pengerjaan untuk Satu Konsultasi?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Estimasi waktu konsultasi bervariasi tergantung kompleksitas proyek. Umumnya, konsultasi
                            sederhana membutuhkan 2-4 minggu, sementara proyek yang lebih kompleks dapat memakan waktu
                            1-3 bulan.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="600"
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">5.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Bagaimana Cara Memulai Konsultasi Bisnis dengan Tim Anda?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Sangat mudah! Anda dapat menghubungi kami melalui tombol "Hubungi Kami" atau langsung
                            menelepon nomor yang tertera. Tim kami akan mengatur meeting awal untuk memahami kebutuhan
                            bisnis Anda.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Alpine.js CDN (add this to your layout if not already included) --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</div>