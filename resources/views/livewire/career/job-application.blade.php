<div class="min-h-screen bg-gray-50 py-8 sm:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Success Message --}}
        @if($showSuccessMessage)
        <div class="mb-8 bg-white border border-gray-200 rounded-lg shadow-sm p-8 text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Lamaran Berhasil Dikirim!</h3>
            <p class="text-gray-600 mb-6 max-w-lg mx-auto leading-relaxed">
                Terima kasih telah melamar untuk posisi <strong class="font-semibold text-gray-900">{{
                    $jobPosting->title }}</strong>.
                Data Anda telah tersimpan dalam sistem kami dan tim akan meninjau lamaran Anda.
            </p>
            <button wire:click="backToJobs"
                class="inline-flex items-center bg-gray-900 hover:bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Lowongan Kerja
            </button>
        </div>
        @else

        {{-- Header Card --}}
        <div class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden border border-gray-200">
            <div class="bg-gray-900 px-6 sm:px-8 py-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h1 class="text-2xl sm:text-3xl font-bold text-white mb-4">{{ $jobPosting->title }}</h1>
                        <div class="flex flex-wrap gap-4 text-sm text-gray-300">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $jobPosting->division ?: 'Lainnya' }}
                            </span>
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $jobPosting->location }}
                            </span>
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $jobPosting->employment_type_display }}
                            </span>
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $jobPosting->work_type_display }}
                            </span>
                        </div>
                    </div>
                    <button wire:click="backToJobs"
                        class="ml-4 p-2 text-gray-400 hover:text-white rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="px-6 sm:px-8 py-6 bg-white border-t border-gray-200">
                <p class="text-gray-700 leading-relaxed">
                    {!! Str::limit($jobPosting->description, 250) !!}
                </p>
            </div>
        </div>

        {{-- Application Form --}}
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <div class="bg-white px-6 sm:px-8 py-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Formulir Lamaran</h2>
                <p class="text-gray-600">Lengkapi informasi berikut untuk mengirimkan lamaran Anda</p>
            </div>

            <form wire:submit="submitApplication" class="p-6 sm:p-8" wire:key="application-form"
                x-data="{ sumberInfo: @entangle('sumber_info') }">

                {{-- Prevent entire form from fading during file upload --}}
                <div wire:loading.class="opacity-50 pointer-events-none" wire:target="submitApplication">

                    {{-- Personal Information Section --}}
                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">Informasi Pribadi
                        </h3>

                        <div class="space-y-6">
                            {{-- Nama Lengkap --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="nama_lengkap"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Nama Lengkap <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <input type="text" id="nama_lengkap" wire:model.defer="nama_lengkap"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition-colors"
                                        placeholder="Masukkan nama lengkap Anda">
                                    @error('nama_lengkap')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email Aktif --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="email_aktif"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Email Aktif <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <input type="email" id="email_aktif" wire:model.defer="email_aktif"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition-colors"
                                        placeholder="nama@email.com">
                                    @error('email_aktif')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Nomor Telepon --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="nomor_telepon"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Nomor Telepon (WhatsApp) <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <input type="tel" id="nomor_telepon" wire:model.defer="nomor_telepon"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition-colors"
                                        placeholder="+62 812 3456 7890">
                                    @error('nomor_telepon')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Alamat --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="alamat"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Alamat Lengkap <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <textarea id="alamat" wire:model.defer="alamat" rows="3"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition-colors resize-none"
                                        placeholder="Masukkan alamat lengkap Anda"></textarea>
                                    @error('alamat')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Sumber Info --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="sumber_info"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Sumber Informasi Lowongan <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <select id="sumber_info" x-model="sumberInfo" wire:model="sumber_info"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition-colors">
                                        <option value="">Pilih sumber informasi</option>
                                        @foreach($sumberInfoOptions as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('sumber_info')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Sumber Info Lainnya --}}
                            <div x-show="sumberInfo === 'other'" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0" style="display: none;"
                                class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="sumber_info_lainnya"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Sebutkan Sumber Informasi <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <input type="text" id="sumber_info_lainnya" wire:model.defer="sumber_info_lainnya"
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-gray-900 transition-colors"
                                        placeholder="Sebutkan dari mana Anda mengetahui lowongan ini">
                                    @error('sumber_info_lainnya')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Job Information Section --}}
                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">Informasi Posisi
                        </h3>

                        <div class="space-y-6">
                            {{-- Divisi --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="divisi"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Divisi <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <input type="text" id="divisi" wire:model.defer="divisi" disabled readonly
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg bg-gray-50 text-gray-600 cursor-not-allowed"
                                        value="{{ $jobPosting->division ?: 'Lainnya' }}">
                                    <p class="mt-1.5 text-xs text-gray-500">API akan menentukan department otomatis
                                        berdasarkan posisi
                                    </p>
                                </div>
                            </div>

                            {{-- Nama Posisi --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="nama_posisi"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Nama Posisi <span class="text-red-600">*</span>
                                </label>
                                <div class="md:col-span-2">
                                    <input type="text" id="nama_posisi" wire:model.defer="nama_posisi" disabled readonly
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg bg-gray-50 text-gray-600 cursor-not-allowed"
                                        value="{{ $jobPosting->title }}">
                                    <p class="mt-1.5 text-xs text-gray-500">Terisi otomatis sesuai lowongan yang dipilih
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- File Upload Section --}}
                    <div class="mb-10">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 pb-3 border-b border-gray-200">Dokumen Pendukung
                        </h3>

                        <div class="space-y-6">
                            {{-- File Upload Area --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                                <label for="files"
                                    class="block text-sm font-medium text-gray-900 md:text-right md:pt-2">
                                    Upload File
                                </label>
                                <div class="md:col-span-2">
                                    <label for="files" class="block">
                                        <div
                                            class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors cursor-pointer bg-gray-50">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <div class="mt-4">
                                                <span class="text-sm font-medium text-gray-700">Klik untuk upload
                                                    file</span>
                                                <span class="text-sm text-gray-500"> atau drag & drop</span>
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500">
                                                PDF, DOC, DOCX, JPG, JPEG, PNG (Maks. 5MB per file)
                                            </p>
                                        </div>
                                    </label>
                                    <input type="file" id="files" wire:model="files" multiple
                                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="hidden">

                                    {{-- Loading Indicator --}}
                                    <div wire:loading wire:target="files" class="mt-4">
                                        <div class="flex items-center justify-center space-x-2 text-gray-600">
                                            <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span class="text-sm font-medium">Mengunggah file...</span>
                                        </div>
                                    </div>

                                    @error('files.*')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                    @enderror

                                    {{-- File Preview --}}
                                    @if($files)
                                    <div class="mt-4 space-y-2">
                                        <p class="text-sm font-medium text-gray-700">File yang dipilih ({{ count($files)
                                            }}):</p>
                                        @foreach($files as $index => $file)
                                        <div
                                            class="flex items-center justify-between bg-white border border-gray-200 rounded-lg p-3 hover:border-gray-300 transition-colors">
                                            <div class="flex items-center space-x-3 flex-1 min-w-0">
                                                <div class="flex-shrink-0">
                                                    @if(in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg',
                                                    'png']))
                                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    @elseif($file->getClientOriginalExtension() === 'pdf')
                                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    @else
                                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    @endif
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-medium text-gray-900 truncate">{{
                                                        $file->getClientOriginalName() }}</p>
                                                    <p class="text-xs text-gray-500">{{ number_format($file->getSize() /
                                                        1024, 1) }} KB</p>
                                                </div>
                                            </div>
                                            <button type="button" wire:click="removeFile({{ $index }})"
                                                class="ml-4 flex-shrink-0 text-gray-400 hover:text-red-600 transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- General Error --}}
                    @error('general')
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    </div>
                    @enderror

                    {{-- Action Buttons --}}
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-8 border-t border-gray-200">
                        <button type="button" wire:click="backToJobs"
                            class="text-gray-600 hover:text-gray-900 font-medium transition-colors">
                            ← Kembali ke Lowongan Kerja
                        </button>

                        <button type="submit"
                            class="bg-gray-900 hover:bg-gray-800 disabled:bg-gray-400 text-white px-8 py-3 rounded-lg font-semibold transition-colors"
                            wire:loading.attr="disabled" wire:target="submitApplication">
                            <span wire:loading.remove wire:target="submitApplication">Kirim Lamaran</span>
                            <span wire:loading wire:target="submitApplication" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Mengirim
                            </span>
                        </button>
                    </div>

                </div> {{-- End prevent fade wrapper --}}
            </form>
        </div>
        @endif
    </div>
</div>