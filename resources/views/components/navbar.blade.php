@php
    $links = [
        ['route' => 'home', 'label' => 'Beranda'],
        ['route' => 'profil', 'label' => 'Profil'],
        ['route' => 'program', 'label' => 'Program'],
        ['route' => 'berita', 'label' => 'Berita'],
        ['route' => 'galeri', 'label' => 'Galeri'],
        ['route' => 'karya', 'label' => 'Karya Santri'],
        ['route' => 'kontak', 'label' => 'Kontak'],
    ];
@endphp

<header class="sticky top-0 z-40 border-b border-forest-100/80 bg-cream/95 backdrop-blur-md">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="group flex items-center gap-3">
            <img src="{{ asset('images/pondok.png') }}" alt="Logo Al-Ikhlas" class="h-20 w-20 object-contain">
            <span class="hidden sm:block">
                <span class="block text-sm font-bold leading-tight text-forest-900">{{ config('pondok.name') }}</span>
            </span>
        </a>

        <ul class="hidden items-center gap-1 md:flex">
            @foreach ($links as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs($link['route']) ? 'bg-forest-700 text-white' : 'text-forest-700 hover:bg-forest-50' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center gap-3">
            <a
                href="{{ route('pendaftaran') }}"
                class="hidden rounded-lg bg-gold-500 px-4 py-2 text-sm font-semibold text-forest-900 shadow-sm transition hover:bg-gold-400 sm:inline-block"
            >
                Daftar Santri
            </a>
            <button
                type="button"
                id="menu-toggle"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-forest-200 text-forest-700 md:hidden"
                aria-label="Buka menu"
                aria-expanded="false"
            >
                <svg class="h-5 w-5 menu-open" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="h-5 w-5 menu-close hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden border-t border-forest-100 bg-cream px-4 py-4 md:hidden">
        <ul class="space-y-1">
            @foreach ($links as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->routeIs($link['route']) ? 'bg-forest-700 text-white' : 'text-forest-700 hover:bg-forest-50' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
            <li class="pt-2">
                <a href="{{ route('pendaftaran') }}" class="block rounded-lg bg-gold-500 px-3 py-2.5 text-center text-sm font-semibold text-forest-900">
                    Daftar Santri
                </a>
            </li>
        </ul>
    </div>
</header>
