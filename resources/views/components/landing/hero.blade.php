<div class="hero-slider-wrapper relative overflow-hidden page-banner">
    <!-- Swiper Container -->
    <div class="swiper heroSwiper relative z-10">
        <div class="swiper-wrapper">

            <!-- Slide 1 - Finance & Tax Services -->
            <div class="swiper-slide">
                <div class="hero-slide relative min-h-[90vh] flex items-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('image/Home/Hero/heroThumb1_1.webp') }}" alt="Finance & Tax Consulting"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0"
                            style="background-image: linear-gradient(282deg, rgba(0,16,47,.23) 19.19%, rgba(0,13,38,.69) 61.36%);">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-4xl">
                            <!-- Main Heading -->
                            <h1
                                class="hero-title text-[94px] leading-[90px] font-semibold tracking-[-1.88px] text-white mb-5 not-italic">
                                Konsultasi Keuangan & Perpajakan
                            </h1>

                            <!-- Description -->
                            <p
                                class="hero-description font-semibold text-sm sm:text-sm lg:text-md text-gray-100 leading-relaxed mb-8 max-w-2xl">
                                Solusi lengkap perpajakan, keuangan, dan konsultasi bisnis untuk mendorong pertumbuhan
                                perusahaan Anda dengan strategi yang terukur dan profesional.
                            </p>

                            <!-- CTA Button -->
                            <div class="hero-cta">
                                <a href="{{ route('consultation.index') }}"
                                    class="inline-flex items-center gap-3 bg-[#42B2CD] hover:bg-[#3A9FB8] text-white font-semibold text-lg px-10 py-2 rounded-full shadow-lg hover:shadow-[#42B2CD]/50 transition-all duration-300 transform hover:scale-105 group">
                                    <span>Konsultasi Gratis</span>
                                    <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 - Digital Marketing Services -->
            <div class="swiper-slide">
                <div class="hero-slide relative min-h-[90vh] flex items-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('image/Home/Hero/heroThumb1_2.webp') }}" alt="Digital Marketing Services"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0"
                            style="background-image: linear-gradient(282deg, rgba(0,16,47,.23) 19.19%, rgba(0,13,38,.69) 61.36%);">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="relative z-10 max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-4xl">
                            <!-- Main Heading -->
                            <h1
                                class="hero-title text-[94px] leading-[90px] font-semibold tracking-[-1.88px] text-white mb-5 not-italic">
                                Layanan Digital Marketing
                            </h1>

                            <!-- Description -->
                            <p
                                class="hero-description font-bold text-sm sm:text-sm lg:text-md text-gray-200 leading-relaxed mb-8 max-w-2xl">
                                Tingkatkan visibilitas bisnis Anda dengan strategi digital marketing yang inovatif dan
                                terukur. Dari SEO hingga social media management untuk hasil maksimal.
                            </p>

                            <!-- CTA Button -->
                            <div class="hero-cta">
                                <a href="{{ route('consultation.index') }}"
                                    class="inline-flex items-center gap-3 bg-[#42B2CD] hover:bg-[#3A9FB8] text-white font-semibold text-lg px-10 py-2 rounded-full shadow-lg hover:shadow-[#42B2CD]/50 transition-all duration-300 transform hover:scale-105 group">
                                    <span>Konsultasi Gratis</span>
                                    <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Custom Pagination (Right Side) -->
        <div class="hero-pagination-custom"></div>
    </div>

    <!-- Styles -->
    <style>
        .hero-slider-wrapper {
            height: 100vh;
            min-height: 600px;
        }

        .heroSwiper {
            width: 100%;
            height: 100%;
        }

        .hero-slide {
            height: 100vh;
            min-height: 600px;
        }

        /* Text Animation Styles */
        .hero-title {
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s ease-out forwards;
            animation-delay: 0.2s;
        }

        .hero-description {
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s ease-out forwards;
            animation-delay: 0.4s;
        }

        .hero-cta {
            opacity: 0;
            transform: translateY(30px);
            animation: slideUp 0.8s ease-out forwards;
            animation-delay: 0.6s;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Reset animation on slide change */
        .swiper-slide-active .hero-title,
        .swiper-slide-active .hero-description,
        .swiper-slide-active .hero-cta {
            animation: slideUp 0.8s ease-out forwards;
        }

        /* Custom Pagination Styles - Updated with Kisantra Teal */
        .hero-pagination-custom {
            position: absolute !important;
            right: 30px !important;
            top: 50% !important;
            bottom: auto !important;
            left: auto !important;
            width: auto !important;
            transform: translateY(-50%) !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 16px;
            z-index: 30 !important;
        }

        .hero-pagination-custom .swiper-pagination-bullet {
            width: 12px !important;
            height: 12px !important;
            background: rgba(255, 255, 255, 0.4) !important;
            opacity: 1 !important;
            border: 2px solid rgba(255, 255, 255, 0.6) !important;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            border-radius: 50%;
            margin: 0 !important;
        }

        .hero-pagination-custom .swiper-pagination-bullet:hover {
            background: rgba(66, 178, 205, 0.7) !important;
            transform: scale(1.3);
            border-color: #42B2CD !important;
        }

        .hero-pagination-custom .swiper-pagination-bullet-active {
            background: #42B2CD !important;
            border-color: #42B2CD !important;
            width: 14px !important;
            height: 14px !important;
            box-shadow: 0 0 15px rgba(66, 178, 205, 0.6);
        }

        .hero-pagination-custom .swiper-pagination-bullet::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 24px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: all 0.3s ease;
        }

        .hero-pagination-custom .swiper-pagination-bullet-active::after {
            transform: translate(-50%, -50%) scale(1);
            border-color: rgba(66, 178, 205, 0.4);
        }

        /* Smooth transitions */
        .swiper-slide {
            transition: opacity 0.8s ease-in-out;
        }

        /* ============================================
           COMPREHENSIVE RESPONSIVE STYLES
           ============================================ */

        /* Extra Small Mobile - 320px to 480px */
        @media (max-width: 480px) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 100vh;
                height: 100vh;
            }

            .hero-title {
                font-size: 32px !important;
                line-height: 36px !important;
                letter-spacing: -0.64px !important;
                margin-bottom: 16px !important;
            }

            .hero-description {
                font-size: 14px !important;
                margin-bottom: 24px !important;
            }

            .hero-cta a {
                font-size: 14px !important;
                padding: 12px 24px !important;
            }

            .hero-cta svg {
                width: 18px !important;
                height: 18px !important;
            }

            .hero-pagination-custom {
                right: 10px !important;
                gap: 10px;
            }

            .hero-pagination-custom .swiper-pagination-bullet {
                width: 8px !important;
                height: 8px !important;
                border-width: 1.5px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet-active {
                width: 10px !important;
                height: 10px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet::after {
                width: 18px;
                height: 18px;
            }
        }

        /* Small Mobile - 481px to 640px */
        @media (min-width: 481px) and (max-width: 640px) {
            .hero-title {
                font-size: 40px !important;
                line-height: 44px !important;
                letter-spacing: -0.8px !important;
                margin-bottom: 18px !important;
            }

            .hero-description {
                font-size: 15px !important;
                margin-bottom: 28px !important;
            }

            .hero-cta a {
                font-size: 15px !important;
                padding: 13px 28px !important;
            }

            .hero-cta svg {
                width: 20px !important;
                height: 20px !important;
            }

            .hero-pagination-custom {
                right: 12px !important;
                gap: 11px;
            }

            .hero-pagination-custom .swiper-pagination-bullet {
                width: 9px !important;
                height: 9px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet-active {
                width: 11px !important;
                height: 11px !important;
            }
        }

        /* Tablets Portrait - 641px to 768px */
        @media (min-width: 641px) and (max-width: 768px) {
            .hero-title {
                font-size: 48px !important;
                line-height: 52px !important;
                letter-spacing: -0.96px !important;
                margin-bottom: 20px !important;
            }

            .hero-description {
                font-size: 16px !important;
                margin-bottom: 30px !important;
            }

            .hero-cta a {
                font-size: 16px !important;
                padding: 14px 32px !important;
            }

            .hero-pagination-custom {
                right: 15px !important;
                gap: 12px;
            }

            .hero-pagination-custom .swiper-pagination-bullet {
                width: 10px !important;
                height: 10px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet-active {
                width: 12px !important;
                height: 12px !important;
            }
        }

        /* Tablets Landscape - 769px to 1024px */
        @media (min-width: 769px) and (max-width: 1024px) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 700px;
            }

            .hero-title {
                font-size: 56px !important;
                line-height: 60px !important;
                letter-spacing: -1.12px !important;
                margin-bottom: 22px !important;
            }

            .hero-description {
                font-size: 17px !important;
                margin-bottom: 32px !important;
            }

            .hero-cta a {
                font-size: 17px !important;
                padding: 15px 36px !important;
            }

            .hero-pagination-custom {
                right: 20px !important;
                gap: 14px;
            }

            .hero-pagination-custom .swiper-pagination-bullet {
                width: 11px !important;
                height: 11px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet-active {
                width: 13px !important;
                height: 13px !important;
            }
        }

        /* Small Laptops - 1025px to 1280px */
        @media (min-width: 1025px) and (max-width: 1280px) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 650px;
            }

            .hero-title {
                font-size: 64px !important;
                line-height: 68px !important;
                letter-spacing: -1.28px !important;
                margin-bottom: 24px !important;
            }

            .hero-description {
                font-size: 18px !important;
                margin-bottom: 34px !important;
            }

            .hero-cta a {
                font-size: 18px !important;
                padding: 16px 40px !important;
            }

            .hero-pagination-custom {
                right: 25px !important;
                gap: 15px;
            }
        }

        /* Standard Laptops - 1281px to 1440px */
        @media (min-width: 1281px) and (max-width: 1440px) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 700px;
            }

            .hero-title {
                font-size: 72px !important;
                line-height: 76px !important;
                letter-spacing: -1.44px !important;
                margin-bottom: 26px !important;
            }

            .hero-description {
                font-size: 18px !important;
                margin-bottom: 36px !important;
            }

            .hero-cta a {
                font-size: 18px !important;
                padding: 16px 40px !important;
            }
        }

        /* Large Desktops - 1441px to 1920px */
        @media (min-width: 1441px) and (max-width: 1920px) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 750px;
            }

            .hero-title {
                font-size: 82px !important;
                line-height: 86px !important;
                letter-spacing: -1.64px !important;
                margin-bottom: 28px !important;
            }

            .hero-description {
                font-size: 19px !important;
                margin-bottom: 38px !important;
            }

            .hero-cta a {
                font-size: 19px !important;
                padding: 16px 42px !important;
            }

            .hero-pagination-custom {
                right: 35px !important;
                gap: 18px;
            }

            .hero-pagination-custom .swiper-pagination-bullet {
                width: 13px !important;
                height: 13px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet-active {
                width: 15px !important;
                height: 15px !important;
            }
        }

        /* Extra Large Screens - 1921px and above */
        @media (min-width: 1921px) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 800px;
            }

            .hero-title {
                font-size: 94px !important;
                line-height: 90px !important;
                letter-spacing: -1.88px !important;
                margin-bottom: 30px !important;
            }

            .hero-description {
                font-size: 20px !important;
                margin-bottom: 40px !important;
            }

            .hero-cta a {
                font-size: 20px !important;
                padding: 16px 44px !important;
            }

            .hero-pagination-custom {
                right: 40px !important;
                gap: 20px;
            }

            .hero-pagination-custom .swiper-pagination-bullet {
                width: 14px !important;
                height: 14px !important;
            }

            .hero-pagination-custom .swiper-pagination-bullet-active {
                width: 16px !important;
                height: 16px !important;
            }
        }

        /* Landscape Orientation for Mobile/Tablet */
        @media (max-height: 600px) and (orientation: landscape) {

            .hero-slider-wrapper,
            .hero-slide {
                min-height: 500px !important;
                height: 100vh;
            }

            .hero-title {
                font-size: 36px !important;
                line-height: 40px !important;
                margin-bottom: 12px !important;
            }

            .hero-description {
                font-size: 14px !important;
                margin-bottom: 16px !important;
            }

            .hero-cta a {
                padding: 10px 24px !important;
                font-size: 14px !important;
            }

            .hero-pagination-custom {
                gap: 8px;
            }
        }

        /* Ultra-wide screens (21:9 aspect ratio) */
        @media (min-aspect-ratio: 21/9) {
            .hero-slide {
                display: flex;
                align-items: center;
                justify-content: flex-start;
            }
        }

        /* Content container responsive padding */
        @media (max-width: 640px) {
            .hero-slide .relative.z-10 {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .hero-slide .relative.z-10 {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.heroSwiper', {
            loop: true,
            speed: 1200,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.hero-pagination-custom',
                clickable: true,
                bulletClass: 'swiper-pagination-bullet',
                bulletActiveClass: 'swiper-pagination-bullet-active',
                renderBullet: function(index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            grabCursor: false,
            a11y: {
                enabled: true,
            },
            on: {
                init: function() {
                    console.log('Hero Swiper initialized');
                },
                slideChange: function() {
                    const activeSlide = this.slides[this.activeIndex];
                    const title = activeSlide.querySelector('.hero-title');
                    const description = activeSlide.querySelector('.hero-description');
                    const cta = activeSlide.querySelector('.hero-cta');

                    if (title) {
                        title.style.animation = 'none';
                        setTimeout(() => {
                            title.style.animation = 'slideUp 0.8s ease-out forwards';
                            title.style.animationDelay = '0.2s';
                        }, 10);
                    }

                    if (description) {
                        description.style.animation = 'none';
                        setTimeout(() => {
                            description.style.animation = 'slideUp 0.8s ease-out forwards';
                            description.style.animationDelay = '0.4s';
                        }, 10);
                    }

                    if (cta) {
                        cta.style.animation = 'none';
                        setTimeout(() => {
                            cta.style.animation = 'slideUp 0.8s ease-out forwards';
                            cta.style.animationDelay = '0.6s';
                        }, 10);
                    }
                }
            }
        });

        const swiperContainer = document.querySelector('.heroSwiper');
        let isHovering = false;

        if (swiperContainer) {
            swiperContainer.addEventListener('mouseenter', () => {
                isHovering = true;
                heroSwiper.autoplay.stop();
            });

            swiperContainer.addEventListener('mouseleave', () => {
                isHovering = false;
                heroSwiper.autoplay.start();
            });
        }

        const heroSection = document.querySelector('.hero-slider-wrapper');
        if (heroSection) {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.3
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (!isHovering && heroSwiper.autoplay && !heroSwiper.autoplay.running) {
                            heroSwiper.autoplay.start();
                        }
                    } else {
                        if (heroSwiper.autoplay && heroSwiper.autoplay.running) {
                            heroSwiper.autoplay.stop();
                        }
                    }
                });
            }, observerOptions);

            observer.observe(heroSection);
        }
    });
    </script>
</div>