<div class="hero-slider-wrapper relative overflow-hidden">
    <!-- Swiper Container -->
    <div class="swiper heroSwiper relative z-10">
        <div class="swiper-wrapper">

            <!-- Slide 1 - Finance & Tax Services -->
            <div class="swiper-slide">
                <div class="hero-slide relative min-h-[90vh] flex items-center">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('image/Home/Hero/heroThumb1_1.jpg') }}" alt="Finance & Tax Consulting"
                            class="w-full h-full object-cover">
                        <div class="absolute inset-0"
                            style="background-image: linear-gradient(282deg, rgba(0,16,47,.23) 19.19%, rgba(0,13,38,.69) 61.36%);">
                        </div>

                    </div>

                    <!-- Content -->
                    <div class="relative z-10 max-w-[1920px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-3xl">
                            <!-- Main Heading -->
                            <h1
                                class="hero-title text-[94px] leading-[90px] font-semibold tracking-[-1.88px] text-white mb-5 not-italic">
                                Konsultasi Keuangan & Perpajakan
                            </h1>

                            <!-- Description -->
                            <p
                                class="hero-description font-bold text-sm sm:text-md lg:text-lg text-gray-200 leading-relaxed mb-8 max-w-2xl">
                                Solusi lengkap perpajakan, keuangan, dan konsultasi bisnis untuk mendorong pertumbuhan
                                perusahaan Anda dengan strategi yang terukur dan profesional.
                            </p>

                            <!-- CTA Button -->
                            <div class="hero-cta">
                                <a href="{{ route('consultation.index') }}"
                                    class="inline-flex items-center gap-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold text-lg px-10 py-5 rounded-full shadow-2xl hover:shadow-orange-500/50 transition-all duration-300 transform hover:scale-105 group">
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
                    <div class="relative z-10 max-w-[1920px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-3xl">
                            <!-- Main Heading -->
                            <h1
                                class="hero-title text-[94px] leading-[90px] font-semibold tracking-[-1.88px] text-white mb-5 not-italic">
                                Layanan Digital Marketing
                            </h1>

                            <!-- Description -->
                            <p
                                class="hero-description font-bold text-sm sm:text-md lg:text-lg text-gray-200 leading-relaxed mb-8 max-w-2xl">
                                Tingkatkan visibilitas bisnis Anda dengan strategi digital marketing yang inovatif dan
                                terukur. Dari SEO hingga social media management untuk hasil maksimal.
                            </p>

                            <!-- CTA Button -->
                            <div class="hero-cta">
                                <a href="{{ route('consultation.index') }}" wire:navigate
                                    class="inline-flex items-center gap-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold text-lg px-10 py-5 rounded-full shadow-2xl hover:shadow-orange-500/50 transition-all duration-300 transform hover:scale-105 group">
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

        /* Custom Pagination Styles - Middle Right - WITH !important TO OVERRIDE SWIPER DEFAULTS */
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
            background: rgba(255, 255, 255, 0.7) !important;
            transform: scale(1.3);
            border-color: rgba(255, 255, 255, 0.9) !important;
        }

        .hero-pagination-custom .swiper-pagination-bullet-active {
            background: #fff !important;
            border-color: #f97316 !important;
            width: 14px !important;
            height: 14px !important;
            box-shadow: 0 0 15px rgba(249, 115, 22, 0.5);
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
            border-color: rgba(249, 115, 22, 0.4);
        }

        /* Smooth transitions */
        .swiper-slide {
            transition: opacity 0.8s ease-in-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
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
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const heroSwiper = new Swiper('.heroSwiper', {
            // Loop
            loop: true,

            // Speed - transition duration
            speed: 1200,

            // Effect
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },

            // Autoplay
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                // pauseOnMouseEnter: false, // Changed to false so we can control it manually
            },

            // Pagination
            pagination: {
                el: '.hero-pagination-custom',
                clickable: true,
                bulletClass: 'swiper-pagination-bullet',
                bulletActiveClass: 'swiper-pagination-bullet-active',
                renderBullet: function(index, className) {
                    return '<span class="' + className + '"></span>';
                },
            },

            // Keyboard control
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },

            // Smooth transitions
            grabCursor: false,

            // Accessibility
            a11y: {
                enabled: true,
            },

            // Events
            on: {
                init: function() {
                    console.log('Hero Swiper initialized');
                },
                slideChange: function() {
                    // Reset text animations on slide change
                    const activeSlide = this.slides[this.activeIndex];
                    const title = activeSlide.querySelector('.hero-title');
                    const description = activeSlide.querySelector('.hero-description');
                    const cta = activeSlide.querySelector('.hero-cta');

                    // Remove and re-add animation
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

        // Pause/Resume autoplay on hover
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

        // Intersection Observer to handle autoplay when scrolling
        const heroSection = document.querySelector('.hero-slider-wrapper');
        if (heroSection) {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.3 // Hero section must be at least 30% visible
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Hero section is visible - start autoplay (if not hovering)
                        if (!isHovering && heroSwiper.autoplay && !heroSwiper.autoplay.running) {
                            heroSwiper.autoplay.start();
                        }
                    } else {
                        // Hero section is not visible - stop autoplay
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