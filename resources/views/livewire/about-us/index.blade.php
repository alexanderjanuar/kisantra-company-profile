<div class="relative">
    <!-- Background Image with Overlay -->
    <!-- About Us Banner -->
    <div class="relative h-96 flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('image/Pattern/BreadCrumbBanner.jpg') }}" alt="About Us Banner"
                class="w-full h-full object-cover">

            <div class="absolute inset-0"
                style="background-image: linear-gradient(282deg, rgba(0,16,47,.5) 19.19%, rgba(0,13,38,.85) 61.36%);">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Tentang Kami</h1>

            <!-- Breadcrumb -->
            <div class="flex items-center justify-center text-sm space-x-2">
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition-colors">
                    Beranda
                </a>
                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-blue-400">Tentang Kami</span>
            </div>
        </div>

        <img class="absolute top-0 left-0 z-1" src="image\Pattern\TopWave.png"></img>
        <img class="absolute top-0 right-80 z-1" src="image\Pattern\CircleTopStrip.png"></img>

    </div>

    @include('components.landing.about-us')


    <!-- Visi & Misi Section -->
    <section class="py-20 bg-white"
        style="background-image: url('{{ asset('image/Pattern/BlueWave.jpg') }}'); background-size: cover;">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 max-w-[1600px] mx-auto items-start">
                <!-- Left Side - Visi & Misi -->
                <div class="space-y-12">
                    <!-- Visi -->
                    <div class="border-l-4 border-gray-200 pl-8" data-aos="fade-right" data-aos-duration="800"
                        data-aos-delay="100">
                        <!-- Icon -->
                        <div class="mb-6">
                            <svg class="w-12 h-12 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>

                        <!-- Title -->
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Visi Kami</h3>

                        <!-- Description -->
                        <p class="text-gray-600 leading-loose text-[18px]">
                            Menjadi perusahaan jasa yang transparan, terpercaya, dan dapat diandalkan dalam memberikan
                            solusi perpajakan, perizinan, keuangan, serta digital marketing.
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-gray-200" data-aos="fade-right" data-aos-duration="800"
                        data-aos-delay="200"></div>

                    <!-- Misi -->
                    <div class="border-l-4 border-gray-200 pl-8" data-aos="fade-right" data-aos-duration="800"
                        data-aos-delay="300">
                        <!-- Icon -->
                        <div class="mb-6">
                            <svg class="w-12 h-12 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>

                        <!-- Title -->
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Misi Kami</h3>

                        <!-- Description -->
                        <p class="text-gray-600 leading-loose text-[18px]">
                            Memberikan layanan profesional, cepat, dan solutif di bidang perpajakan, perizinan, dan
                            digital dengan mengutamakan kualitas, integritas, dan kepuasan klien.
                        </p>
                    </div>
                </div>

                <!-- Right Side - About Content -->
                <div class="lg:border-l-2 border-gray-200 lg:pl-16">
                    <!-- Section Label -->
                    <div class="mb-6" data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">
                        <span class="text-blue-500 font-semibold tracking-wide uppercase text-sm">TENTANG KAMI</span>
                    </div>

                    <!-- Main Heading -->
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight" data-aos="fade-left"
                        data-aos-duration="800" data-aos-delay="200">
                        Lebih dari 100+ klien menggunakan layanan kami.
                    </h2>

                    <!-- Description Paragraph 1 -->
                    <p class="text-gray-600 leading-relaxed mb-6" data-aos="fade-left" data-aos-duration="800"
                        data-aos-delay="300">
                        Kesuksesan Anda adalah misi kami. Sebagai penasihat bisnis, kami menawarkan panduan ahli,
                        membuka potensi Anda untuk pertumbuhan dan profitabilitas.
                    </p>

                    <!-- Description Paragraph 2 -->
                    <p class="text-gray-600 leading-relaxed mb-8" data-aos="fade-left" data-aos-duration="800"
                        data-aos-delay="400">
                        Misi kami adalah memberdayakan bisnis dari semua ukuran untuk berkembang dalam perubahan pasar.
                        Kami berkomitmen untuk memberikan nilai luar biasa di pasar dengan solusi konsultasi yang
                        strategis dan inovatif. Kami melampaui perbaikan jangka pendek untuk memberikan strategi
                        pertumbuhan berkelanjutan yang membuktikan solusi masa depan perusahaan Anda.
                    </p>

                    <!-- CTA Button -->
                    <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="500">
                        <a href="#"
                            class="inline-flex items-center gap-3 bg-blue-900 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-800 transition-colors duration-300 group">
                            HUBUNGI KAMI
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Member Section -->
    {{-- <section class="py-20">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <span class="text-blue-500 font-semibold tracking-wide uppercase text-sm">TIM KAMI</span>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mt-4 leading-tight">
                    Tingkatkan Bisnis Anda dengan <br> Konsultan Ahli
                </h2>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-[1600px] mx-auto">
                <!-- Team Member 1 -->
                <div class="group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=500&fit=crop"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">

                        <!-- Social Media Overlay -->
                        <div
                            class="absolute top-0 right-0 h-full w-16 bg-blue-900 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300 flex flex-col items-center justify-center gap-4">
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Ahmad Wijaya</h3>
                        <p class="text-gray-500 text-sm">Konsultan Pajak</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=500&fit=crop"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">

                        <!-- Social Media Overlay -->
                        <div
                            class="absolute top-0 right-0 h-full w-16 bg-blue-900 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300 flex flex-col items-center justify-center gap-4">
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Siti Nurhaliza</h3>
                        <p class="text-gray-500 text-sm">Konsultan Perizinan</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=500&fit=crop"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">

                        <!-- Social Media Overlay -->
                        <div
                            class="absolute top-0 right-0 h-full w-16 bg-blue-900 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300 flex flex-col items-center justify-center gap-4">
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Budi Santoso</h3>
                        <p class="text-gray-500 text-sm">Konsultan Keuangan</p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="group relative bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300"
                    data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=500&fit=crop"
                            alt="Team Member"
                            class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">

                        <!-- Social Media Overlay -->
                        <div
                            class="absolute top-0 right-0 h-full w-16 bg-blue-900 transform translate-x-full group-hover:translate-x-0 transition-transform duration-300 flex flex-col items-center justify-center gap-4">
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                            <a href="#" class="text-white hover:text-blue-300 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Dewi Lestari</h3>
                        <p class="text-gray-500 text-sm">Digital Marketing Specialist</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</div>