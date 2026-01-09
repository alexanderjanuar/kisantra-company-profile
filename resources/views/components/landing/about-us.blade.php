{{-- Section 2: About Us - ALTERNATIVE DESIGN with Vertical Accent --}}
<section
    class="h-section flex-[0_0_100vw] w-screen min-w-screen h-screen min-h-screen snap-start snap-always flex items-center justify-center relative px-32 py-20 box-border"
    data-index="1">
    <div class="section-inner relative z-10 w-full max-w-[1100px]">
        <div class="about-grid grid grid-cols-[1.3fr_1fr] gap-24 items-center">
            {{-- Left Column: Content --}}
            <div class="about-content">
                <span class="tag inline-block text-[11px] font-medium tracking-[3px] uppercase text-cyan-500 mb-6">
                    Tentang Perusahaan
                </span>
                <h2
                    class="section-title text-[clamp(40px,6vw,72px)] font-semibold leading-[1.05] tracking-[-2px] text-white mb-7">
                    Melangkah Maju<br>
                    <span class="text-cyan-500">Bersama Anda</span>
                </h2>
                <p class="section-desc text-lg leading-[1.7] text-white/50 max-w-[560px] mb-10">
                    PT Kinara Sadayatra Nusantara hadir sejak 2025 dengan komitmen menghadirkan solusi bisnis
                    yang andal di bidang perpajakan, keuangan, perizinan, dan digital marketing.
                </p>
                <div class="about-features flex flex-col gap-4.5 mb-9">
                    <div class="feature flex items-center gap-4 text-white/75 text-base">
                        <div
                            class="feature-icon w-[50px] h-[50px] bg-cyan-500/10 rounded-[14px] flex items-center justify-center text-cyan-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span>Konsultan Pajak Bersertifikat</span>
                    </div>
                    <div class="feature flex items-center gap-4 text-white/75 text-base">
                        <div
                            class="feature-icon w-[50px] h-[50px] bg-cyan-500/10 rounded-[14px] flex items-center justify-center text-cyan-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span>Kepatuhan Perpajakan Terjamin</span>
                    </div>
                </div>
            </div>

            {{-- Right Column: Stats with Vertical Accent Line --}}
            <div class="about-stats relative pl-8 space-y-12">
                {{-- Vertical Accent Line --}}
                <div
                    class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-transparent via-cyan-500 to-transparent">
                </div>

                {{-- Stat 1 --}}
                <div class="stat-item group">
                    <div class="flex items-baseline gap-3 mb-2">
                        <span
                            class="text-8xl font-bold text-white transition-all duration-300 group-hover:text-cyan-500">98</span>
                        <span class="text-4xl font-bold text-cyan-500">%</span>
                    </div>
                    <p class="text-sm text-white/50 uppercase tracking-wider">Klien Puas</p>
                    <div class="h-px w-24 bg-gradient-to-r from-cyan-500 to-transparent mt-3"></div>
                </div>

                {{-- Stat 2 --}}
                <div class="stat-item group">
                    <div class="flex items-baseline gap-3 mb-2">
                        <span
                            class="text-8xl font-bold text-white transition-all duration-300 group-hover:text-cyan-500">150</span>
                        <span class="text-4xl font-bold text-cyan-500">+</span>
                    </div>
                    <p class="text-sm text-white/50 uppercase tracking-wider">Proyek Selesai</p>
                    <div class="h-px w-24 bg-gradient-to-r from-cyan-500 to-transparent mt-3"></div>
                </div>

                {{-- Stat 3 --}}
                <div class="stat-item group">
                    <div class="flex items-baseline gap-2 mb-2">
                        <span
                            class="text-8xl font-bold text-white transition-all duration-300 group-hover:text-cyan-500">24</span>
                        <span class="text-4xl font-bold text-cyan-500">/</span>
                        <span
                            class="text-8xl font-bold text-white transition-all duration-300 group-hover:text-cyan-500">7</span>
                    </div>
                    <p class="text-sm text-white/50 uppercase tracking-wider">Dukungan</p>
                    <div class="h-px w-24 bg-gradient-to-r from-cyan-500 to-transparent mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>