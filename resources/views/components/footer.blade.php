<footer class="border-t border-forest-800/20 bg-forest-900 text-forest-100">
    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-6">
                    <img src="{{ asset('images/pondok.png') }}" alt="Logo Al-Ikhlas" class="h-20 w-20 object-contain">
                    <div>
                        <p class="font-semibold text-white">{{ config('pondok.name') }}</p>
                        <p class="text-sm text-forest-300">{{ config('pondok.tagline') }}</p>
                    </div>
                </div>
                <p class="mt-4 max-w-md text-sm leading-relaxed text-forest-300">
                    {{ config('pondok.description') }}
                </p>
                <div class="mt-6 flex gap-4">
                    @if(config('pondok.social.instagram'))
                        <a href="{{ config('pondok.social.instagram') }}" target="_blank" rel="noopener noreferrer" class="text-forest-400 hover:text-white transition" aria-label="Instagram">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                    @endif
                    @if(config('pondok.social.youtube'))
                        <a href="{{ config('pondok.social.youtube') }}" target="_blank" rel="noopener noreferrer" class="text-forest-400 hover:text-white transition" aria-label="YouTube">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.518 3.545 12 3.545 12 3.545s-7.518 0-9.388.507a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.87.507 9.388.507 9.388.507s7.518 0 9.388-.507a3.003 3.003 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    @endif
                    @if(config('pondok.social.facebook'))
                        <a href="{{ config('pondok.social.facebook') }}" target="_blank" rel="noopener noreferrer" class="text-forest-400 hover:text-white transition" aria-label="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if(config('pondok.social.tiktok'))
                        <a href="{{ config('pondok.social.tiktok') }}" target="_blank" rel="noopener noreferrer" class="text-forest-400 hover:text-white transition" aria-label="TikTok">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.01 1.76 4.08.97.91 2.25 1.45 3.58 1.62v3.9c-1.35-.02-2.68-.43-3.8-1.21-.6-.41-1.12-.95-1.5-1.58-.02 2.63-.01 5.25-.02 7.88-.04 2.37-.88 4.74-2.58 6.42-1.92 1.95-4.75 2.82-7.44 2.28-2.68-.49-5.07-2.45-5.99-5.01-1.07-2.88-.5-6.31 1.49-8.6 1.77-2.07 4.54-3.08 7.21-2.62.01 1.42.01 2.84.01 4.26-1.57-.45-3.32-.08-4.52.97-1.17 1-.16 2.05-.16 3.12 0 1.25 1.05 2.28 2.31 2.28 1.44-.01 2.68-1.12 2.76-2.56.02-3.61.01-7.23.01-10.84z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-gold-400">Navigasi</h3>
                <ul class="space-y-2 text-sm">
                    @foreach (['home' => 'Beranda', 'profil' => 'Profil', 'program' => 'Program', 'berita' => 'Berita', 'galeri' => 'Galeri', 'karya' => 'Karya Santri', 'kontak' => 'Kontak'] as $route => $label)
                        <li><a href="{{ route($route) }}" class="text-forest-300 transition hover:text-white">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-gold-400">Kontak</h3>
                <ul class="space-y-3 text-sm text-forest-300">
                    <li class="flex gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ config('pondok.address') }}
                    </li>
                    <li>{{ config('pondok.phone') }}</li>
                    <li>{{ config('pondok.email') }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-10 flex flex-col items-center justify-between gap-4 border-t border-forest-700 pt-8 text-sm text-forest-400 sm:flex-row">
            <p>&copy; {{ date('Y') }} {{ config('pondok.name') }}. Semua hak cipta dilindungi.</p>
            <p class="font-arabic text-gold-400/80">رَبِّ زِدْنِي عِلْمًا</p>
        </div>
    </div>
</footer>
