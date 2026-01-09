{{-- Full Horizontal Scroll Homepage - Kisantra with Tailwind CSS --}}

{{-- Splash Screen --}}
<div id="splashScreen" class="fixed inset-0 z-[9999] bg-gray-950 flex items-center justify-center overflow-hidden"
    x-data="splashScreen()" x-show="show" x-transition:leave="transition-all duration-1000 ease-in-out"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-110" x-init="initSplash()">

    {{-- Animated Liquid Background --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Multiple Bouncing Blobs with REDUCED Opacity --}}
        <template x-for="blob in blobs" :key="blob.id">
            <div class="liquid-blob absolute rounded-full blur-[80px] transition-all duration-100 ease-linear" :style="{
                     width: blob.size + 'px',
                     height: blob.size + 'px',
                     left: blob.x + 'px',
                     top: blob.y + 'px',
                     background: blob.gradient,
                     opacity: blob.opacity
                 }">
            </div>
        </template>

        {{-- Static Large Background Blobs - REDUCED OPACITY --}}
        <div
            class="absolute w-[800px] h-[800px] bg-cyan-500/15 rounded-full blur-[150px] -top-40 -left-40 animate-pulse">
        </div>
        <div class="absolute w-[700px] h-[700px] bg-cyan-400/12 rounded-full blur-[130px] -bottom-32 -right-32 animate-pulse"
            style="animation-delay: 0.5s;"></div>
        <div class="absolute w-[600px] h-[600px] bg-blue-500/10 rounded-full blur-[120px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse"
            style="animation-delay: 1s;"></div>

        {{-- Animated Lines - REDUCED OPACITY --}}
        <div class="absolute inset-0 opacity-15">
            <div
                class="absolute top-1/4 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-cyan-500 to-transparent animate-[slideRight_3s_ease-in-out_infinite]">
            </div>
            <div class="absolute top-1/2 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-cyan-400 to-transparent animate-[slideRight_3s_ease-in-out_infinite]"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute top-3/4 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-cyan-500 to-transparent animate-[slideRight_3s_ease-in-out_infinite]"
                style="animation-delay: 1s;"></div>
        </div>

        {{-- Particle Effect - REDUCED OPACITY --}}
        <div class="absolute inset-0 opacity-20">
            <template x-for="particle in particles" :key="particle.id">
                <div class="absolute w-1 h-1 bg-cyan-400 rounded-full animate-pulse" :style="{
                         left: particle.x + '%',
                         top: particle.y + '%',
                         animationDelay: particle.delay + 's',
                         animationDuration: particle.duration + 's'
                     }">
                </div>
            </template>
        </div>
    </div>

    {{-- Logo and Content --}}
    <div class="relative z-10 flex flex-col items-center gap-8">
        {{-- Logo Container with Animation --}}
        <div class="logo-container relative">
            {{-- Rotating Rings - REDUCED OPACITY --}}
            <div class="absolute inset-0 -m-8 border-2 border-cyan-500/25 rounded-full animate-spin"
                style="animation-duration: 8s;"></div>
            <div class="absolute inset-0 -m-12 border-2 border-cyan-400/20 rounded-full animate-spin"
                style="animation-duration: 12s; animation-direction: reverse;"></div>
            <div class="absolute inset-0 -m-16 border border-cyan-300/12 rounded-full animate-spin"
                style="animation-duration: 15s;"></div>

            {{-- Pulsing Glow - REDUCED OPACITY --}}
            <div class="absolute inset-0 -m-4 bg-cyan-500/15 rounded-full blur-2xl animate-pulse"></div>

            {{-- Logo Image --}}
            <div class="relative w-32 h-32 sm:w-40 sm:h-40 animate-[scaleIn_0.8s_ease-out]">
                <img src="{{ asset('image/Logo/OnlyLogo.png') }}" alt="Kisantra Logo"
                    class="w-full h-full object-contain drop-shadow-[0_0_40px_rgba(66,178,205,0.4)]">
            </div>
        </div>

        {{-- Company Name with Animation --}}
        <div class="text-center animate-[fadeInUp_0.8s_ease-out_0.3s_both]">
            <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2 tracking-tight">
                Kisantra
            </h1>
            <p class="text-sm sm:text-base text-cyan-400 font-medium tracking-[0.2em] uppercase">
                PT Kinara Sadayatra Nusantara
            </p>
        </div>

        {{-- Loading Bar --}}
        <div class="w-64 h-1 bg-white/10 rounded-full overflow-hidden animate-[fadeInUp_0.8s_ease-out_0.5s_both]">
            <div
                class="h-full bg-gradient-to-r from-cyan-500 to-cyan-400 rounded-full animate-[loadingBar_2.5s_ease-in-out]">
            </div>
        </div>

        {{-- Tagline --}}
        <p
            class="text-white/50 text-xs sm:text-sm text-center max-w-md px-4 animate-[fadeInUp_0.8s_ease-out_0.7s_both]">
            Solusi Perpajakan, Keuangan & Digital Marketing
        </p>
    </div>
</div>

