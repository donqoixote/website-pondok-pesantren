@extends('layouts.app')

@section('title', 'Karya Santri — ' . config('pondok.name'))

@section('content')
    <x-page-header 
        title="Galeri Karya Santri" 
        subtitle="Wadah kreativitas, sastra, seni, dan pemikiran santri Pondok Pesantren Al-Ikhlas Bahrul Ulum Tambakberas Jombang" 
        breadcrumb="Karya Santri" 
    />

    <section class="py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            {{-- Bagian Atas: Filter & CTA --}}
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between border-b border-forest-100 pb-8 mb-10">
                {{-- Kategori Filter --}}
                <div class="flex flex-wrap gap-2">
                    @php
                        $categories = [
                            '' => 'Semua Karya',
                            'Puisi' => 'Puisi',
                            'Cerpen' => 'Cerpen',
                            'Kaligrafi' => 'Kaligrafi / Seni',
                            'Opini' => 'Opini / Artikel',
                            'Lainnya' => 'Lainnya'
                        ];
                    @endphp
                    @foreach($categories as $key => $label)
                        <a 
                            href="{{ route('karya', $key ? ['kategori' => $key] : []) }}" 
                            class="rounded-xl px-4 py-2 text-xs font-semibold transition {{ ($category === $key || ($key === '' && !$category)) ? 'bg-forest-700 text-white shadow-md' : 'bg-white text-forest-700 hover:bg-forest-50 ring-1 ring-forest-100' }}"
                        >
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                {{-- Tombol Kirim Karya --}}
                <a 
                    href="{{ route('karya.tulis') }}" 
                    class="inline-flex items-center gap-2 rounded-xl bg-gold-500 px-5 py-2.5 text-xs font-bold text-forest-900 shadow-md transition hover:bg-gold-400"
                >
                    ✍ Kirim Karyamu
                </a>
            </div>

            {{-- Grid Karya --}}
            @if($karya->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl ring-1 ring-forest-100">
                    <span class="text-4xl">📚</span>
                    <h3 class="mt-4 text-lg font-bold text-forest-800">Belum ada karya santri</h3>
                    <p class="mt-2 text-sm text-forest-500">Jadilah yang pertama mengirimkan karya kreatifmu!</p>
                    <a href="{{ route('karya.tulis') }}" class="mt-6 inline-flex rounded-xl bg-forest-700 px-5 py-2.5 text-xs font-semibold text-white transition hover:bg-forest-800">
                        Kirim Karya Sekarang
                    </a>
                </div>
            @else
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($karya as $item)
                        @php
                            $isImageOnly = ($item->category === 'Kaligrafi') && $item->image_path;
                        @endphp
                        <article class="flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-forest-100 transition hover:-translate-y-1 hover:shadow-md">
                            
                            {{-- Foto Karya (Jika Ada) --}}
                            @if($item->image_path)
                                <div class="relative aspect-[4/3] overflow-hidden bg-forest-50 border-b border-forest-50">
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="h-full w-full object-cover">
                                    <span class="absolute top-3 left-3 rounded-full bg-forest-900/80 px-3 py-1 text-[10px] font-semibold text-gold-300 backdrop-blur-sm">
                                        {{ $item->category }}
                                    </span>
                                </div>
                            @endif

                            {{-- Info Konten --}}
                            <div class="flex flex-col flex-grow p-6">
                                @if(!$item->image_path)
                                    <div class="mb-4">
                                        <span class="rounded-full bg-forest-100 px-3 py-1 text-[10px] font-medium text-forest-700">
                                            {{ $item->category }}
                                        </span>
                                    </div>
                                @endif

                                <h3 class="text-lg font-bold text-forest-800 leading-snug line-clamp-2">
                                    {{ $item->title }}
                                </h3>

                                <div class="mt-2 flex items-center justify-between text-xs text-forest-500">
                                    <span>Oleh: <strong class="text-forest-700 font-semibold">{{ $item->author }}</strong></span>
                                    @if($item->class)
                                        <span class="rounded-md bg-cream px-2 py-0.5 border border-forest-100/50 text-[10px]">{{ $item->class }}</span>
                                    @endif
                                </div>

                                {{-- Snippet Teks (Jika ada content) --}}
                                @if($item->content)
                                    <div class="mt-4 text-sm leading-relaxed text-forest-600 line-clamp-4 prose prose-sm max-w-none">
                                        {!! strip_tags($item->content) !!}
                                    </div>
                                @endif

                                <div class="mt-6 pt-4 border-t border-forest-50 flex items-center justify-between">
                                    <span class="text-[10px] text-forest-400">
                                        {{ $item->created_at->translatedFormat('d M Y') }}
                                    </span>

                                    <button 
                                        type="button" 
                                        onclick="openKaryaModal({{ $item->id }})"
                                        class="text-xs font-bold text-forest-700 hover:text-forest-900 hover:underline"
                                    >
                                        Baca Selengkapnya →
                                    </button>
                                </div>
                            </div>
                        </article>

                        {{-- Modal Data Carrier --}}
                        <div id="karya-data-{{ $item->id }}" class="hidden">
                            <span class="title">{{ $item->title }}</span>
                            <span class="author">{{ $item->author }}</span>
                            <span class="class">{{ $item->class }}</span>
                            <span class="category">{{ $item->category }}</span>
                            <span class="date">{{ $item->created_at->translatedFormat('d F Y') }}</span>
                            @if($item->image_path)
                                <span class="image">{{ asset('storage/' . $item->image_path) }}</span>
                            @endif
                            <div class="content">{!! $item->content !!}</div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($karya->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $karya->links() }}
                    </div>
                @endif
            @endif
        </div>
    </section>

    {{-- Modern CSS Modal --}}
    <div id="karya-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm hidden" role="dialog" aria-modal="true">
        <div class="relative w-full max-w-2xl rounded-2xl bg-white p-6 shadow-2xl ring-1 ring-black/5 max-h-[85vh] overflow-y-auto flex flex-col transition duration-300 transform scale-95 opacity-0" id="modal-container">
            {{-- Header --}}
            <div class="flex items-start justify-between border-b border-forest-100 pb-4">
                <div>
                    <span id="modal-category" class="rounded-full bg-forest-100 px-3 py-0.5 text-xs font-semibold text-forest-700"></span>
                    <h2 id="modal-title" class="mt-2 text-xl font-bold text-forest-800"></h2>
                    <p class="mt-1 text-xs text-forest-500">
                        Oleh: <span id="modal-author" class="font-semibold text-forest-700"></span> 
                        <span id="modal-class-wrapper" class="hidden">(<span id="modal-class"></span>)</span>
                        • <span id="modal-date"></span>
                    </p>
                </div>
                <button type="button" onclick="closeKaryaModal()" class="rounded-lg p-1.5 text-forest-400 hover:bg-forest-50 hover:text-forest-700" aria-label="Tutup">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Body --}}
            <div class="py-6 flex-grow space-y-4">
                <div id="modal-image-wrapper" class="hidden">
                    <img id="modal-image" src="" alt="" class="mx-auto rounded-xl max-h-80 object-contain shadow-md">
                </div>
                <div id="modal-content" class="prose prose-sm max-w-none text-forest-750 leading-relaxed font-sans overflow-x-auto">
                    {{-- Diisi secara dinamis --}}
                </div>
            </div>
            
            {{-- Footer --}}
            <div class="border-t border-forest-50 pt-4 flex justify-end">
                <button type="button" onclick="closeKaryaModal()" class="rounded-xl border border-forest-200 px-4 py-2 text-xs font-semibold text-forest-600 transition hover:bg-forest-50">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    {{-- JavaScript Modal Control --}}
    <script>
        function openKaryaModal(id) {
            const dataEl = document.getElementById('karya-data-' + id);
            if (!dataEl) return;

            const title = dataEl.querySelector('.title').textContent;
            const author = dataEl.querySelector('.author').textContent;
            const className = dataEl.querySelector('.class').textContent;
            const category = dataEl.querySelector('.category').textContent;
            const date = dataEl.querySelector('.date').textContent;
            const content = dataEl.querySelector('.content').innerHTML;
            const imageEl = dataEl.querySelector('.image');

            document.getElementById('modal-title').textContent = title;
            document.getElementById('modal-author').textContent = author;
            document.getElementById('modal-category').textContent = category;
            document.getElementById('modal-date').textContent = date;
            document.getElementById('modal-content').innerHTML = content;

            // Kelas wrapper
            const classWrapper = document.getElementById('modal-class-wrapper');
            const classVal = document.getElementById('modal-class');
            if (className.trim()) {
                classVal.textContent = className;
                classWrapper.classList.remove('hidden');
            } else {
                classWrapper.classList.add('hidden');
            }

            // Image wrapper
            const imageWrapper = document.getElementById('modal-image-wrapper');
            const img = document.getElementById('modal-image');
            if (imageEl) {
                img.src = imageEl.textContent;
                img.alt = title;
                imageWrapper.classList.remove('hidden');
            } else {
                img.src = "";
                imageWrapper.classList.add('hidden');
            }

            // Show modal
            const modal = document.getElementById('karya-modal');
            const container = document.getElementById('modal-container');
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeKaryaModal() {
            const modal = document.getElementById('karya-modal');
            const container = document.getElementById('modal-container');
            
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }

        // Close on backdrop click
        document.getElementById('karya-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeKaryaModal();
            }
        });
    </script>
@endsection
