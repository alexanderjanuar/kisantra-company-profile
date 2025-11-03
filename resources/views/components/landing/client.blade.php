{{-- Client Slider Section --}}
<div class="relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 flex items-center py-28">
    <div class="container mx-auto px-4">
        {{-- Header Text --}}
        <div class="text-center mb-12">
            <h2 class="text-lg md:text-lg text-gray-400 max-w-4xl mx-auto">
                Bergabunglah dengan Mitra Terpercaya Kami untuk Solusi Keuangan dan Perpajakan yang Profesional,
                <br class="hidden md:block">
                Layanan Berkualitas, dan Pengelolaan Bisnis yang Lebih Baik
            </h2>
        </div>

        {{-- Client Logos Slider --}}
        <div class="swiper clientSwiper">
            <div class="swiper-wrapper items-center">
                {{-- Loop through client images --}}
                @php
                $clientImages = File::files(public_path('image/Home/Client'));
                @endphp

                @foreach($clientImages as $image)
                <div class="swiper-slide">
                    <div class="flex items-center justify-center h-36 px-8">
                        <img src="{{ asset('image/Home/Client/' . $image->getFilename()) }}" alt="Client Logo"
                            class="max-h-20 max-w-full object-contain transition-all duration-300">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const clientSwiper = new Swiper('.clientSwiper', {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2500,
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
    });
    </script>
</div>