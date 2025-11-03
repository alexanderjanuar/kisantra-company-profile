<div class="relative min-h-[80vh] overflow-hidden flex items-center py-10">
    {{-- Decorative Blobs --}}
    <div class="pointer-events-none absolute top-20 left-20 w-72 h-72 bg-blue-200/40 rounded-full blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-24 -right-24 w-96 h-96 bg-blue-300/30 rounded-full blur-3xl"></div>

    {{-- Main Content Container --}}
    <div class="relative max-w-[1920px] z-10 w-full mx-auto px-4 sm:px-6 lg:px-12 xl:px-20">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">

            {{-- Left Side - Content --}}
            <div class="space-y-8" data-aos="fade-right" data-aos-duration="1000">
                {{-- Section Label --}}
                <div class="inline-block bg-blue-50 text-blue-600 px-4 py-2 rounded-lg text-sm font-medium">
                    Konsultasi Gratis • Kisantra
                </div>

                {{-- Main Heading --}}
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight" style="color:#1e293b;">
                    Sesi Tanya Kisantra
                </h1>

                {{-- Description --}}
                <p class="text-gray-600 text-lg leading-relaxed">
                    Diskusi langsung via <span class="font-semibold text-blue-700">Zoom</span> seputar:
                </p>

                {{-- Bullets --}}
                <ul class="space-y-3">
                    @foreach ([
                    'Tax Planning (Perencanaan Pajak)',
                    'Laporan Keuangan',
                    'Perpajakan & Kepatuhan Usaha'
                    ] as $item)
                    <li class="flex items-start gap-3">
                        <span class="flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-full bg-blue-100">
                            <svg class="h-4 w-4 text-blue-600" viewBox="0 0 24 24" fill="none">
                                <path d="M20 7L10 17l-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-gray-700">{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>

                <div class="text-gray-600">
                    Setelah mendaftar, Anda akan diundang ke <span class="font-medium text-blue-700">grup eksklusif
                        Kisantra</span>
                    untuk menerima link Zoom dan info sesi selanjutnya.
                </div>

                {{-- Micro Stats / Social Proof (optional) --}}
                <div class="grid grid-cols-2 gap-8 pt-2">
                    <div>
                        <div class="text-4xl lg:text-5xl font-bold text-blue-600">150+</div>
                        <p class="text-gray-600 text-base">Peserta Terbantu</p>
                        <p class="text-sm text-gray-500">UMKM & Perusahaan</p>
                    </div>
                    <div>
                        <div class="text-4xl lg:text-5xl font-bold text-blue-600">100%</div>
                        <p class="text-gray-600 text-base">Online</p>
                        <p class="text-sm text-gray-500">Fleksibel & Aman</p>
                    </div>
                </div>
            </div>

            {{-- Right Side - Form Card --}}
            <div class="space-y-4" data-aos="fade-left" data-aos-duration="1000">
                <div
                    class="group bg-white rounded-2xl p-6 lg:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 12c2.7 0 8 1.35 8 4v2H4v-2c0-2.65 5.3-4 8-4zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold" style="color:#1e293b;">Formulir Pendaftaran</h2>
                            <p class="text-sm text-gray-500">Isi data di bawah ini untuk mengikuti sesi</p>
                        </div>
                    </div>

                    {{-- Success / Error flash --}}
                    @if (session('status'))
                    <div class="mb-4 rounded-lg bg-green-50 text-green-700 px-4 py-3 text-sm">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 text-red-700 px-4 py-3 text-sm">
                        Terdapat kesalahan pada isian Anda. Silakan periksa kembali.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('kisantra.consult.store') }}" novalidate>
                        @csrf
                        {{-- 1. Nama Lengkap --}}
                        <div class="mb-5">
                            <label for="nama" class="block text-sm font-medium text-slate-700 mb-2">1. Nama Lengkap
                                <span class="text-red-500">*</span></label>
                            <input id="nama" name="nama" type="text" required value="{{ old('nama') }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="Contoh: Muhammad Daffa Putra Mahardika">
                            @error('nama') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 2. Nama Usaha / Perusahaan --}}
                        <div class="mb-5">
                            <label for="usaha" class="block text-sm font-medium text-slate-700 mb-2">2. Nama Usaha /
                                Perusahaan</label>
                            <input id="usaha" name="usaha" type="text" value="{{ old('usaha') }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="Contoh: PT Kinara Sadayatra Nusantara">
                            @error('usaha') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 3. NPWP Perusahaan (opsional) --}}
                        <div class="mb-5">
                            <label for="npwp" class="block text-sm font-medium text-slate-700 mb-2">3. NPWP Perusahaan
                                <span class="text-gray-400 font-normal">(opsional)</span></label>
                            <input id="npwp" name="npwp" type="text" value="{{ old('npwp') }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="Masukkan NPWP">
                            @error('npwp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 4. Jenis / Bidang Usaha --}}
                        <div class="mb-5">
                            <label for="jenis_usaha" class="block text-sm font-medium text-slate-700 mb-2">4. Jenis
                                Usaha / Bidang Usaha</label>
                            <input id="jenis_usaha" name="jenis_usaha" type="text" list="opsi_jenis_usaha"
                                value="{{ old('jenis_usaha') }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="Contoh: Kuliner, Fashion, Jasa, Pertanian, Digital Agency, dll.">
                            <datalist id="opsi_jenis_usaha">
                                <option value="Kuliner" />
                                <option value="Fashion" />
                                <option value="Jasa" />
                                <option value="Pertanian" />
                                <option value="Digital Agency" />
                                <option value="Teknologi Informasi" />
                                <option value="Konstruksi" />
                                <option value="Retail & Distribusi" />
                            </datalist>
                            @error('jenis_usaha') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 5. Alamat Usaha / Domisili --}}
                        <div class="mb-5">
                            <label for="alamat" class="block text-sm font-medium text-slate-700 mb-2">5. Alamat Usaha /
                                Domisili</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="Contoh: Jl. Pahlawan No. 10, Samarinda, Kalimantan Timur">{{ old('alamat') }}</textarea>
                            @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 6. Nomor HP / WhatsApp --}}
                        <div class="mb-5">
                            <label for="telepon" class="block text-sm font-medium text-slate-700 mb-2">6. Nomor
                                Handphone / WhatsApp Aktif <span class="text-red-500">*</span></label>
                            <input id="telepon" name="telepon" type="tel" required pattern="^08\d{8,12}$"
                                value="{{ old('telepon') }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="Format: 08xxxxxxxxxx">
                            <p class="mt-1 text-xs text-gray-500">Gunakan format lokal Indonesia, contoh: 081234567890
                            </p>
                            @error('telepon') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 7. Email --}}
                        <div class="mb-5">
                            <label for="email" class="block text-sm font-medium text-slate-700 mb-2">7. Email (untuk
                                pengiriman link Zoom) <span class="text-red-500">*</span></label>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder="nama@email.com">
                            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 8. Permasalahan / Topik --}}
                        <div class="mb-5">
                            <label for="topik" class="block text-sm font-medium text-slate-700 mb-2">8. Permasalahan
                                atau Topik yang Ingin Dikonsultasikan <span class="text-red-500">*</span></label>
                            <textarea id="topik" name="topik" rows="4" required
                                class="w-full rounded-xl border-slate-200 focus:border-blue-400 focus:ring-blue-400 px-4 py-3"
                                placeholder='Contoh: "Saya ingin tanya soal pajak UMKM 0,5%" atau "Cara lapor SPT tahunan perusahaan."'>{{ old('topik') }}</textarea>
                            @error('topik') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 9. Bagaimana mengetahui acara --}}
                        <div class="mb-5">
                            <span class="block text-sm font-medium text-slate-700 mb-2">9. Bagaimana Anda mengetahui
                                acara ini?</span>
                            <div class="grid sm:grid-cols-2 gap-3">
                                @php
                                $sources = [
                                'Instagram @kisantra.official',
                                'WhatsApp Broadcast',
                                'Teman / Rekomendasi',
                                'Lainnya',
                                ];
                                @endphp
                                @foreach ($sources as $src)
                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="sumber" value="{{ $src }}"
                                        class="text-blue-600 focus:ring-blue-500" {{ old('sumber')===$src ? 'checked'
                                        : '' }}>
                                    <span class="text-sm text-slate-700">{{ $src }}</span>
                                </label>
                                @endforeach
                            </div>
                            @error('sumber') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- 10. Persetujuan diundang ke grup --}}
                        <div class="mb-6">
                            <span class="block text-sm font-medium text-slate-700 mb-2">10. Apakah Anda bersedia
                                diundang ke grup Kisantra untuk informasi & link Zoom? <span
                                    class="text-red-500">*</span></span>
                            <div class="flex flex-wrap gap-3">
                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="persetujuan" value="Ya, saya bersedia"
                                        class="text-blue-600 focus:ring-blue-500" {{
                                        old('persetujuan')==='Ya, saya bersedia' ? 'checked' : '' }} required>
                                    <span class="text-sm text-slate-700">Ya, saya bersedia</span>
                                </label>
                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="persetujuan" value="Tidak"
                                        class="text-blue-600 focus:ring-blue-500" {{ old('persetujuan')==='Tidak'
                                        ? 'checked' : '' }} required>
                                    <span class="text-sm text-slate-700">Tidak</span>
                                </label>
                            </div>
                            @error('persetujuan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="mt-6 flex items-center gap-4">
                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-white font-semibold shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2 21l21-9L2 3v7l15 2-15 2v7z" />
                                </svg>
                                Daftar Sekarang
                            </button>
                            <p class="text-sm text-gray-500">Link Zoom akan dikirim ke email Anda.</p>
                        </div>

                        {{-- Privacy note --}}
                        <p class="mt-4 text-xs text-gray-500">
                            Dengan mengirim formulir ini, Anda setuju data digunakan untuk keperluan administrasi sesi
                            konsultasi.
                            Data Anda aman dan tidak dibagikan kepada pihak ketiga tanpa persetujuan.
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>