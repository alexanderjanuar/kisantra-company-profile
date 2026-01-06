<div class="relative min-h-screen overflow-hidden bg-[#0a0a0a] flex items-center py-24">

    {{-- Subtle Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#42B2CD]/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-[#42B2CD]/5 rounded-full blur-3xl"></div>
    </div>

    {{-- Main Content Container --}}
    <div class="relative z-10 w-full max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            {{-- Left Side - Content --}}
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000">
                {{-- Section Label --}}
                <div class="inline-block text-[#42B2CD] text-xs font-medium tracking-[3px] uppercase">
                    Pertanyaan Umum
                </div>

                {{-- Main Heading --}}
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight text-white tracking-tight">
                    Hal yang Sering<br class="hidden sm:block">
                    <span class="text-[#42B2CD]">Ditanyakan</span>
                </h2>

                {{-- Description --}}
                <p class="text-gray-400 text-base leading-relaxed max-w-md">
                    Kisantra adalah mitra konsultan yang berfokus pada layanan keuangan, perpajakan, perizinan, dan transformasi digital untuk pertumbuhan bisnis Anda.
                </p>

                {{-- Contact Button --}}
                <div class="pt-4">
                    <a href="https://wa.me/6281180009787?text=Halo%20Kisantra,%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20Anda"
                        target="_blank" rel="noopener noreferrer"
                        class="group inline-flex items-center gap-3 bg-[#42B2CD] hover:bg-[#5BC4DC] text-white px-8 py-4 rounded-full font-medium text-sm transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Hubungi Kami
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Right Side - FAQ Accordion --}}
            <div class="space-y-4" data-aos="fade-left" data-aos-duration="1000">
                {{-- FAQ Item 1 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="0"
                    class="bg-white/[0.03] backdrop-blur-sm rounded-xl overflow-hidden transition-all duration-300 border border-white/[0.06] hover:border-[#42B2CD]/20">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 text-left transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-sm font-medium text-[#42B2CD]">01</span>
                            <h3 class="text-base font-medium pr-4 text-white/90">
                                Layanan apa yang ditawarkan Kisantra untuk bisnis?
                            </h3>
                        </div>
                        <svg class="w-5 h-5 text-[#42B2CD] flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 pb-6">
                        <div class="pl-10 text-gray-400 text-sm leading-relaxed">
                            Kami menawarkan layanan konsultan bisnis meliputi perpajakan, keuangan, perizinan usaha, dan digital marketing untuk membantu bisnis Anda berkembang secara optimal.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100"
                    class="bg-white/[0.03] backdrop-blur-sm rounded-xl overflow-hidden transition-all duration-300 border border-white/[0.06] hover:border-[#42B2CD]/20">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 text-left transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-sm font-medium text-[#42B2CD]">02</span>
                            <h3 class="text-base font-medium pr-4 text-white/90">
                                Apakah Kisantra melayani klien di luar Samarinda?
                            </h3>
                        </div>
                        <svg class="w-5 h-5 text-[#42B2CD] flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 pb-6">
                        <div class="pl-10 text-gray-400 text-sm leading-relaxed">
                            Ya, kami melayani klien di seluruh Indonesia dan juga menyediakan konsultasi online untuk klien internasional. Lokasi bukan hambatan bagi kami.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200"
                    class="bg-white/[0.03] backdrop-blur-sm rounded-xl overflow-hidden transition-all duration-300 border border-white/[0.06] hover:border-[#42B2CD]/20">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 text-left transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-sm font-medium text-[#42B2CD]">03</span>
                            <h3 class="text-base font-medium pr-4 text-white/90">
                                Bagaimana cara melacak progres proyek konsultasi?
                            </h3>
                        </div>
                        <svg class="w-5 h-5 text-[#42B2CD] flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 pb-6">
                        <div class="pl-10 text-gray-400 text-sm leading-relaxed">
                            Kami menyediakan laporan berkala dan update rutin melalui email serta meeting untuk memastikan transparansi dan komunikasi yang baik dengan klien.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300"
                    class="bg-white/[0.03] backdrop-blur-sm rounded-xl overflow-hidden transition-all duration-300 border border-white/[0.06] hover:border-[#42B2CD]/20">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 text-left transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-sm font-medium text-[#42B2CD]">04</span>
                            <h3 class="text-base font-medium pr-4 text-white/90">
                                Berapa lama waktu yang dibutuhkan untuk konsultasi?
                            </h3>
                        </div>
                        <svg class="w-5 h-5 text-[#42B2CD] flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 pb-6">
                        <div class="pl-10 text-gray-400 text-sm leading-relaxed">
                            Durasi bervariasi tergantung kompleksitas. Konsultasi sederhana membutuhkan 2-4 minggu, sedangkan proyek kompleks dapat memakan waktu 1-3 bulan.
                        </div>
                    </div>
                </div>

                {{-- FAQ Item 5 --}}
                <div x-data="{ open: false }" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400"
                    class="bg-white/[0.03] backdrop-blur-sm rounded-xl overflow-hidden transition-all duration-300 border border-white/[0.06] hover:border-[#42B2CD]/20">
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between p-6 text-left transition-colors duration-300">
                        <div class="flex items-start gap-4 flex-1">
                            <span class="text-sm font-medium text-[#42B2CD]">05</span>
                            <h3 class="text-base font-medium pr-4 text-white/90">
                                Bagaimana cara memulai konsultasi dengan Kisantra?
                            </h3>
                        </div>
                        <svg class="w-5 h-5 text-[#42B2CD] flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2" class="px-6 pb-6">
                        <div class="pl-10 text-gray-400 text-sm leading-relaxed">
                            Sangat mudah! Hubungi kami melalui tombol WhatsApp atau formulir kontak. Tim kami akan mengatur meeting awal untuk memahami kebutuhan bisnis Anda.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
