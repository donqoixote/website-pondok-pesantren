@extends('layouts.app')

@section('title', $item->title . ' — ' . config('pondok.name'))

@section('content')
    <x-page-header :title="$item->title" :breadcrumb="$item->category" />

    <article class="py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <nav class="mb-8 text-sm text-forest-500">
                <a href="{{ route('home') }}" class="hover:text-forest-800">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ route('berita') }}" class="hover:text-forest-800">Berita</a>
                <span class="mx-2">/</span>
                <span class="text-forest-700">{{ $item->title }}</span>
            </nav>

            <div class="flex flex-wrap items-center gap-3 text-sm text-forest-500">
                <span class="rounded-full bg-forest-100 px-3 py-1 font-medium text-forest-700">{{ $item->category }}</span>
                <time datetime="{{ ($item->published_at ?? $item->created_at)->toDateString() }}">
                    {{ ($item->published_at ?? $item->created_at)->translatedFormat('d F Y') }}
                </time>
            </div>

            @if ($item->image)
                <div class="mt-8 overflow-hidden rounded-2xl">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full object-cover">
                </div>
            @endif

            <div class="prose prose-forest mt-8 max-w-none leading-relaxed text-forest-700">
                {!! $item->content !!}
            </div>

            <div class="mt-12 border-t border-forest-100 pt-8">
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-forest-700 hover:text-forest-900">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                    Kembali ke daftar berita
                </a>
            </div>
        </div>
    </article>
@endsection
