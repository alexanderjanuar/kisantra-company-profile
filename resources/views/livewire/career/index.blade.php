<div class="min-h-screen mb-52" x-data="{ 
    showModal: false, 
    selectedJob: null,
    showStickyHeader: false,
    openModal(job) {
        this.selectedJob = job;
        this.showModal = true;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.showModal = false;
        this.selectedJob = null;
        document.body.style.overflow = 'auto';
        this.showStickyHeader = false;
    },
    shareJob() {
        if (navigator.share) {
            navigator.share({
                title: this.selectedJob?.title,
                text: `Lihat lowongan kerja ini: ${this.selectedJob?.title}`,
                url: window.location.href
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(window.location.href);
            alert('Link lowongan kerja berhasil disalin!');
        }
    },
    formatDate(dateString) {
        if (!dateString) return 'Terbuka';
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
    }
}" @keydown.escape="closeModal()">

    {{-- Hero Section --}}
    <div class="bg-white">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-8 lg:px-16 py-12 sm:py-20">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6" data-aos="fade-up"
                    data-aos-duration="1000">
                    Mulai Berkarya dengan Penuh Makna
                </h1>
                <p class="text-lg sm:text-xl font-bold text-gray-900 max-w-3xl mx-auto px-4" data-aos="fade-up"
                    data-aos-delay="200" data-aos-duration="1000">
                    Filosofi kami sederhana — merekrut tim yang beragam dan bersemangat serta membangun budaya yang
                    memberdayakan Anda untuk memberikan yang terbaik.
                </p>
            </div>
            <div class="mt-12 sm:mt-15 pt-4" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <hr class="border-gray-200">
            </div>
        </div>
    </div>

    {{-- Job Listings --}}
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-8 lg:px-16 py-8 sm:py-16">
        <div class="space-y-16 sm:space-y-24">
            @php
            $jobsByDivision = $this->jobs->groupBy('division');
            @endphp

            @forelse($jobsByDivision as $division => $divisionJobs)
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-8 lg:gap-16">
                    {{-- Division Name (Left Side) --}}
                    <div class="lg:col-span-2" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
                        <div class="lg:sticky lg:top-8">
                            <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2">{{ $division ?: 'Lainnya'
                                }}</h2>
                            <p class="text-gray-600 text-sm sm:text-base">
                                Posisi terbuka di tim {{ strtolower($division ?: 'lainnya') }} kami.
                            </p>
                        </div>
                    </div>

                    {{-- Job Cards (Right Side) --}}
                    <div class="lg:col-span-4">
                        <div class="space-y-4 sm:space-y-6">
                            @foreach($divisionJobs as $job)
                            <div class="bg-white border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 p-4 sm:p-6 rounded-lg shadow-sm cursor-pointer"
                                data-aos="fade-left" data-aos-duration="600" data-aos-delay="{{ $loop->index * 150 }}"
                                data-aos-anchor-placement="top-bottom" @click="openModal({{ $job->toJson() }})">
                                {{-- Job Header --}}
                                <div class="flex flex-col sm:flex-row sm:items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <div
                                            class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-3 mb-2">
                                            <h3 class="text-lg font-bold text-black">
                                                {{ $job->title }}
                                            </h3>
                                            <span
                                                class="inline-flex font-bold items-center px-2.5 py-0.5 rounded text-xs bg-gray-100 text-gray-800 w-fit">
                                                {{ $job->division ?: 'Lainnya' }}
                                            </span>
                                        </div>
                                        <p class="text-gray-800 mb-6 sm:mb-12 text-sm font-normal">
                                            {{ Str::limit(strip_tags($job->description), 100) }}
                                        </p>

                                        {{-- Job Details --}}
                                        <div
                                            class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-6">
                                            {{-- Employment Type --}}
                                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                                <i class="far fa-clock w-4 h-4 flex items-center justify-center"></i>
                                                <span>{{ $job->employment_type_display }}</span>
                                            </div>

                                            {{-- Salary Range --}}
                                            @if($job->salary_min && $job->salary_max)
                                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                                <i
                                                    class="fas fa-dollar-sign w-4 h-4 flex items-center justify-center"></i>
                                                <span>{{ $job->formatted_salary }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Location Badge --}}
                                    <div class="flex items-center space-x-2 text-sm bg-blue-50 text-blue-700 px-3 py-1.5 rounded-full border border-blue-200 mt-4 sm:mt-0 sm:ml-6 w-fit"
                                        data-aos="zoom-in" data-aos-delay="{{ ($loop->index * 150) + 300 }}"
                                        data-aos-duration="400">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span class="font-medium">{{ $job->location }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Divider between groups --}}
                @if(!$loop->last)
                <div class="mt-12 sm:mt-15 pt-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                    <hr class="border-gray-200">
                </div>
                @endif
            </div>
            @empty
            {{-- No Jobs Found --}}
            <div class="text-center py-12 sm:py-20 px-4" data-aos="fade-up" data-aos-duration="800">
                <svg class="mx-auto h-12 sm:h-16 w-12 sm:w-16 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2-2H8a2 2 0 01-2-2V8a2 2 0 012-2V6">
                    </path>
                </svg>
                <h3 class="mt-4 text-xl sm:text-2xl font-medium text-gray-900" data-aos="fade-up" data-aos-delay="400"
                    data-aos-duration="600">
                    Tidak Ada Posisi Terbuka
                </h3>
                <p class="mt-2 text-base sm:text-lg text-gray-500" data-aos="fade-up" data-aos-delay="600"
                    data-aos-duration="600">
                    Saat ini kami tidak memiliki posisi terbuka. Silakan cek kembali nanti!
                </p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Job Details Modal - Responsive --}}
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 overflow-hidden" @click.self="closeModal()" x-cloak>

        <!-- Modal panel - Responsive -->
        <div class="absolute inset-y-0 right-0 w-full sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-3xl flex">
            <div x-show="showModal" x-transition:enter="transform transition ease-in-out duration-500"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="w-full">

                <div class="h-full flex flex-col bg-white shadow-xl overflow-hidden">
                    <!-- Static Header - Close button with conditional job title -->
                    <div class="bg-white px-4 sm:px-8 py-4 sm:py-8 relative z-10 border-b border-gray-200 transition-all duration-200"
                        :class="showStickyHeader ? 'shadow-sm' : 'border-transparent'">
                        <div class="flex items-center justify-end">
                            <!-- Conditional Job Title - Shows when scrolled -->
                            <div x-show="showStickyHeader" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-x-4"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-x-0"
                                x-transition:leave-end="opacity-0 -translate-x-4"
                                class="min-w-0 flex-1 mr-4 absolute left-4 sm:left-8 top-1/2 transform -translate-y-1/2">
                                <h2 x-text="selectedJob?.title"
                                    class="text-lg sm:text-xl font-bold text-gray-900 truncate"></h2>
                                <div class="flex items-center space-x-2 mt-1">
                                    <span x-text="selectedJob?.division || 'Lainnya'"
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 flex-shrink-0"></span>
                                    <span class="text-xs text-gray-500 truncate" x-text="selectedJob?.location"></span>
                                </div>
                            </div>
                            <!-- Close Button - Always aligned to the right -->
                            <button @click="closeModal()"
                                class="text-gray-400 hover:text-gray-600 transition-colors cursor-pointer flex-shrink-0">
                                <i class="fas fa-times text-2xl sm:text-3xl"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1 overflow-y-auto overflow-x-hidden"
                        @scroll="showStickyHeader = $el.scrollTop > 200">
                        <div class="px-4 sm:px-8 py-6 space-y-6 sm:space-y-8">

                            <!-- Company Logo and Action Buttons -->
                            <div
                                class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-4 sm:space-y-0">
                                <div class="flex justify-center sm:justify-start">
                                    <img src="{{ asset('image/Logo/Logo Vertical.png') }}" alt="Logo Perusahaan"
                                        class="h-16 sm:h-20 w-auto">
                                </div>
                                <div class="flex justify-center sm:justify-end space-x-3">
                                    <!-- Open in new tab button -->
                                    <button onclick="window.open(window.location.href, '_blank')"
                                        class="w-10 h-10 text-gray-400 hover:text-gray-600 bg-gray-100 hover:bg-gray-200 cursor-pointer rounded-full transition-colors flex items-center justify-center"
                                        title="Buka di tab baru">
                                        <i class="fas fa-external-link-alt text-sm"></i>
                                    </button>
                                    <!-- Share button -->
                                    <button @click="shareJob()"
                                        class="w-10 h-10 text-gray-400 hover:text-gray-600 bg-gray-100 hover:bg-gray-200 cursor-pointer rounded-full transition-colors flex items-center justify-center"
                                        title="Bagikan">
                                        <i class="fas fa-share-alt text-sm"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Job Title -->
                            <div>
                                <h1 x-text="selectedJob?.title"
                                    class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2"></h1>
                                <!-- Posted info -->
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-2 text-sm text-gray-500 mb-6">
                                    <span x-text="'Diposting ' + (selectedJob?.time_ago || 'baru-baru ini')"></span>
                                    <span class="hidden sm:inline">•</span>
                                    <span x-text="selectedJob?.division || 'Lainnya'"
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 w-fit"></span>
                                </div>
                            </div>

                            <!-- Job Information Labels - Responsive List -->
                            <div class="space-y-3 sm:space-y-4">
                                <!-- Location -->
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-map-marker-alt text-gray-400 w-5 text-center flex-shrink-0"></i>
                                    <span x-text="selectedJob?.location" class="text-black text-sm sm:text-base"></span>
                                </div>

                                <!-- Employment Type -->
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-briefcase text-gray-400 w-5 text-center flex-shrink-0"></i>
                                    <span x-text="selectedJob?.formatted_employment_type"
                                        class="text-black text-sm sm:text-base"></span>
                                </div>

                                <!-- Work Type -->
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-clock text-gray-400 w-5 text-center flex-shrink-0"></i>
                                    <span x-text="selectedJob?.formatted_work_type"
                                        class="text-black text-sm sm:text-base"></span>
                                </div>

                                <!-- Salary -->
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-dollar-sign text-gray-400 w-5 text-center flex-shrink-0"></i>
                                    <span x-text="selectedJob?.formatted_salary"
                                        class="text-black text-sm sm:text-base"></span>
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div>
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-4">Deskripsi Pekerjaan
                                </h3>
                                <div class="prose prose-sm sm:prose prose-gray max-w-none">
                                    <div x-html="selectedJob?.description || 'Deskripsi tidak tersedia.'"
                                        class="text-gray-700 leading-relaxed text-sm sm:text-base"></div>
                                </div>
                            </div>

                            <!-- Requirements -->
                            <div>
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 mb-4">Persyaratan</h3>
                                <div class="prose prose-sm sm:prose prose-gray max-w-none">
                                    <div x-html="selectedJob?.requirements || 'Persyaratan akan dibahas saat proses wawancara.'"
                                        class="text-gray-700 leading-relaxed text-sm sm:text-base"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer with application buttons - Responsive -->
                    <div class="bg-gray-50 px-4 sm:px-8 py-4 border-t border-gray-200">
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                            <div class="text-xs sm:text-sm text-gray-600 text-center sm:text-left">
                                <span>Batas waktu aplikasi: </span>
                                <span x-text="formatDate(selectedJob?.application_deadline)" class="font-medium"></span>
                            </div>
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                <button @click="closeModal()"
                                    class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors text-center">
                                    Tutup
                                </button>
                                <button @click="window.location.href = `/karir/${selectedJob?.id}/apply`"
                                    class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors text-center">
                                    Lamar Posisi Ini
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Enhanced styling for job content - Responsive */
        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 1rem 0;
        }

        .prose li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }

        .prose p {
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .prose h3,
        .prose h4 {
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #374151;
        }
    </style>
</div>