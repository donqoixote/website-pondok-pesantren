@extends('layouts.app')

@section('title', 'Galeri — ' . config('pondok.name'))

@section('content')
    <x-page-header title="Galeri Kegiatan" subtitle="Dokumentasi kegiatan belajar, ibadah, dan aktivitas santri" breadcrumb="Galeri" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @php
                $gradients = [
                    ['from' => 'from-emerald-600', 'to' => 'to-forest-800'],
                    ['from' => 'from-forest-700', 'to' => 'to-forest-900'],
                    ['from' => 'from-gold-500', 'to' => 'to-forest-700'],
                    ['from' => 'from-teal-600', 'to' => 'to-forest-800'],
                    ['from' => 'from-forest-600', 'to' => 'to-emerald-800'],
                    ['from' => 'from-amber-500', 'to' => 'to-forest-700'],
                    ['from' => 'from-sky-600', 'to' => 'to-forest-800'],
                    ['from' => 'from-forest-800', 'to' => 'to-gold-600'],
                    ['from' => 'from-rose-600', 'to' => 'to-forest-800'],
                ];
            @endphp
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($galleries as $index => $item)
                    @php
                        $grad = $gradients[$index % count($gradients)];
                        $images = is_array($item->images) ? $item->images : [];
                        $coverImage = $item->cover_image ? asset('storage/' . $item->cover_image) : null;
                        $photoCount = count($images);
                    @endphp
                    <a href="{{ route('galeri.show', $item) }}" class="group block overflow-hidden rounded-2xl bg-gradient-to-br {{ $grad['from'] }} {{ $grad['to'] }} shadow-md transition hover:-translate-y-1">
                        <div class="relative h-64 overflow-hidden bg-slate-950/10">
                            @if($coverImage)
                                <img src="{{ $coverImage }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" />
                            @else
                                <div class="flex h-full items-center justify-center bg-white/10 text-sm text-white/70">Tidak ada gambar</div>
                            @endif
                            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/80 to-transparent"></div>
                        </div>
                        <div class="flex flex-col gap-3 p-5">
                            <div>
                                <p class="text-sm font-semibold text-white">{{ $item->title }}</p>
                                @if($item->description)
                                    <p class="mt-1 text-sm text-white/80 line-clamp-2">{{ $item->description }}</p>
                                @endif
                            </div>
                            <div class="flex items-center justify-between gap-3 text-xs text-white/80">
                                <span>{{ $photoCount }} foto</span>
                                <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1">Buka folder</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <p class="mt-8 text-center text-sm text-forest-500">Foto galeri dikelola melalui <a href="/admin" class="font-semibold text-forest-700 underline">Panel Admin</a>.</p>
        </div>
    </section>
@endsection
