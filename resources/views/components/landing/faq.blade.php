<div class="relative min-h-[80vh] overflow-hidden flex items-center py-20">
    {{-- Main Content Container --}}
    <div class="relative z-10 w-full max-w-[1920px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-16 py-20">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            {{-- Left Side - Content --}}
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000">
                {{-- Section Label --}}
                <div class="inline-block bg-blue-50 text-blue-500 px-4 py-2 rounded-lg text-sm font-medium">
                    FAQ Kami
                </div>

                {{-- Main Heading --}}
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight" style="color: #1e293b;">
                    Pertanyaan yang Sering<br>Diajukan Tentang Kisantra
                </h2>

                {{-- Description --}}
                <p class="text-gray-600 text-lg leading-relaxed">
                    Perusahaan IT atau MSP yang menjaga IT Anda berjalan lancar setiap saat seperti tukang ledeng yang memperbaiki pipa Anda; itulah yang seharusnya mereka lakukan.
                </p>

                {{-- Contact Button and Phone --}}
                <div class="flex items-center gap-4 pt-4">
                    <a href="#" class="group inline-flex items-center gap-3 bg-blue-500 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold text-base transition-all duration-300 hover:shadow-lg">
                        Hubungi Kami
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Hubungi Kami</p>
                            <p class="text-lg font-bold" style="color: #1e293b;">+62 812 3456 7890</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Side - FAQ Accordion --}}
            <div class="space-y-4" data-aos="fade-left" data-aos-duration="1000">
                {{-- FAQ Item 1 --}}
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">1.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Layanan Apa yang Anda Tawarkan untuk Konsultan Bisnis?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300" 
                             :class="{ 'rotate-180': open }" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Kami menawarkan berbagai layanan konsultan bisnis termasuk perencanaan strategis, analisis keuangan, optimasi operasional, dan konsultasi manajemen untuk membantu bisnis Anda berkembang.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">2.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Lokasi Mana Saja yang Anda Layani? Apakah Menyediakan Layanan Global?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300" 
                             :class="{ 'rotate-180': open }" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Kami melayani klien di seluruh Indonesia dan juga menyediakan layanan konsultasi secara online untuk klien internasional. Kami siap membantu bisnis Anda di mana pun lokasinya.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">3.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Bagaimana Cara Saya Melacak Progres Proyek Saya?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300" 
                             :class="{ 'rotate-180': open }" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Kami menyediakan dashboard khusus dan laporan berkala untuk memantau progres proyek Anda. Tim kami juga akan memberikan update rutin melalui email dan meeting untuk memastikan transparansi penuh.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">4.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Berapa Estimasi Waktu Pengerjaan untuk Satu Konsultasi?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300" 
                             :class="{ 'rotate-180': open }" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Estimasi waktu konsultasi bervariasi tergantung kompleksitas proyek. Umumnya, konsultasi sederhana membutuhkan 2-4 minggu, sementara proyek yang lebih kompleks dapat memakan waktu 1-3 bulan.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-6 lg:p-8 text-left hover:bg-gray-50 transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-lg font-bold text-gray-400">5.</span>
                            <h3 class="text-lg font-bold pr-4" style="color: #1e293b;">
                                Bagaimana Cara Memulai Konsultasi Bisnis dengan Tim Anda?
                            </h3>
                        </div>
                        <svg class="w-6 h-6 text-gray-400 flex-shrink-0 transition-transform duration-300" 
                             :class="{ 'rotate-180': open }" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 lg:px-8 pb-6 lg:pb-8">
                        <div class="pl-8 text-gray-600 leading-relaxed">
                            Sangat mudah! Anda dapat menghubungi kami melalui tombol "Hubungi Kami" atau langsung menelepon nomor yang tertera. Tim kami akan mengatur meeting awal untuk memahami kebutuhan bisnis Anda.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>