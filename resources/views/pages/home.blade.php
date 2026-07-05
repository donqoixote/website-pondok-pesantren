@extends('layouts.app')

@section('title', 'Beranda — ' . config('pondok.name'))

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-forest-800 via-forest-700 to-forest-900 text-white">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute right-0 top-0 h-96 w-96 translate-x-1/3 -translate-y-1/3 rounded-full bg-gold-400/30 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-72 w-72 -translate-x-1/3 translate-y-1/3 rounded-full bg-forest-500/40 blur-3xl"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 sm:py-28 lg:px-8 lg:py-32">
            <div class="max-w-3xl">
                <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-gold-400/30 bg-gold-400/10 px-4 py-1.5 text-sm text-gold-300">
                    <span class="h-2 w-2 rounded-full bg-gold-400"></span>
                    Penerimaan Santri Baru 2026/2027 — Dibuka
                </p>
                <h1 class="text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl">
                    {{ config('pondok.name') }}
                </h1>
                <p class="mt-2 font-arabic text-2xl text-gold-300/90 sm:text-3xl">وَمَا خَلَقْتُ الْجِنَّ وَالْإِنسَ إِلَّا لِيَعْبُدُونِ</p>
                <p class="mt-6 text-lg leading-relaxed text-forest-100 sm:text-xl">
                    {{ config('pondok.tagline') }}
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('pendaftaran') }}" class="rounded-xl bg-gold-500 px-6 py-3.5 text-sm font-semibold text-forest-900 shadow-lg transition hover:bg-gold-400">
                        Daftar Santri Baru
                    </a>
                    <a href="{{ route('profil') }}" class="rounded-xl border border-white/30 px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                        Kenali Pesantren
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="relative -mt-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4 rounded-2xl bg-white p-6 shadow-xl ring-1 ring-forest-100 lg:grid-cols-4 lg:gap-6 lg:p-8">
            @foreach (config('pondok.stats') as $stat)
                <div class="text-center">
                    <p class="text-3xl font-bold text-forest-700 lg:text-4xl">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-sm text-forest-500">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Tentang singkat --}}
    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Tentang Kami</span>
                    <h2 class="mt-2 text-3xl font-bold text-forest-800 sm:text-4xl">Pesantren yang Mengutamakan Ilmu & Akhlak</h2>
                    <p class="mt-4 leading-relaxed text-forest-600">
                        {{ config('pondok.description') }}
                    </p>
                    <p class="mt-4 leading-relaxed text-forest-600">
                        Berdiri sejak tahun {{ config('pondok.founded') }}, kami berkomitmen mencetak generasi muslim yang hafal Al-Qur'an, cerdas akademik, dan siap berkhidmah untuk umat.
                    </p>
                    <a href="{{ route('profil') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-forest-700 hover:text-forest-900">
                        Selengkapnya
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <div class="relative">
                    <div class="aspect-[4/3] overflow-hidden rounded-2xl bg-gradient-to-br from-forest-600 to-forest-800 shadow-2xl">
                        <div class="flex h-full flex-col items-center justify-center p-8 text-center text-white">
                            <span class="text-6xl font-bold text-gold-300/40">إخلاص</span>
                            <p class="mt-4 text-lg font-medium">Berkhidmah dengan Ikhlas</p>
                            <p class="mt-2 text-sm text-forest-200">Ilmu — Amal — Akhlak</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 rounded-xl bg-gold-500 px-5 py-3 shadow-lg">
                        <p class="text-2xl font-bold text-forest-900">{{ config('pondok.founded') }}</p>
                        <p class="text-xs font-medium text-forest-800">Tahun Berdiri</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Program --}}
    <section class="bg-forest-50 py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Program Unggulan</span>
                <h2 class="mt-2 text-3xl font-bold text-forest-800">Kurikulum Terpadu Pesantren</h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (config('pondok.programs') as $program)
                    <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100 transition hover:-translate-y-1 hover:shadow-md">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-forest-100 text-forest-700">
                            <x-program-icon :icon="$program['icon']" />
                        </div>
                        <h3 class="mt-4 font-semibold text-forest-800">{{ $program['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-forest-600">{{ $program['description'] }}</p>
                    </article>
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('program') }}" class="inline-flex rounded-xl border border-forest-300 px-6 py-3 text-sm font-semibold text-forest-700 transition hover:bg-forest-700 hover:text-white">
                    Lihat Semua Program
                </a>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section class="py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Berita & Kegiatan</span>
                    <h2 class="mt-2 text-3xl font-bold text-forest-800">Informasi Terbaru</h2>
                </div>
                <a href="{{ route('berita') }}" class="text-sm font-semibold text-forest-700 hover:text-forest-900">Semua berita →</a>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($news as $item)
                    <a href="{{ route('berita.show', $item) }}" class="group block overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-forest-100 transition hover:shadow-md">
                        @if($item->image)
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            </div>
                        @else
                            <div class="flex h-40 items-center justify-center bg-gradient-to-br from-forest-600 to-forest-800 font-semibold text-white/20">
                                <span>{{ $item->category }}</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <span class="rounded-full bg-forest-100 px-3 py-1 text-xs font-medium text-forest-700">{{ $item->category }}</span>
                            <h3 class="mt-3 font-semibold text-forest-800 group-hover:text-forest-600">{{ $item->title }}</h3>
                            <p class="mt-2 text-sm text-forest-500">{{ ($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}</p>
                            <p class="mt-3 text-sm leading-relaxed text-forest-600">{{ $item->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="mx-4 mb-20 sm:mx-6 lg:mx-8">
        <div class="mx-auto max-w-7xl overflow-hidden rounded-3xl bg-gradient-to-r from-forest-800 to-forest-700 px-8 py-14 text-center text-white sm:px-16">
            <h2 class="text-2xl font-bold sm:text-3xl">Wujudkan Cita-cita Menjadi Hafidz & Sarjana Islam</h2>
            <p class="mx-auto mt-4 max-w-xl text-forest-200">Bergabunglah bersama ribuan santri yang telah memilih Pondok Pesantren Ikhlas sebagai rumah kedua mereka.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('pendaftaran') }}" class="rounded-xl bg-gold-500 px-6 py-3.5 text-sm font-semibold text-forest-900 transition hover:bg-gold-400">Info Pendaftaran</a>
                <a href="https://wa.me/{{ config('pondok.whatsapp') }}" target="_blank" rel="noopener" class="rounded-xl border border-white/30 px-6 py-3.5 text-sm font-semibold transition hover:bg-white/10">Hubungi Panitia</a>
            </div>
        </div>
    </section>
@endsection
