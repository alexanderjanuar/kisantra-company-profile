<div>
    {{-- Pattern Header Section --}}
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-repeat opacity-40"
                style="background-image: url('{{ asset('image/Logo/KisantraPattern.jpg') }}'); background-size: 1200px 1200px;">
            </div>
            {{-- Blur overlay from all sides to center --}}
            <div class="absolute inset-0 bg-gradient-to-r from-white via-transparent to-white"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-white via-transparent to-white"></div>
            <div class="absolute inset-0"
                style="background: radial-gradient(ellipse at center, rgba(255,255,255,1) 0%, rgba(255,255,255,0.8) 30%, rgba(255,255,255,0.3) 60%, rgba(255,255,255,1) 100%);">
            </div>
        </div>

        <div class="relative z-10 max-w-screen-2xl mx-auto px-4 sm:px-8 lg:px-16 py-12 sm:py-20">
            <div class="text-center py-8 rounded-2xl">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6" data-aos="fade-up"
                    data-aos-duration="1000">
                    Hubungi Tim Kami
                </h1>
                <p class="text-lg sm:text-xl font-normal text-gray-900 max-w-3xl mx-auto px-4" data-aos="fade-up"
                    data-aos-delay="200" data-aos-duration="1000">
                    Ada pertanyaan atau butuh bantuan? Tim kami siap membantu Anda. Hubungi kami, Kami Siap Membantu
                </p>
            </div>
            <div class="mt-12 sm:mt-15 pt-4" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <hr class="border-gray-200">
            </div>
        </div>
    </div>

    {{-- Main Content Section - No Pattern --}}
    <div class="min-h-screen bg-white">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-8 lg:px-16 py-12">
            <!-- Contact Form and Info Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-32">
                <!-- Left Side - Contact Form -->
                <div data-aos="fade-right" data-aos-duration="1000">
                    @if (session()->has('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                    @endif

                    <form wire:submit.prevent="submit" class="space-y-6">
                        <!-- First Name and Last Name -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Depan
                                </label>
                                <input type="text" id="first_name" wire:model="first_name" placeholder="Nama depan"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Belakang
                                </label>
                                <input type="text" id="last_name" wire:model="last_name" placeholder="Nama belakang"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email" id="email" wire:model="email" placeholder="anda@perusahaan.com"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon
                            </label>
                            <input type="tel" id="phone" wire:model="phone" placeholder="+62 812-3456-7890"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan
                            </label>
                            <textarea id="message" wire:model="message" rows="4"
                                placeholder="Tinggalkan pesan untuk kami..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
                            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Services Checkboxes -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Layanan
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" wire:model="services" value="konsultasi_pajak"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">Konsultasi Pajak</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" wire:model="services" value="pelaporan_pajak"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">Pelaporan Pajak (SPT)</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" wire:model="services" value="tax_planning"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">Perencanaan Pajak</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" wire:model="services" value="ppn_pph"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">Social Media Management</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" wire:model="services" value="tax_audit"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">Perancangan Website atau Sistem</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" wire:model="services" value="other"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="text-sm text-gray-700">Lainnya</span>
                                </label>
                            </div>
                            @error('services') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-gray-900 text-white font-medium py-3 px-6 rounded-lg hover:bg-gray-800 transition duration-200 cursor-pointer">
                            Kirim Pesan
                        </button>

                        <!-- Divider with "atau" -->
                        <div class="relative flex items-center">
                            <div class="flex-grow border-t border-gray-300"></div>
                            <span class="flex-shrink mx-4 text-gray-500 font-medium">atau</span>
                            <div class="flex-grow border-t border-gray-300"></div>
                        </div>

                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/6281180009787?text=Halo,%20saya%20ingin%20bertanya" target="_blank"
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            Hubungi via WhatsApp
                        </a>
                    </form>
                </div>

                <!-- Right Side - Contact Information -->
                <div class="space-y-10" data-aos="fade-left" data-aos-duration="1000">
                    <!-- Chat with us -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Chat dengan Kami</h2>
                        <p class="text-gray-600 mb-4">Berbicara dengan tim kami melalui live chat.</p>
                        <div class="space-y-3">
                            <a href="mailto:kisantra.official@gmail.com"
                                class="flex items-center text-gray-900 hover:text-blue-600 transition">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="underline font-medium">Kirim email</span>
                            </a>
                            <a href="https://www.instagram.com/kisantra.official" class="flex items-center text-gray-900 hover:text-blue-600 transition">
                                <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12.017 0C8.396 0 7.929.013 6.71.072 5.493.131 4.73.333 4.058.63c-.68.3-1.283.74-1.887 1.344S1.33 3.377 1.03 4.057C.733 4.73.53 5.493.472 6.71.013 7.929 0 8.396 0 12.017c0 3.624.013 4.09.072 5.31.058 1.217.26 1.98.558 2.65.3.68.74 1.284 1.344 1.888.604.604 1.207 1.044 1.887 1.344.67.296 1.433.499 2.65.558C7.929 23.987 8.396 24 12.017 24c3.624 0 4.09-.013 5.31-.072 1.217-.058 1.98-.262 2.65-.558a5.105 5.105 0 001.888-1.344 5.105 5.105 0 001.344-1.888c.296-.67.499-1.433.558-2.65.058-1.22.072-1.686.072-5.31 0-3.621-.014-4.088-.072-5.31-.059-1.217-.262-1.98-.558-2.65a5.105 5.105 0 00-1.344-1.887A5.105 5.105 0 0020.067.63C19.397.333 18.634.131 17.417.072 16.197.013 15.73 0 12.107 0h-.09zm-.09 2.162c3.557 0 3.98.013 5.383.072 1.3.059 2.006.275 2.476.458.622.242 1.067.531 1.534.998.467.467.756.912.998 1.534.183.47.399 1.176.458 2.476.059 1.403.072 1.826.072 5.383s-.013 3.98-.072 5.383c-.059 1.3-.275 2.006-.458 2.476a4.132 4.132 0 01-.998 1.534 4.132 4.132 0 01-1.534.998c-.47.183-1.176.399-2.476.458-1.403.059-1.826.072-5.383.072s-3.98-.013-5.383-.072c-1.3-.059-2.006-.275-2.476-.458a4.132 4.132 0 01-1.534-.998 4.132 4.132 0 01-.998-1.534c-.183-.47-.399-1.176-.458-2.476C2.175 16.087 2.162 15.664 2.162 12.107s.013-3.98.072-5.383c.059-1.3.275-2.006.458-2.476.242-.622.531-1.067.998-1.534A4.132 4.132 0 015.224 2.72c.47-.183 1.176-.399 2.476-.458 1.403-.059 1.826-.072 5.383-.072l.033-.001z"
                                        clip-rule="evenodd"></path>
                                    <path
                                        d="M12.107 5.838a6.27 6.27 0 100 12.539 6.27 6.27 0 000-12.539zM12.107 16.27a4.108 4.108 0 110-8.215 4.108 4.108 0 010 8.215zm8.038-10.622a1.465 1.465 0 11-2.93 0 1.465 1.465 0 012.93 0z">
                                    </path>
                                </svg>
                                <span class="underline font-medium">Kirim pesan di Instagram</span>
                            </a>
                        </div>
                    </div>

                    <!-- Call us -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Telepon Kami</h2>
                        <p class="text-gray-600 mb-4">Hubungi tim kami Senin-Jumat dari jam 8 pagi sampai 5 sore.</p>
                        <a href="tel:+6281180009787"
                            class="flex items-center text-gray-900 hover:text-blue-600 transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="underline font-medium">+62 811-8000-9787</span>
                        </a>
                    </div>

                    <!-- Visit us -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Kunjungi Kami</h2>
                        <p class="text-gray-600 mb-4">Berbicara langsung dengan kami di kantor pusat kami.</p>
                        <a href="https://maps.app.goo.gl/kyo3XAtAM6zz5hnY6" target="_blank"
                            class="flex items-center text-gray-900 hover:text-blue-600 transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="underline font-medium">Jl. A. Wahab Syahranie Perum Pondok Alam Indah Nomor
                                3D<br>
                                Sempaja Sel., Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>