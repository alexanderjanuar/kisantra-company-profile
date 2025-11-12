<!-- Service Detail Modal Partial -->
@if($showModal && $selectedService)
<div x-data="{ open: false }" x-init="$nextTick(() => { open = @js($showModal) })" x-show="open" x-cloak
    class="fixed inset-0 z-999 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
    @keydown.escape.window="open = false; $nextTick(() => $wire.closeModal())" style="display: none;">

    <!-- Background Overlay WITHOUT Blur -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60"
        @click="open = false; $nextTick(() => $wire.closeModal())"></div>

    <!-- Modal Content - Wider (max-w-5xl) -->
    <div class="flex min-h-full items-center justify-center p-4 sm:p-6 lg:p-8">
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-8 sm:scale-95" class="relative w-full max-w-5xl">

            <div class="transform overflow-hidden rounded-xl bg-white shadow-2xl">
                <!-- Close Button -->
                <button @click="open = false; $nextTick(() => $wire.closeModal())" type="button"
                    class="absolute top-4 right-4 z-10 p-2 rounded-full bg-white/80 hover:bg-white text-gray-400 hover:text-gray-600 transition-all shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <!-- Modal Header (Without Price) -->
                <div class="bg-gradient-to-br from-slate-50 to-gray-100 px-6 sm:px-8 py-6 border-b border-gray-200">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br {{ $selectedService['styles']['icon_bg'] }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-sm">
                            {!! $selectedService['icon'] !!}
                        </div>
                        <div class="flex-1">
                            <span
                                class="inline-block px-3 py-1 {{ $selectedService['styles']['badge_bg'] }} {{ $selectedService['styles']['badge_text'] }} text-xs font-semibold rounded-full mb-2">
                                {{ $selectedService['category'] }}
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-bold text-[#414141]">
                                {{ $selectedService['name'] }}
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Modal Body with Custom Styling for HTML Content -->
                <div class="px-6 sm:px-8 py-6 max-h-[60vh] overflow-y-auto modal-content-styling">

                    <!-- Description -->
                    <div class="mb-6">
                        <h4 class="text-lg font-bold text-[#414141] mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#42B2CD]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Deskripsi Layanan
                        </h4>
                        <div class="text-gray-600 leading-relaxed prose prose-base max-w-none">
                            {!! $selectedService['description'] !!}
                        </div>
                    </div>

                    <!-- Features -->
                    @if(!empty($selectedService['features']))
                    <div class="mb-6">
                        <h4 class="text-lg font-bold text-[#414141] mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#42B2CD]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Fitur & Benefit
                        </h4>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            @foreach($selectedService['features'] as $feature)
                            <div
                                class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl border border-gray-100 hover:border-[#42B2CD]/30 transition-colors">
                                <svg class="w-5 h-5 text-[#42B2CD] mt-0.5 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-medium">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Modal Footer with Price -->
                <div class="bg-gradient-to-r from-gray-50 to-slate-50 border-t border-gray-200 px-6 sm:px-8 py-5">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <!-- Price Section -->
                        <div class="flex items-center gap-4">
                            <div class="flex items-baseline gap-2">
                                {{-- <span class="text-sm font-medium text-gray-600">Harga:</span>
                                <span class="text-2xl font-bold {{ $selectedService['styles']['price_text'] }}">
                                    {{ $selectedService['price'] }}
                                </span>
                                @if($selectedService['price_note'])
                                <span class="text-sm text-gray-500">{{ $selectedService['price_note'] }}</span>
                                @endif --}}
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-3">
                            <button @click="open = false; $nextTick(() => $wire.closeModal())" type="button"
                                class="inline-flex justify-center items-center rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-colors">
                                Tutup
                            </button>
                            <a href="https://wa.me/6281180009787?text=Halo%20Kisantra,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($selectedService['name']) }}"
                                target="_blank"
                                class="inline-flex justify-center items-center gap-2 rounded-xl bg-[#25D366] px-5 py-2.5 text-sm font-semibold text-white shadow-lg hover:bg-[#20BA5A] transition-all duration-300 hover:scale-105 hover:shadow-xl">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                                <span>Pesan Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling for Modal Content -->
<style>
    /* Modal content styling for HTML elements */
    .modal-content-styling {

        /* Headings */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
            color: #414141;
            margin-bottom: 0.75rem;
            margin-top: 1.5rem;
        }

        h1 {
            font-size: 1.875rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        h3 {
            font-size: 1.25rem;
        }

        h4 {
            font-size: 1.125rem;
        }

        /* Paragraphs */
        p {
            margin-bottom: 1rem;
            line-height: 1.75;
            color: #4b5563;
        }

        /* Lists */
        ul,
        ol {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            color: #4b5563;
        }

        ul {
            list-style-type: disc;
        }

        ol {
            list-style-type: decimal;
        }

        li {
            margin-bottom: 0.5rem;
            line-height: 1.75;
        }

        li::marker {
            color: #42B2CD;
        }

        /* Nested lists */
        ul ul,
        ol ol,
        ul ol,
        ol ul {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Modern Table Design */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 1.5rem 0;
            font-size: 0.9375rem;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            border: 1px solid #e5e7eb;
        }

        thead {
            background: linear-gradient(135deg, #42B2CD 0%, #3A9FB8 100%);
        }

        th {
            padding: 1rem 1.25rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: none;
        }

        th:first-child {
            border-top-left-radius: 12px;
        }

        th:last-child {
            border-top-right-radius: 12px;
        }

        td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f3f4f6;
            color: #4b5563;
            vertical-align: top;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background-color: #f9fafb;
            transform: scale(1.01);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        tbody tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

        /* Striped rows effect */
        tbody tr:nth-child(even) {
            background-color: #fafafa;
        }

        tbody tr:nth-child(even):hover {
            background-color: #f3f4f6;
        }

        /* Links */
        a {
            color: #42B2CD;
            text-decoration: underline;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #3A9FB8;
        }

        /* Strong/Bold */
        strong,
        b {
            font-weight: 600;
            color: #1f2937;
        }

        /* Emphasis/Italic */
        em,
        i {
            font-style: italic;
        }

        /* Code */
        code {
            background-color: #f3f4f6;
            padding: 0.125rem 0.375rem;
            border-radius: 0.375rem;
            font-size: 0.875em;
            color: #db2777;
            font-family: ui-monospace, 'Cascadia Code', 'Source Code Pro', Menlo, Monaco, Consolas, monospace;
            border: 1px solid #e5e7eb;
        }

        /* Blockquote */
        blockquote {
            border-left: 4px solid #42B2CD;
            padding-left: 1rem;
            margin: 1.5rem 0;
            color: #6b7280;
            font-style: italic;
            background-color: #f9fafb;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        /* Horizontal Rule */
        hr {
            border: none;
            border-top: 2px solid #e5e7eb;
            margin: 2rem 0;
        }
    }

    /* Hide content initially (Alpine x-cloak) */
    [x-cloak] {
        display: none !important;
    }
</style>
@endif