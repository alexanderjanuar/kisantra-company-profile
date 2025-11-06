<div class="relative min-h-screen overflow-hidden bg-white flex items-center" style="">

    <img class="absolute top-0 right-0 z-1 w-lg" src="image\Pattern\WhiteShape.png"></img>
    
    {{-- Main Content Container --}}
    <div class="relative z-10 w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-16 pt-20">
        <div class="flex flex-col lg:flex-row gap-12 items-center">
            {{-- Left Section: Images - Hidden on smaller screens --}}
            <div class="hidden lg:flex w-full lg:w-1/2 gap-2 h-[700px]" data-aos="fade-right" data-aos-duration="1000">
                {{-- Left Column: Small Image + Card --}}
                <div class="w-[40%] flex flex-col gap-2 h-full">
                    {{-- Top Image - 80% --}}
                    <div class="relative h-[80%]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                        <img src="{{ asset('image/Home/About Us/about-us-1.jpg') }}" alt="Tim konsultan pajak"
                            class="w-full h-full rounded-3xl shadow-xl object-cover">
                    </div>

                    {{-- Data Investment Card - 20% --}}
                    <div class="bg-white rounded-3xl shadow-xl p-4 lg:p-6 w-full h-[20%] flex flex-col justify-center"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="text-4xl lg:text-5xl font-bold text-blue-600 mb-1">98%</div>
                        <div class="text-gray-600 text-sm lg:text-base">Klien Puas</div>
                    </div>
                </div>

                {{-- Right Column: Large Image --}}
                <div class="w-[60%] h-full" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <img src="{{ asset('image/Home/About Us/about-us-2.jpg') }}" alt="Konsultasi perpajakan"
                        class="w-full h-full rounded-3xl shadow-xl object-cover">
                </div>
            </div>

            {{-- Right Section: Content --}}
            <div class="w-full lg:w-1/2 space-y-4 text-center lg:text-left" data-aos="fade-left"
                data-aos-duration="1000">
                {{-- Header --}}
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="inline-block bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium mb-4">
                        Tentang Perusahaan Kami
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-[3.5rem] font-bold text-navy-900 leading-tight mb-6"
                        style="color: #1e293b;">
                        Melangkah Maju Dan Memberikan Perubahan Untuk Pelayanan Yang Lebih Baik
                    </h1>
                </div>

                {{-- Mission Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    {{-- Card 1 --}}
                    <div class="flex items-center space-x-4 justify-center lg:justify-start">
                        <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-navy-900" style="color: #1e293b;">Konsultan Pajak<br>Terdaftar
                            & Bersertifikat</h3>
                    </div>

                    {{-- Card 2 --}}
                    <div class="flex items-center space-x-4 justify-center lg:justify-start">
                        <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-navy-900" style="color: #1e293b;">Membantu
                            Kepatuhan<br>Perpajakan Anda</h3>
                    </div>
                </div>

                <hr class="border-gray-200 my-6">

                {{-- Description --}}
                <p class="text-gray-600 leading-relaxed mb-6 text-base" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="300">
                    PT Kinara Sadayatra Nusantara berdiri pada tahun 2025 dengan komitmen menghadirkan solusi bisnis
                    yang andal di bidang perpajakan, keuangan, perizinan, dan digital marketing. Kami hadir sebagai
                    mitra strategis bagi pelaku usaha yang membutuhkan layanan terintegrasi, akurat, dan sesuai
                    regulasi, sehingga aktivitas bisnis dapat berjalan lebih efisien dan berkelanjutan.

                    Dengan didukung tenaga profesional dan sistem kerja yang terstruktur, PT Kinara Sadayatra Nusantara
                    berupaya memberikan rasa aman, kepercayaan, dan kepastian layanan bagi setiap klien, baik individu,
                    UMKM, maupun korporasi.
                </p>

                {{-- CTA Button and Clients --}}
                <div class="flex flex-col sm:flex-row items-center lg:items-start sm:items-center gap-4"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="#"
                        class="inline-flex items-center gap-3 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-colors shadow-md">
                        Selengkapnya
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.landing.client')