<div class="horizontal-homepage relative w-full h-screen overflow-hidden bg-gray-950" x-data="horizontalHomepage()"
    x-init="init()" @mousemove.window="onMouseMove($event)">

    {{-- Interactive Fluid Background with Ripple Effect --}}
    <div class="fluid-bg fixed inset-0 z-0 overflow-hidden pointer-events-none">
        {{-- Bouncing Liquid Blobs - ENHANCED VISIBILITY --}}
        <template x-for="blob in liquidBlobs" :key="blob.id">
            <div class="liquid-blob-dynamic absolute rounded-full blur-[100px] transition-all duration-100 ease-linear"
                :style="{
                     width: blob.size + 'px',
                     height: blob.size + 'px',
                     left: blob.x + 'px',
                     top: blob.y + 'px',
                     background: blob.gradient,
                     opacity: blob.opacity
                 }">
            </div>
        </template>

        {{-- Static Animated Blobs - MUCH MORE VISIBLE --}}
        <div class="fluid-blob blob-1 absolute rounded-full blur-[120px] opacity-100 transition-transform duration-200 ease-out will-change-transform"
            :style="{ transform: `translate(${blobX * 0.05}px, ${blobY * 0.05}px)` }"></div>
        <div class="fluid-blob blob-2 absolute rounded-full blur-[120px] opacity-100 transition-transform duration-200 ease-out will-change-transform"
            :style="{ transform: `translate(${blobX * -0.04}px, ${blobY * 0.06}px)` }"></div>
        <div class="fluid-blob blob-3 absolute rounded-full blur-[120px] opacity-95 transition-transform duration-200 ease-out will-change-transform"
            :style="{ transform: `translate(${blobX * 0.06}px, ${blobY * -0.04}px)` }"></div>
        <div class="fluid-blob blob-4 absolute rounded-full blur-[120px] opacity-90 transition-transform duration-200 ease-out will-change-transform"
            :style="{ transform: `translate(${blobX * -0.03}px, ${blobY * -0.05}px)` }"></div>

        {{-- SUBTLE Mouse Trail Ripple Container --}}
        <div class="ripple-container fixed inset-0 pointer-events-none z-[1]" x-ref="rippleContainer">
            <template x-for="ripple in ripples" :key="ripple.id">
                <div class="ripple absolute w-4 h-4 rounded-full pointer-events-none" :style="{
                         left: ripple.x + 'px',
                         top: ripple.y + 'px',
                         animationDelay: '0s'
                     }">
                </div>
            </template>
        </div>

        {{-- ENHANCED Cursor glow effect - MORE VISIBLE --}}
        <div class="cursor-glow fixed w-[500px] h-[500px] rounded-full pointer-events-none -translate-x-1/2 -translate-y-1/2 transition-opacity duration-300 z-[1] blur-[50px]"
            :style="{
                 left: mouseX + 'px',
                 top: mouseY + 'px',
                 opacity: isMoving ? 1 : 0.6
             }">
        </div>

        <div class="fluid-gradient absolute inset-0"></div>
        <div class="noise-overlay absolute inset-0 opacity-[0.03] mix-blend-overlay"></div>
    </div>

    {{-- Progress Bar --}}
    <div class="progress-container fixed top-0 left-0 w-full h-[3px] bg-white/[0.08] z-[1000]">
        <div class="progress-bar h-full bg-gradient-to-r from-cyan-500 via-cyan-400 to-cyan-500 bg-[length:200%_100%] transition-[width] duration-100 ease-out shadow-[0_0_10px_rgba(66,178,205,0.5)]"
            :style="{ width: scrollProgress + '%' }"></div>
    </div>

    {{-- Section Navigation --}}
    <nav class="section-nav fixed right-12 top-1/2 -translate-y-1/2 flex flex-col gap-5 z-[100]">
        <template x-for="(section, index) in sections" :key="index">
            <button @click="goToSection(index)" :class="{ 'active': currentSection === index }"
                class="nav-item flex items-center gap-3.5 bg-transparent border-0 cursor-pointer p-0 group">
                <span
                    class="nav-dot w-2.5 h-2.5 rounded-full bg-white/20 border border-white/10 transition-all duration-300 group-hover:bg-cyan-500/50 group-hover:border-cyan-500 group-hover:scale-[1.4]"></span>
                <span
                    class="nav-label text-[11px] text-white/40 opacity-0 translate-x-2.5 transition-all duration-300 whitespace-nowrap tracking-wider group-hover:opacity-100 group-hover:translate-x-0 group-hover:text-white/70"
                    x-text="section"></span>
            </button>
        </template>
    </nav>

    {{-- Scroll Container --}}
    <div class="scroll-container flex flex-row h-screen w-full overflow-x-scroll overflow-y-hidden scroll-smooth snap-x snap-mandatory scrollbar-hide"
        x-ref="scrollContainer" @scroll="onScroll">

        {{-- Section 1: Hero --}}
        @include('components.landing.hero')

        {{-- Section 2: About Us --}}
        @include('components.landing.about-us')

        {{-- Section 3: Services --}}
        <section
            class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
            data-index="2">
            <div class="section-inner wide relative z-10 w-full max-w-[1600px]">
                <div class="services-header mb-[60px]">
                    <span
                        class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">Layanan
                        Kami</span>
                    <h2
                        class="section-title text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                        Solusi Lengkap Untuk<br>
                        <span class="text-cyan-500">Kebutuhan Bisnis</span>
                    </h2>
                </div>
                <div class="services-grid grid grid-cols-4 gap-7">
                    <div
                        class="service-card bg-white/[0.025] border border-white/[0.05] rounded-[24px] px-8 py-10 transition-all duration-400 hover:bg-white/[0.06] hover:border-cyan-500/30 hover:-translate-y-2.5">
                        <div
                            class="service-icon w-16 h-16 bg-cyan-500/10 rounded-[18px] flex items-center justify-center mb-7 text-cyan-500 transition-all duration-300 group-hover:bg-cyan-500 group-hover:text-white group-hover:scale-110">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-semibold text-white mb-3.5">Keuangan</h3>
                        <p class="text-[15px] leading-[1.65] text-white/45">Laporan keuangan, analisis arus kas, audit
                            internal, dan konsultasi investasi.</p>
                    </div>
                    <div
                        class="service-card bg-white/[0.025] border border-white/[0.05] rounded-[24px] px-8 py-10 transition-all duration-400 hover:bg-white/[0.06] hover:border-cyan-500/30 hover:-translate-y-2.5">
                        <div
                            class="service-icon w-16 h-16 bg-cyan-500/10 rounded-[18px] flex items-center justify-center mb-7 text-cyan-500 transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-semibold text-white mb-3.5">Perpajakan</h3>
                        <p class="text-[15px] leading-[1.65] text-white/45">SPT, tax planning, penanganan SP2DK, dan
                            pendampingan pemeriksaan pajak.</p>
                    </div>
                    <div
                        class="service-card bg-white/[0.025] border border-white/[0.05] rounded-[24px] px-8 py-10 transition-all duration-400 hover:bg-white/[0.06] hover:border-cyan-500/30 hover:-translate-y-2.5">
                        <div
                            class="service-icon w-16 h-16 bg-cyan-500/10 rounded-[18px] flex items-center justify-center mb-7 text-cyan-500 transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-semibold text-white mb-3.5">Perizinan</h3>
                        <p class="text-[15px] leading-[1.65] text-white/45">NIB, OSS, SIUP, TDP, akta pendirian PT/CV,
                            dan legalitas usaha.</p>
                    </div>
                    <div
                        class="service-card bg-white/[0.025] border border-white/[0.05] rounded-[24px] px-8 py-10 transition-all duration-400 hover:bg-white/[0.06] hover:border-cyan-500/30 hover:-translate-y-2.5">
                        <div
                            class="service-icon w-16 h-16 bg-cyan-500/10 rounded-[18px] flex items-center justify-center mb-7 text-cyan-500 transition-all duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-[22px] font-semibold text-white mb-3.5">Digital Marketing</h3>
                        <p class="text-[15px] leading-[1.65] text-white/45">Website, social media marketing, Google Ads,
                            dan digitalisasi bisnis.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 4: Why Choose Us --}}
        <section
            class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
            data-index="3">
            <div class="section-inner wide relative z-10 w-full max-w-[1600px]">
                <div class="choose-grid grid grid-cols-[1fr_1.5fr] gap-24 items-start">
                    <div class="choose-content">
                        <span
                            class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">Mengapa
                            Kisantra</span>
                        <h2
                            class="section-title text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                            Keunggulan Yang<br>
                            <span class="text-cyan-500">Membedakan Kami</span>
                        </h2>
                        <div class="choose-stats flex gap-12 mt-10">
                            <div class="choose-stat">
                                <span
                                    class="stat-num block text-[54px] font-semibold text-cyan-500 tracking-[-2px]">150+</span>
                                <span class="stat-text text-[15px] text-white/45">Klien Puas</span>
                            </div>
                            <div class="choose-stat">
                                <span
                                    class="stat-num block text-[54px] font-semibold text-cyan-500 tracking-[-2px]">200+</span>
                                <span class="stat-text text-[15px] text-white/45">Proyek Selesai</span>
                            </div>
                        </div>
                    </div>
                    <div class="choose-features grid grid-cols-2 gap-6">
                        <div
                            class="choose-card bg-white/[0.025] border border-white/[0.05] rounded-[20px] p-8 transition-all duration-300 hover:bg-white/[0.05] hover:border-cyan-500/25 hover:-translate-y-1">
                            <span class="card-num text-sm font-semibold text-cyan-500 mb-3.5 block">01</span>
                            <h4 class="text-lg font-semibold text-white mb-3">Solusi Keuangan Fleksibel</h4>
                            <p class="text-sm leading-[1.6] text-white/45">Layanan konsultasi yang disesuaikan dengan
                                kemampuan dan kebutuhan bisnis Anda.</p>
                        </div>
                        <div
                            class="choose-card bg-white/[0.025] border border-white/[0.05] rounded-[20px] p-8 transition-all duration-300 hover:bg-white/[0.05] hover:border-cyan-500/25 hover:-translate-y-1">
                            <span class="card-num text-sm font-semibold text-cyan-500 mb-3.5 block">02</span>
                            <h4 class="text-lg font-semibold text-white mb-3">Transparan & Profesional</h4>
                            <p class="text-sm leading-[1.6] text-white/45">Proses kerja yang jelas dengan laporan
                                lengkap untuk setiap layanan.</p>
                        </div>
                        <div
                            class="choose-card bg-white/[0.025] border border-white/[0.05] rounded-[20px] p-8 transition-all duration-300 hover:bg-white/[0.05] hover:border-cyan-500/25 hover:-translate-y-1">
                            <span class="card-num text-sm font-semibold text-cyan-500 mb-3.5 block">03</span>
                            <h4 class="text-lg font-semibold text-white mb-3">Keamanan Data Terjamin</h4>
                            <p class="text-sm leading-[1.6] text-white/45">Data Anda dijaga ketat dengan sistem keamanan
                                berlapis.</p>
                        </div>
                        <div
                            class="choose-card bg-white/[0.025] border border-white/[0.05] rounded-[20px] p-8 transition-all duration-300 hover:bg-white/[0.05] hover:border-cyan-500/25 hover:-translate-y-1">
                            <span class="card-num text-sm font-semibold text-cyan-500 mb-3.5 block">04</span>
                            <h4 class="text-lg font-semibold text-white mb-3">Layanan 100% Digital</h4>
                            <p class="text-sm leading-[1.6] text-white/45">Akses konsultasi secara online, kapan saja
                                dan di mana saja.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 5: Portfolio --}}
        <section
            class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
            data-index="4">
            <div class="section-inner wide relative z-10 w-full max-w-[1600px]">
                <div class="portfolio-header mb-[50px]">
                    <span
                        class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">Portofolio</span>
                    <h2
                        class="section-title text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                        Pengalaman<br>
                        <span class="text-cyan-500">Kami</span>
                    </h2>
                </div>
                @php
                $portfolioPath = public_path('image/Home/Portofolio');
                $portfolioItems = [];
                if (File::exists($portfolioPath)) {
                $files = File::files($portfolioPath);
                foreach ($files as $file) {
                if (in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
                $portfolioItems[] = [
                'path' => 'image/Home/Portofolio/' . $file->getFilename(),
                'title' => ucfirst(str_replace(['-', '_'], ' ', $filename)),
                ];
                }
                }
                }
                @endphp
                <div class="portfolio-grid grid grid-cols-4 gap-6">
                    @forelse(array_slice($portfolioItems, 0, 4) as $item)
                    <div class="portfolio-item relative aspect-[4/3] rounded-[20px] overflow-hidden group">
                        <img src="{{ asset($item['path']) }}" alt="{{ $item['title'] }}" loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-110">
                        <div
                            class="portfolio-overlay absolute inset-0 bg-gradient-to-t from-black/85 to-transparent flex items-end p-6">
                            <span class="text-base font-medium text-white">{{ $item['title'] }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="portfolio-empty col-span-4 text-center py-20 text-white/35">
                        <p>Portofolio akan segera hadir</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- Section 6: FAQ --}}
        <section
            class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
            data-index="5">
            <div class="section-inner wide relative z-10 w-full max-w-[1600px]">
                <div class="faq-grid grid grid-cols-[1fr_1.4fr] gap-24 items-start">
                    <div class="faq-content">
                        <span
                            class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">Pertanyaan
                            Umum</span>
                        <h2
                            class="section-title text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                            Hal yang Sering<br>
                            <span class="text-cyan-500">Ditanyakan</span>
                        </h2>
                        <p class="section-desc text-lg leading-[1.7] text-white/50 max-w-[560px] mb-10">
                            Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami.
                        </p>
                        <a href="https://wa.me/6281180009787"
                            class="btn-primary inline-flex items-center gap-3 bg-cyan-500 text-white text-[15px] font-medium px-9 py-[18px] rounded-full no-underline transition-all duration-300 hover:bg-cyan-400 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(66,178,205,0.35)]"
                            target="_blank">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                    <div class="faq-list flex flex-col gap-3.5" x-data="{ openFaq: null }">
                        <div class="faq-item bg-white/[0.025] border border-white/[0.05] rounded-2xl overflow-hidden transition-all duration-300"
                            :class="{ 'border-cyan-500/25': openFaq === 1 }">
                            <button @click="openFaq = openFaq === 1 ? null : 1"
                                class="w-full flex items-center gap-4.5 px-7 py-6 bg-transparent border-0 cursor-pointer text-left">
                                <span class="faq-num text-[13px] font-semibold text-cyan-500">01</span>
                                <span class="faq-q flex-1 text-base font-medium text-white/80">Layanan apa yang
                                    ditawarkan Kisantra?</span>
                                <svg class="w-5 h-5 text-white/35 transition-all duration-300"
                                    :class="{ 'rotate-180 text-cyan-500': openFaq === 1 }" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="faq-a px-7 pb-6 pl-[60px] text-[15px] leading-[1.7] text-white/45"
                                x-show="openFaq === 1" x-collapse>
                                Kami menawarkan layanan perpajakan, keuangan, perizinan usaha, dan digital marketing
                                untuk bisnis Anda.
                            </div>
                        </div>
                        <div class="faq-item bg-white/[0.025] border border-white/[0.05] rounded-2xl overflow-hidden transition-all duration-300"
                            :class="{ 'border-cyan-500/25': openFaq === 2 }">
                            <button @click="openFaq = openFaq === 2 ? null : 2"
                                class="w-full flex items-center gap-4.5 px-7 py-6 bg-transparent border-0 cursor-pointer text-left">
                                <span class="faq-num text-[13px] font-semibold text-cyan-500">02</span>
                                <span class="faq-q flex-1 text-base font-medium text-white/80">Apakah melayani di luar
                                    Samarinda?</span>
                                <svg class="w-5 h-5 text-white/35 transition-all duration-300"
                                    :class="{ 'rotate-180 text-cyan-500': openFaq === 2 }" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="faq-a px-7 pb-6 pl-[60px] text-[15px] leading-[1.7] text-white/45"
                                x-show="openFaq === 2" x-collapse>
                                Ya, kami melayani klien di seluruh Indonesia dan menyediakan konsultasi online.
                            </div>
                        </div>
                        <div class="faq-item bg-white/[0.025] border border-white/[0.05] rounded-2xl overflow-hidden transition-all duration-300"
                            :class="{ 'border-cyan-500/25': openFaq === 3 }">
                            <button @click="openFaq = openFaq === 3 ? null : 3"
                                class="w-full flex items-center gap-4.5 px-7 py-6 bg-transparent border-0 cursor-pointer text-left">
                                <span class="faq-num text-[13px] font-semibold text-cyan-500">03</span>
                                <span class="faq-q flex-1 text-base font-medium text-white/80">Berapa lama waktu
                                    konsultasi?</span>
                                <svg class="w-5 h-5 text-white/35 transition-all duration-300"
                                    :class="{ 'rotate-180 text-cyan-500': openFaq === 3 }" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="faq-a px-7 pb-6 pl-[60px] text-[15px] leading-[1.7] text-white/45"
                                x-show="openFaq === 3" x-collapse>
                                Konsultasi sederhana 2-4 minggu, proyek kompleks 1-3 bulan tergantung kebutuhan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 7: Consult CTA --}}
        <section
            class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
            data-index="6">
            <div class="section-inner relative z-10 w-full max-w-[1100px]">
                <div class="consult-content text-center max-w-[700px] mx-auto">
                    <span
                        class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">Sesi
                        Tanya Kisantra</span>
                    <h2
                        class="section-title text-center text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                        Siap Memulai<br>
                        <span class="text-cyan-500">Perjalanan Bersama?</span>
                    </h2>
                    <p class="consult-desc text-lg leading-[1.7] text-white/50 mb-11">
                        Diskusi langsung via Zoom seputar Tax Planning, Laporan Keuangan, dan Perpajakan. Gratis dan
                        tanpa kewajiban.
                    </p>
                    <div class="consult-cta flex justify-center gap-4.5 flex-wrap mb-[60px]">
                        <a href="{{ route('consultation.index') }}"
                            class="btn-primary large inline-flex items-center gap-3 bg-cyan-500 text-white text-[17px] font-medium px-11 py-[22px] rounded-full no-underline transition-all duration-300 hover:bg-cyan-400 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(66,178,205,0.35)]">
                            Daftar Konsultasi
                            <svg class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="https://wa.me/6281180009787"
                            class="btn-whatsapp inline-flex items-center gap-2.5 text-white/55 text-[15px] px-7 py-[18px] border border-white/[0.15] rounded-full no-underline transition-all duration-300 hover:text-[#25D366] hover:border-[#25D366]"
                            target="_blank">
                            <svg class="w-5.5 h-5.5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            </svg>
                            WhatsApp
                        </a>
                    </div>
                    <div class="consult-stats flex justify-center gap-20">
                        <div class="c-stat text-center">
                            <span
                                class="c-num block text-[44px] font-semibold text-cyan-500 tracking-[-1px]">150+</span>
                            <span class="c-label text-sm text-white/45">Peserta Terbantu</span>
                        </div>
                        <div class="c-stat text-center">
                            <span
                                class="c-num block text-[44px] font-semibold text-cyan-500 tracking-[-1px]">100%</span>
                            <span class="c-label text-sm text-white/45">Online & Fleksibel</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 8: Blog --}}
        <section
            class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
            data-index="7">
            <div class="section-inner wide relative z-10 w-full max-w-[1600px]">
                <div class="blog-header mb-[50px]">
                    <span
                        class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">Artikel
                        Terbaru</span>
                    <h2
                        class="section-title text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                        Berita &<br>
                        <span class="text-cyan-500">Insight</span>
                    </h2>
                </div>
                @php
                $articles = \App\Models\Article::query()
                ->select(['id', 'title', 'slug', 'excerpt', 'featured_image', 'published_at'])
                ->published()
                ->latest('published_at')
                ->take(3)
                ->get();
                @endphp
                <div class="blog-grid grid grid-cols-3 gap-7">
                    @forelse($articles as $article)
                    <a href="{{ route('news.show', $article->slug) }}"
                        class="blog-card bg-white/[0.025] border border-white/[0.05] rounded-[22px] overflow-hidden no-underline transition-all duration-400 hover:bg-white/[0.05] hover:border-cyan-500/25 hover:-translate-y-2">
                        <div class="blog-img relative aspect-[16/10] overflow-hidden">
                            <img src="{{ $article->featured_image ? Storage::url($article->featured_image) : asset('image/placeholder.jpg') }}"
                                alt="{{ $article->title }}" loading="lazy"
                                class="w-full h-full object-cover opacity-75 transition-all duration-500 hover:opacity-100 hover:scale-105">
                            <span
                                class="blog-date absolute top-4.5 right-4.5 bg-black/65 backdrop-blur-sm px-4 py-2.5 rounded-[10px] text-[13px] font-medium text-white">{{
                                $article->published_at->format('d M') }}</span>
                        </div>
                        <div class="blog-content p-7">
                            <h3 class="text-lg font-semibold text-white mb-3.5 leading-[1.4]">{{
                                Str::limit($article->title, 50) }}</h3>
                            <span class="blog-link text-sm text-cyan-500 font-medium">Baca Selengkapnya</span>
                        </div>
                    </a>
                    @empty
                    <div class="blog-empty col-span-3 text-center py-20 text-white/35">
                        <p>Artikel akan segera hadir</p>
                    </div>
                    @endforelse
                </div>
                @if($articles->count() > 0)
                <div class="blog-cta text-center mt-[50px]">
                    <a href="{{ route('news.index') }}"
                        class="btn-secondary inline-flex items-center text-white/65 text-[15px] font-medium px-9 py-[18px] border border-white/20 rounded-full no-underline transition-all duration-300 hover:border-white/50 hover:text-white">Lihat
                        Semua Artikel</a>
                </div>
                @endif
            </div>
        </section>

    </div>
