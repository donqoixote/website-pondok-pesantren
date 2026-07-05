@extends('layouts.app')

@section('title', 'Berita — ' . config('pondok.name'))

@section('content')
    <x-page-header title="Berita & Pengumuman" subtitle="Informasi kegiatan, prestasi, dan pengumuman resmi pesantren" breadcrumb="Berita" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($news as $item)
                    <a href="{{ route('berita.show', $item) }}" class="group block overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-forest-100 transition hover:shadow-md">
                        @if($item->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105">
                            </div>
                        @else
                            <div class="flex h-48 items-center justify-center bg-gradient-to-br from-forest-600 to-forest-800 font-semibold text-white/20">
                                <span>{{ $item->category }}</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <span class="rounded-full bg-forest-100 px-3 py-1 text-xs font-medium text-forest-700">{{ $item->category }}</span>
                                <time class="text-xs text-forest-500">{{ ($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}</time>
                            </div>
                            <h2 class="mt-4 text-lg font-semibold text-forest-800 group-hover:text-forest-600">{{ $item->title }}</h2>
                            <p class="mt-3 text-sm leading-relaxed text-forest-600">{{ $item->excerpt }}</p>
                            <span class="mt-4 inline-block text-sm font-semibold text-forest-700">Baca selengkapnya →</span>
                        </div>
                    </a>
                @endforeach
            </div>

            @if($news->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
