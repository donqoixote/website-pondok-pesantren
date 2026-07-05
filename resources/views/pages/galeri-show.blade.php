@extends('layouts.app')

@section('title', $gallery->title . ' — Galeri — ' . config('pondok.name'))

@section('content')
    <x-page-header title="{{ $gallery->title }}" subtitle="{{ $gallery->description ?? 'Koleksi foto galeri kegiatan' }}" breadcrumb="Galeri" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm text-forest-700">{{ $gallery->description }}</p>
                    <p class="mt-2 text-xs text-forest-500">{{ count($gallery->images ?: []) }} foto</p>
                </div>
                <a href="{{ route('galeri') }}" class="rounded-full border border-forest-700 bg-white px-4 py-2 text-sm font-semibold text-forest-800 transition hover:bg-forest-50">Kembali ke Galeri</a>
            </div>

            @if (!empty($gallery->images) && is_array($gallery->images))
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($gallery->images as $index => $image)
                        <button
                            type="button"
                            data-index="{{ $index }}"
                            data-src="{{ asset('storage/' . $image) }}"
                            data-alt="{{ $gallery->title }}"
                            class="group overflow-hidden rounded-3xl bg-white/5 shadow-sm transition hover:-translate-y-1"
                            onclick="openGalleryLightbox(this)"
                        >
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $gallery->title }}" class="h-72 w-full object-cover transition duration-300 group-hover:scale-105" />
                        </button>
                    @endforeach
                </div>
                <div id="gallery-lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/75 p-4">
                    <div class="relative w-full max-w-6xl">
                        <button type="button" onclick="closeGalleryLightbox()" class="absolute right-3 top-3 rounded-full bg-white/10 p-3 text-white transition hover:bg-white/20" aria-label="Tutup">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        <button type="button" onclick="prevGalleryImage()" class="absolute left-3 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-3 text-white transition hover:bg-white/20" aria-label="Sebelumnya">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6"/></svg>
                        </button>
                        <button type="button" onclick="nextGalleryImage()" class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-3 text-white transition hover:bg-white/20" aria-label="Selanjutnya">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/></svg>
                        </button>
                        <div class="overflow-hidden rounded-3xl bg-slate-950 shadow-2xl">
                            <img id="gallery-lightbox-image" src="" alt="" class="max-h-[80vh] w-full object-contain" />
                        </div>
                        <p id="gallery-lightbox-caption" class="mt-4 text-center text-sm text-white/75"></p>
                    </div>
                </div>
            @else
                <div class="rounded-3xl border border-dashed border-forest-300 bg-forest-50/40 p-12 text-center text-forest-700">
                    <p class="text-lg font-semibold">Belum ada foto di folder ini.</p>
                    <p class="mt-2 text-sm text-forest-600">Tambahkan foto melalui panel admin untuk menampilkan isi folder galeri.</p>
                </div>
            @endif
        </div>
    </section>

    <script>
        const galleryImages = @json(array_values($gallery->images ?? []));
        let galleryLightboxIndex = 0;

        function openGalleryLightbox(button) {
            const src = button.dataset.src;
            const alt = button.dataset.alt;
            galleryLightboxIndex = Number(button.dataset.index) || 0;
            const lightbox = document.getElementById('gallery-lightbox');
            const image = document.getElementById('gallery-lightbox-image');
            const caption = document.getElementById('gallery-lightbox-caption');

            image.src = src;
            image.alt = alt;
            caption.textContent = alt + ' • Foto ' + (galleryLightboxIndex + 1) + ' dari ' + galleryImages.length;
            lightbox.classList.remove('hidden');
        }

        function closeGalleryLightbox() {
            document.getElementById('gallery-lightbox').classList.add('hidden');
        }

        function prevGalleryImage() {
            if (galleryImages.length === 0) return;
            galleryLightboxIndex = (galleryLightboxIndex - 1 + galleryImages.length) % galleryImages.length;
            updateGalleryLightbox();
        }

        function nextGalleryImage() {
            if (galleryImages.length === 0) return;
            galleryLightboxIndex = (galleryLightboxIndex + 1) % galleryImages.length;
            updateGalleryLightbox();
        }

        function updateGalleryLightbox() {
            const image = document.getElementById('gallery-lightbox-image');
            const caption = document.getElementById('gallery-lightbox-caption');
            const lightbox = document.getElementById('gallery-lightbox');

            image.src = '{{ asset('storage/') }}' + '/' + galleryImages[galleryLightboxIndex];
            image.alt = '{{ $gallery->title }}';
            caption.textContent = '{{ $gallery->title }} • Foto ' + (galleryLightboxIndex + 1) + ' dari ' + galleryImages.length;
            lightbox.classList.remove('hidden');
        }

        document.getElementById('gallery-lightbox').addEventListener('click', function (event) {
            if (event.target === this) {
                closeGalleryLightbox();
            }
        });
    </script>
@endsection