</div>

<style>
    /* Additional Custom Styles for Effects Not Possible in Tailwind */

    /* =========================================
   SPLASH SCREEN ANIMATIONS
   ========================================= */

    @keyframes scaleIn {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        0% {
            transform: translateY(30px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes loadingBar {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes slideRight {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    /* =========================================
   MAIN SITE ANIMATIONS
   ========================================= */

    /* Shimmer animation for progress bar */
    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    .progress-bar {
        animation: shimmer 2s linear infinite;
    }

    /* Bounce Down Animation for Scroll Indicator */
    @keyframes bounceRight {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(8px);
        }
    }

    /* Blob animations - LARGER and MORE PROMINENT */
    .blob-1 {
        width: 900px;
        height: 900px;
        background: radial-gradient(circle, rgba(66, 178, 205, 1) 0%, rgba(66, 178, 205, 0.5) 40%, transparent 70%);
        top: -20%;
        left: -15%;
        animation: floatBlob1 25s ease-in-out infinite;
    }

    .blob-2 {
        width: 850px;
        height: 850px;
        background: radial-gradient(circle, rgba(34, 211, 238, 0.95) 0%, rgba(34, 211, 238, 0.45) 40%, transparent 70%);
        bottom: -25%;
        right: -10%;
        animation: floatBlob2 30s ease-in-out infinite;
    }

    .blob-3 {
        width: 750px;
        height: 750px;
        background: radial-gradient(circle, rgba(103, 232, 249, 0.9) 0%, rgba(103, 232, 249, 0.4) 40%, transparent 70%);
        top: 40%;
        left: 35%;
        animation: floatBlob3 22s ease-in-out infinite;
    }

    .blob-4 {
        width: 700px;
        height: 700px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.85) 0%, rgba(59, 130, 246, 0.35) 40%, transparent 70%);
        top: 15%;
        right: 15%;
        animation: floatBlob4 26s ease-in-out infinite;
    }

    /* ENHANCED blob animations with more movement */
    @keyframes floatBlob1 {

        0%,
        100% {
            transform: translate(0, 0) scale(1) rotate(0deg);
        }

        25% {
            transform: translate(150px, -80px) scale(1.2) rotate(8deg);
        }

        50% {
            transform: translate(80px, 100px) scale(0.9) rotate(-8deg);
        }

        75% {
            transform: translate(-80px, 50px) scale(1.1) rotate(5deg);
        }
    }

    @keyframes floatBlob2 {

        0%,
        100% {
            transform: translate(0, 0) scale(1) rotate(0deg);
        }

        25% {
            transform: translate(-120px, 80px) scale(1.15) rotate(-6deg);
        }

        50% {
            transform: translate(90px, -120px) scale(0.85) rotate(8deg);
        }

        75% {
            transform: translate(50px, 60px) scale(1.08) rotate(-4deg);
        }
    }

    @keyframes floatBlob3 {

        0%,
        100% {
            transform: translate(0, 0) scale(1) rotate(0deg);
        }

        33% {
            transform: translate(160px, -70px) scale(1.25) rotate(10deg);
        }

        66% {
            transform: translate(-100px, 90px) scale(0.95) rotate(-7deg);
        }
    }

    @keyframes floatBlob4 {

        0%,
        100% {
            transform: translate(0, 0) scale(1) rotate(0deg);
        }

        40% {
            transform: translate(-130px, 100px) scale(1.2) rotate(-9deg);
        }

        80% {
            transform: translate(110px, -80px) scale(0.9) rotate(6deg);
        }
    }

    /* ENHANCED Cursor glow gradient - MORE VISIBLE */
    .cursor-glow {
        background: radial-gradient(circle, rgba(66, 178, 205, 0.4) 0%, rgba(66, 178, 205, 0.2) 50%, transparent 75%);
    }

    /* SUBTLE Mouse Trail Ripple - Won't interfere with text readability */
    .ripple {
        background: radial-gradient(circle, rgba(66, 178, 205, 0.25) 0%, rgba(66, 178, 205, 0.1) 50%, transparent 75%);
        transform: translate(-50%, -50%) scale(0);
        animation: rippleExpand 1.5s ease-out forwards;
    }

    @keyframes rippleExpand {
        0% {
            transform: translate(-50%, -50%) scale(0);
            opacity: 0.4;
        }

        100% {
            transform: translate(-50%, -50%) scale(30);
            opacity: 0;
        }
    }

    /* ENHANCED Fluid gradient background */
    .fluid-gradient {
        background:
            radial-gradient(ellipse 80% 60% at 20% 40%, rgba(66, 178, 205, 0.25) 0%, transparent 50%),
            radial-gradient(ellipse 60% 80% at 80% 20%, rgba(66, 178, 205, 0.20) 0%, transparent 45%),
            radial-gradient(ellipse 70% 50% at 50% 80%, rgba(66, 178, 205, 0.15) 0%, transparent 40%),
            linear-gradient(180deg, #050505 0%, #080808 50%, #050505 100%);
    }

    /* Noise overlay */
    .noise-overlay {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
    }

    /* Scrollbar hide - Required for cross-browser compatibility */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Nav item active state - Complex pseudo-class styling */
    .nav-item.active .nav-dot {
        background: #42B2CD;
        border-color: #42B2CD;
        box-shadow: 0 0 20px rgba(66, 178, 205, 0.6);
        width: 14px;
        height: 14px;
    }

    /* Button hover effects - Nested SVG animation */
    .btn-primary:hover svg {
        transform: translateX(5px);
    }

    /* =========================================
   RESPONSIVE DESIGN
   These use custom breakpoints not in Tailwind's default config
   ========================================= */

    @media (max-width: 1600px) {
        .section-inner.wide {
            max-width: 1400px;
        }
    }

    @media (max-width: 1400px) {
        .h-section {
            padding: 70px 80px;
        }

        .section-nav {
            right: 35px;
        }

        .section-inner.wide {
            max-width: 1200px;
        }
    }

    @media (max-width: 1200px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 1024px) {
        .horizontal-homepage {
            height: auto;
            min-height: 100vh;
        }

        .scroll-container {
            flex-direction: column;
            height: auto;
            overflow-x: hidden;
            overflow-y: auto;
            scroll-snap-type: y proximity;
        }

        .h-section {
            flex: 0 0 auto;
            width: 100%;
            min-width: 100%;
            height: auto;
            min-height: 100vh;
            padding: 100px 50px 70px;
            scroll-snap-align: start;
        }

        .section-nav,
        .cursor-glow,
        .ripple-container {
            display: none;
        }

        .hero-grid {
            grid-template-columns: 1fr;
            gap: 50px;
        }

        .about-grid,
        .choose-grid,
        .faq-grid {
            grid-template-columns: 1fr;
            gap: 60px;
        }

        .choose-features {
            grid-template-columns: repeat(2, 1fr);
        }

        .fluid-blob {
            filter: blur(100px);
        }

        .blob-1 {
            width: 500px;
            height: 500px;
        }

        .blob-2 {
            width: 450px;
            height: 450px;
        }

        .blob-3 {
            width: 400px;
            height: 400px;
        }

        .blob-4 {
            width: 350px;
            height: 350px;
        }
    }

    @media (max-width: 768px) {
        .h-section {
            padding: 90px 28px 60px;
        }

        .scroll-indicator {
            display: none;
        }

        .hero-title {
            font-size: 48px;
            letter-spacing: -2px;
        }

        .section-title {
            font-size: 36px;
            letter-spacing: -1px;
        }

        .hero-cta {
            flex-direction: column;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            justify-content: center;
        }

        .hero-features .grid {
            grid-template-columns: 1fr;
        }

        .services-grid,
        .choose-features,
        .portfolio-grid,
        .blog-grid {
            grid-template-columns: 1fr;
        }

        .about-stats {
            flex-direction: row;
            flex-wrap: wrap;
            gap: 18px;
        }

        .stat-item {
            flex: 1;
            min-width: 100%;
        }

        .choose-stats {
            gap: 30px;
        }

        .consult-stats {
            gap: 50px;
        }

        .consult-cta {
            flex-direction: column;
            align-items: center;
        }

        .btn-primary.large {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .h-section {
            padding: 80px 20px 50px;
        }

        .hero-title {
            font-size: 38px;
            letter-spacing: -1px;
        }

        .section-title {
            font-size: 30px;
        }

        .tag {
            font-size: 10px;
            letter-spacing: 2px;
        }

        .hero-desc,
        .section-desc {
            font-size: 15px;
        }

        .stat-card {
            padding: 24px;
        }

        .stat-value {
            font-size: 36px;
        }

        .c-num {
            font-size: 32px;
        }
    }
</style>

<script>
    function splashScreen() {
    return {
        show: true,
        blobs: [],
        particles: [],

        initSplash() {
            // Create bouncing blobs with REDUCED opacity
            const blobCount = 8;
            const gradients = [
                'radial-gradient(circle, rgba(6, 182, 212, 0.3) 0%, rgba(6, 182, 212, 0) 70%)', // REDUCED from 0.6
                'radial-gradient(circle, rgba(34, 211, 238, 0.25) 0%, rgba(34, 211, 238, 0) 70%)', // REDUCED from 0.5
                'radial-gradient(circle, rgba(103, 232, 249, 0.2) 0%, rgba(103, 232, 249, 0) 70%)', // REDUCED from 0.4
                'radial-gradient(circle, rgba(59, 130, 246, 0.25) 0%, rgba(59, 130, 246, 0) 70%)', // REDUCED from 0.5
                'radial-gradient(circle, rgba(147, 197, 253, 0.2) 0%, rgba(147, 197, 253, 0) 70%)', // REDUCED from 0.4
            ];

            for (let i = 0; i < blobCount; i++) {
                this.blobs.push({
                    id: i,
                    x: Math.random() * window.innerWidth,
                    y: Math.random() * window.innerHeight,
                    vx: (Math.random() - 0.5) * 2, // REDUCED from 3
                    vy: (Math.random() - 0.5) * 2, // REDUCED from 3
                    size: 200 + Math.random() * 300,
                    gradient: gradients[i % gradients.length],
                    opacity: 0.3 + Math.random() * 0.2 // REDUCED from 0.6-1.0 to 0.3-0.5
                });
            }

            // Create floating particles
            const particleCount = 30;
            for (let i = 0; i < particleCount; i++) {
                this.particles.push({
                    id: i,
                    x: Math.random() * 100,
                    y: Math.random() * 100,
                    delay: Math.random() * 2,
                    duration: 1 + Math.random() * 2
                });
            }

            // Start animation loop with SLOWER movement
            this.animateBlobs();

            // Auto-hide splash screen after 2.5 seconds
            setTimeout(() => {
                this.show = false;
                setTimeout(() => {
                    document.getElementById('splashScreen')?.remove();
                }, 1000);
            }, 2500);
        },

        animateBlobs() {
            const animate = () => {
                if (!this.show) return;

                this.blobs.forEach(blob => {
                    // Update position
                    blob.x += blob.vx;
                    blob.y += blob.vy;

                    // Bounce off edges with MORE damping for smoother movement
                    if (blob.x <= -blob.size / 2 || blob.x >= window.innerWidth - blob.size / 2) {
                        blob.vx *= -0.8; // INCREASED damping from -1
                        blob.x = blob.x <= -blob.size / 2 ? -blob.size / 2 : window.innerWidth - blob.size / 2;
                    }
                    if (blob.y <= -blob.size / 2 || blob.y >= window.innerHeight - blob.size / 2) {
                        blob.vy *= -0.8; // INCREASED damping from -1
                        blob.y = blob.y <= -blob.size / 2 ? -blob.size / 2 : window.innerHeight - blob.size / 2;
                    }

                    // Add LESS randomness for gentler movement
                    blob.vx += (Math.random() - 0.5) * 0.05; // REDUCED from 0.1
                    blob.vy += (Math.random() - 0.5) * 0.05; // REDUCED from 0.1

                    // Limit velocity to SLOWER speed
                    const maxSpeed = 2.5; // REDUCED from 4
                    blob.vx = Math.max(-maxSpeed, Math.min(maxSpeed, blob.vx));
                    blob.vy = Math.max(-maxSpeed, Math.min(maxSpeed, blob.vy));
                });

                requestAnimationFrame(animate);
            };

            animate();
        }
    };
}

function horizontalHomepage() {
    return {
        currentSection: 0,
        scrollProgress: 0,
        mouseX: 0,
        mouseY: 0,
        blobX: 0,
        blobY: 0,
        isMoving: false,
        moveTimeout: null,
        ripples: [],
        rippleId: 0,
        liquidBlobs: [],
        lastRippleTime: 0,
        sections: ['Beranda', 'Tentang', 'Layanan', 'Keunggulan', 'Portofolio', 'FAQ', 'Konsultasi', 'Berita'],

        init() {
            this.$nextTick(() => {
                this.setupWheelHandler();
                this.onScroll();
                this.initLiquidBlobs();
                this.animateLiquidBlobs();
            });
        },

        initLiquidBlobs() {
            // Create MORE and LARGER bouncing liquid blobs with HIGHER opacity
            const blobCount = 15;
            const gradients = [
                'radial-gradient(circle, rgba(6, 182, 212, 0.9) 0%, rgba(6, 182, 212, 0.4) 50%, rgba(6, 182, 212, 0) 70%)',
                'radial-gradient(circle, rgba(34, 211, 238, 0.85) 0%, rgba(34, 211, 238, 0.35) 50%, rgba(34, 211, 238, 0) 70%)',
                'radial-gradient(circle, rgba(103, 232, 249, 0.8) 0%, rgba(103, 232, 249, 0.35) 50%, rgba(103, 232, 249, 0) 70%)',
                'radial-gradient(circle, rgba(59, 130, 246, 0.85) 0%, rgba(59, 130, 246, 0.4) 50%, rgba(59, 130, 246, 0) 70%)',
                'radial-gradient(circle, rgba(147, 197, 253, 0.75) 0%, rgba(147, 197, 253, 0.35) 50%, rgba(147, 197, 253, 0) 70%)',
                'radial-gradient(circle, rgba(14, 165, 233, 0.9) 0%, rgba(14, 165, 233, 0.4) 50%, rgba(14, 165, 233, 0) 70%)',
            ];

            for (let i = 0; i < blobCount; i++) {
                this.liquidBlobs.push({
                    id: i,
                    x: Math.random() * window.innerWidth,
                    y: Math.random() * window.innerHeight,
                    vx: (Math.random() - 0.5) * 3.5,
                    vy: (Math.random() - 0.5) * 3.5,
                    size: 400 + Math.random() * 500,
                    gradient: gradients[i % gradients.length],
                    opacity: 0.8 + Math.random() * 0.2
                });
            }
        },

        animateLiquidBlobs() {
            const animate = () => {
                this.liquidBlobs.forEach(blob => {
                    blob.x += blob.vx;
                    blob.y += blob.vy;

                    if (blob.x <= -blob.size / 2 || blob.x >= window.innerWidth - blob.size / 2) {
                        blob.vx *= -0.98;
                        blob.x = blob.x <= -blob.size / 2 ? -blob.size / 2 : window.innerWidth - blob.size / 2;
                    }
                    if (blob.y <= -blob.size / 2 || blob.y >= window.innerHeight - blob.size / 2) {
                        blob.vy *= -0.98;
                        blob.y = blob.y <= -blob.size / 2 ? -blob.size / 2 : window.innerHeight - blob.size / 2;
                    }

                    blob.vx += (Math.random() - 0.5) * 0.12;
                    blob.vy += (Math.random() - 0.5) * 0.12;

                    const maxSpeed = 4;
                    blob.vx = Math.max(-maxSpeed, Math.min(maxSpeed, blob.vx));
                    blob.vy = Math.max(-maxSpeed, Math.min(maxSpeed, blob.vy));
                });

                requestAnimationFrame(animate);
            };

            animate();
        },

        setupWheelHandler() {
            const container = this.$refs.scrollContainer;
            if (!container) return;

            if (window.innerWidth > 1024) {
                container.addEventListener('wheel', (e) => {
                    if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                        e.preventDefault();
                        const scrollAmount = e.deltaY * 2;
                        container.scrollBy({
                            left: scrollAmount,
                            behavior: 'auto'
                        });
                    }
                }, { passive: false });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                        e.preventDefault();
                        this.goToSection(Math.min(this.currentSection + 1, this.sections.length - 1));
                    } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                        e.preventDefault();
                        this.goToSection(Math.max(this.currentSection - 1, 0));
                    }
                });
            }
        },

        onScroll() {
            const container = this.$refs.scrollContainer;
            if (!container) return;

            if (window.innerWidth > 1024) {
                const scrollLeft = container.scrollLeft;
                const maxScroll = container.scrollWidth - container.clientWidth;
                this.scrollProgress = maxScroll > 0 ? (scrollLeft / maxScroll) * 100 : 0;

                const sectionWidth = container.clientWidth;
                this.currentSection = Math.round(scrollLeft / sectionWidth);
            } else {
                const scrollTop = container.scrollTop;
                const maxScroll = container.scrollHeight - container.clientHeight;
                this.scrollProgress = maxScroll > 0 ? (scrollTop / maxScroll) * 100 : 0;
            }
        },

        goToSection(index) {
            const container = this.$refs.scrollContainer;
            if (!container) return;

            if (window.innerWidth > 1024) {
                const sectionWidth = container.clientWidth;
                container.scrollTo({
                    left: index * sectionWidth,
                    behavior: 'smooth'
                });
            } else {
                const sections = container.querySelectorAll('.h-section');
                if (sections[index]) {
                    sections[index].scrollIntoView({ behavior: 'smooth' });
                }
            }
            this.currentSection = index;
        },

        onMouseMove(e) {
            // Update cursor position
            this.mouseX = e.clientX;
            this.mouseY = e.clientY;

            // Calculate blob movement with MORE responsiveness
            this.blobX = e.clientX - window.innerWidth / 2;
            this.blobY = e.clientY - window.innerHeight / 2;

            // Track if mouse is moving
            this.isMoving = true;
            clearTimeout(this.moveTimeout);
            this.moveTimeout = setTimeout(() => {
                this.isMoving = false;
            }, 150);

            // Create SUBTLE mouse trail ripples - but not too frequent
            // Only create ripple if mouse has moved enough distance and enough time has passed
            const currentTime = Date.now();
            const timeSinceLastRipple = currentTime - this.lastRippleTime;
            
            // Create ripple every 80-120ms while moving (smooth trail effect)
            if (timeSinceLastRipple > 100) {
                this.createRipple(e.clientX, e.clientY);
                this.lastRippleTime = currentTime;
            }
        },

        createRipple(x, y) {
            const id = this.rippleId++;
            this.ripples.push({ id, x, y });

            // Remove ripple after animation completes
            setTimeout(() => {
                this.ripples = this.ripples.filter(r => r.id !== id);
            }, 1500);  // Match animation duration
        }
    }
}
</script>

{{-- Swiper Client Logos Initialization --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize client swiper if it exists
    if (document.querySelector('.clientSwiper')) {
        const clientSwiper = new Swiper('.clientSwiper', {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            speed: 1000,
            grabCursor: true,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 60,
                },
            },
        });
    }
});
</script>