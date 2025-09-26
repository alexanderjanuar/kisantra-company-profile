<div class="min-h-screen bg-gray-50 py-8 sm:py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Success Message --}}
        @if($showSuccessMessage)
        <div class="mb-8 bg-green-50 border border-green-200 rounded-lg p-6 text-center" data-aos="fade-in">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <i class="fas fa-check text-green-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-green-900 mb-2">Lamaran Berhasil Dikirim!</h3>
            <p class="text-green-700 mb-4">
                Terima kasih telah melamar untuk posisi <strong>{{ $jobPosting->title }}</strong>. 
                Kami akan menghubungi Anda jika profil Anda sesuai dengan kebutuhan posisi.
            </p>
            <button wire:click="backToJobs" 
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                Kembali ke Lowongan Kerja
            </button>
        </div>
        @else
        
        {{-- Header --}}
        <div class="bg-white rounded-lg shadow-sm mb-8 p-6 sm:p-8" data-aos="fade-up">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">{{ $jobPosting->title }}</h1>
                    <div class="flex flex-wrap items-center space-x-4 text-sm text-gray-600 mb-4">
                        <span class="flex items-center">
                            <i class="fas fa-building mr-2"></i>
                            {{ $jobPosting->division ?: 'Lainnya' }}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            {{ $jobPosting->location }}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-clock mr-2"></i>
                            {{ $jobPosting->employment_type_display }}
                        </span>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        {{ Str::limit(strip_tags($jobPosting->description), 200) }}
                    </p>
                </div>
                <button wire:click="backToJobs" 
                    class="ml-4 text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        {{-- Application Form --}}
        <div class="bg-white rounded-lg shadow-sm p-6 sm:p-8" data-aos="fade-up" data-aos-delay="200" 
             x-data="{ sumberInfo: @entangle('sumber_info') }">
            
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-2">Formulir Lamaran</h2>
                <p class="text-gray-600">Lengkapi informasi di bawah ini untuk melamar posisi tersebut.</p>
            </div>

            <form wire:submit="submitApplication" class="space-y-6" wire:key="application-form">
                {{-- Personal Information --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">Informasi Pribadi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap *
                            </label>
                            <input type="text" id="nama_lengkap" wire:model.defer="nama_lengkap"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors"
                                placeholder="Masukkan nama lengkap Anda">
                            @error('nama_lengkap')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email Aktif --}}
                        <div>
                            <label for="email_aktif" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Aktif *
                            </label>
                            <input type="email" id="email_aktif" wire:model.defer="email_aktif"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors"
                                placeholder="nama@email.com">
                            @error('email_aktif')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nomor Telepon (WA) --}}
                        <div>
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon (WhatsApp) *
                            </label>
                            <input type="tel" id="nomor_telepon" wire:model.defer="nomor_telepon"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors"
                                placeholder="+62 812 3456 7890">
                            @error('nomor_telepon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Sumber Info Pekerjaan --}}
                        <div>
                            <label for="sumber_info" class="block text-sm font-medium text-gray-700 mb-2">
                                Melihat pekerjaan dari mana? *
                            </label>
                            <select id="sumber_info" 
                                x-model="sumberInfo"
                                wire:model.defer="sumber_info"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors">
                                <option value="">Pilih sumber informasi</option>
                                @foreach($sumberInfoOptions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('sumber_info')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat *
                        </label>
                        <textarea id="alamat" wire:model.defer="alamat" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors resize-none"
                            placeholder="Masukkan alamat lengkap Anda"></textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sumber Info Lainnya (Conditional) --}}
                    <div x-show="sumberInfo === 'Lainnya'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         style="display: none;">
                        <label for="sumber_info_lainnya" class="block text-sm font-medium text-gray-700 mb-2">
                            Sebutkan sumber informasi lainnya *
                        </label>
                        <input type="text" id="sumber_info_lainnya" wire:model.defer="sumber_info_lainnya"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors"
                            placeholder="Sebutkan dari mana Anda mengetahui lowongan ini">
                        @error('sumber_info_lainnya')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Job Information --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">Informasi Posisi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Divisi --}}
                        <div>
                            <label for="divisi" class="block text-sm font-medium text-gray-700 mb-2">
                                Divisi *
                            </label>
                            <input type="text" id="divisi" wire:model.defer="divisi"
                                disabled readonly
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 cursor-not-allowed"
                                value="{{ $jobPosting->division ?: 'Lainnya' }}">
                            <p class="mt-1 text-xs text-gray-500">Divisi otomatis terisi sesuai posisi yang dilamar</p>
                            @error('divisi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nama Posisi --}}
                        <div>
                            <label for="nama_posisi" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Posisi *
                            </label>
                            <input type="text" id="nama_posisi" wire:model.defer="nama_posisi"
                                disabled readonly
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 cursor-not-allowed"
                                value="{{ $jobPosting->title }}">
                            <p class="mt-1 text-xs text-gray-500">Nama posisi otomatis terisi sesuai lowongan yang dipilih</p>
                            @error('nama_posisi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- File Upload --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">File Terkait</h3>
                    
                    {{-- File Upload using Livewire --}}
                    <div>
                        <label for="files" class="block text-sm font-medium text-gray-700 mb-2">
                            Upload File (CV, Portfolio, Sertifikat, dll)
                        </label>
                        <input type="file" 
                            id="files"
                            wire:model.defer="files" 
                            multiple 
                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors">
                        <p class="mt-1 text-xs text-gray-500">
                            Format: PDF, DOC, DOCX, JPG, JPEG, PNG. Maksimal 5MB per file.
                        </p>
                        @error('files.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- File Preview for uploaded files --}}
                    @if($files)
                    <div class="space-y-2">
                        <p class="text-sm font-medium text-gray-700">File yang dipilih:</p>
                        @foreach($files as $index => $file)
                        <div class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-lg p-3">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    @if(in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']))
                                        <i class="fas fa-image text-blue-500"></i>
                                    @elseif($file->getClientOriginalExtension() === 'pdf')
                                        <i class="fas fa-file-pdf text-red-500"></i>
                                    @else
                                        <i class="fas fa-file-alt text-gray-500"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $file->getClientOriginalName() }}</p>
                                    <p class="text-xs text-gray-500">{{ number_format($file->getSize() / 1024, 1) }} KB</p>
                                </div>
                            </div>
                            <button type="button" wire:click="removeFile({{ $index }})"
                                class="text-red-400 hover:text-red-600 transition-colors">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- General Error --}}
                @error('general')
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-red-600">{{ $message }}</p>
                    </div>
                @enderror

                {{-- Submit Buttons --}}
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 pt-6 border-t border-gray-200">
                    <button type="button" wire:click="backToJobs"
                        class="text-gray-600 hover:text-gray-800 font-medium transition-colors">
                        ← Kembali ke Lowongan Kerja
                    </button>
                    
                    <button type="submit" 
                        class="bg-pink-600 hover:bg-pink-700 disabled:bg-gray-400 text-white px-8 py-3 rounded-lg font-semibold transition-colors flex items-center space-x-2"
                        wire:loading.attr="disabled"
                        wire:target="submitApplication">
                        <span wire:loading.remove wire:target="submitApplication">Kirim Lamaran</span>
                        <span wire:loading wire:target="submitApplication" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Mengirim...
                        </span>
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>