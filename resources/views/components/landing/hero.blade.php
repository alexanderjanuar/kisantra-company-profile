<div class="relative min-h-screen overflow-hidden bg-white">
    <div class="absolute inset-x-0 top-0 h-[70vh] z-0 flex items-start justify-center pt-10">
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
    <div class="relative z-10 max-w-[1920px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 xl:gap-20 items-center justify-between min-h-screen py-16 sm:py-20 lg:py-24">

            {{-- Left Content --}}
            <div class="space-y-6 lg:space-y-8 flex flex-col justify-center order-2 lg:order-1">
                {{-- Main Heading --}}
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold" data-aos="fade-up"
                    data-aos-duration="1000">
                    <span class="text-gray-900">Konsultan Bisnis Terpadu</span>
                    <br>
                    <span class="text-gray-900">untuk </span>
                    <span class="text-blue-600">Pertumbuhan</span>
                    <br>
                    <span class="text-blue-600">Usaha Anda</span>
                </h1>

                {{-- Description --}}
                <div class="space-y-3 sm:space-y-4 text-gray-600 text-sm sm:text-base lg:text-lg max-w-2xl leading-relaxed"
                    data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <p>
                        Dari perpajakan dan perizinan hingga strategi digital marketing — kami menyediakan solusi bisnis
                        menyeluruh yang disesuaikan dengan kebutuhan dan tujuan perusahaan Anda.
                    </p>
                    <p>
                        Kami tidak hanya menyelesaikan administrasi, kami menjadi mitra strategis untuk mengembangkan
                        dan memperkuat bisnis Anda.
                    </p>
                </div>

                {{-- CTA Button --}}
                <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                    <a href="#contact"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-base sm:text-lg px-6 sm:px-8 py-3 sm:py-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                        Get Started
                    </a>
                </div>
            </div>

            {{-- Right Side - Banner Image --}}
            <div class="relative flex justify-center lg:justify-end items-center order-1 lg:order-2 lg:-mr-4 xl:-mr-6">
                <div class="relative w-full max-w-md sm:max-w-lg lg:max-w-none" data-aos="fade-left"
                    data-aos-delay="200" data-aos-duration="1000">
                    {{-- Image Container --}}
                    <div class="relative">
                        <img src="{{ asset('image/Home/BerandaBanner.png') }}" alt="Business Consultation Banner"
                            class="w-full h-auto relative z-10 scale-90 sm:scale-95 lg:scale-100">
                    </div>

                    {{-- Decorative Circle Elements --}}
                    <div
                        class="absolute top-1/4 right-0 w-[500px] h-[500px] bg-blue-400/20 rounded-full -z-10 blur-3xl">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom White Blur Overlay --}}
    <div
        class="absolute bottom-0 left-0 right-0 h-48 sm:h-56 lg:h-64 bg-gradient-to-t from-white from-30% via-white/95 to-transparent z-30 pointer-events-none">
    </div>
</div>