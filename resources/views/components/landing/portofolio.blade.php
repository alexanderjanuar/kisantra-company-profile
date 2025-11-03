{{-- Portfolio Masonry Section - With AOS Animations --}}
<section class="py-16 bg-white">


    <div class="relative max-w-[1920px] z-10 w-full mx-auto px-4 sm:px-6 lg:px-12 xl:px-20 ">

        <div class="absolute inset-x-0 top-0 h-full z-0 flex items-start justify-center pt-10">
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
        {{-- Section Header --}}
        <div class="text-center mb-12" data-aos="fade-down" data-aos-duration="800" data-aos-once="true">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Portofolio Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Pengalaman kami dalam menangani berbagai layanan keuangan dan perpajakan
            </p>
        </div>

        {{-- Fetch Portfolio Images --}}
        @php
        $portfolioPath = public_path('image/Home/Portofolio');
        $portfolioItems = [];

        if (File::exists($portfolioPath)) {
        $files = File::files($portfolioPath);

        foreach ($files as $file) {
        if (in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
        $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
        $title = ucfirst(str_replace(['-', '_'], ' ', $filename));

        $portfolioItems[] = [
        'filename' => $file->getFilename(),
        'path' => 'image/Home/Portofolio/' . $file->getFilename(),
        'title' => $title,
        ];
        }
        }
        }

        // Different animation styles for variety
        $animations = ['fade-up', 'fade-up', 'fade-up', 'fade-up', 'fade-up', 'fade-up'];
        @endphp

        {{-- Masonry Grid --}}
        @if(count($portfolioItems) > 0)
        <div class="portfolio-masonry-grid">
            @foreach($portfolioItems as $index => $item)
            <div class="portfolio-item portfolio-item-{{ $index + 1 }} group"
                data-aos="{{ $animations[$index] ?? 'fade-up' }}" data-aos-delay="{{ $index * 100 }}"
                data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-out-cubic">
                <div class="relative overflow-hidden rounded-xl h-full">
                    <img src="{{ asset($item['path']) }}" alt="{{ $item['title'] }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    {{-- Always Visible Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-white text-2xl font-bold mb-1 drop-shadow-lg">{{ $item['title'] }}</h3>
                            <p class="text-gray-200 text-sm drop-shadow-md">Layanan Keuangan & Perpajakan</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500 py-12">
            <p>Belum ada portofolio tersedia</p>
        </div>
        @endif
    </div>

    <style>
        .portfolio-masonry-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: 200px;
            gap: 20px;
        }

        /* Layout matching reference image exactly:
       Col 1: Ekspedisi (1 row), Perkapalan (2 rows)
       Col 2: Klinik (1 row), Perkebunan (2 rows)  
       Col 3: Konstruksi (2 rows), Pertambangan (1 row)
    */

        /* First column layout */
        .portfolio-item-1 {
            grid-column: 1;
            grid-row: 1 / 2;
        }

        .portfolio-item-4 {
            grid-column: 1;
            grid-row: 2 / 4;
        }

        /* Second column layout */
        .portfolio-item-2 {
            grid-column: 2;
            grid-row: 1 / 2;
        }

        .portfolio-item-5 {
            grid-column: 2;
            grid-row: 2 / 4;
        }

        /* Third column layout */
        .portfolio-item-3 {
            grid-column: 3;
            grid-row: 1 / 3;
        }

        .portfolio-item-6 {
            grid-column: 3;
            grid-row: 3 / 4;
        }

        /* Responsive - Tablet */
        @media (max-width: 1024px) {
            .portfolio-masonry-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-auto-rows: 180px;
            }

            .portfolio-item-1 {
                grid-column: 1;
                grid-row: 1 / 2;
            }

            .portfolio-item-2 {
                grid-column: 2;
                grid-row: 1 / 3;
            }

            .portfolio-item-3 {
                grid-column: 1;
                grid-row: 2 / 4;
            }

            .portfolio-item-4 {
                grid-column: 2;
                grid-row: 3 / 4;
            }

            .portfolio-item-5 {
                grid-column: 1;
                grid-row: 4 / 6;
            }

            .portfolio-item-6 {
                grid-column: 2;
                grid-row: 4 / 5;
            }
        }

        /* Responsive - Mobile */
        @media (max-width: 640px) {
            .portfolio-masonry-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: 250px;
                gap: 16px;
            }

            .portfolio-item-1,
            .portfolio-item-2,
            .portfolio-item-3,
            .portfolio-item-4,
            .portfolio-item-5,
            .portfolio-item-6 {
                grid-column: 1;
                grid-row: auto / span 1;
            }
        }

        /* Image and card styles */
        .portfolio-item {
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .portfolio-item:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
        }

        .portfolio-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</section>