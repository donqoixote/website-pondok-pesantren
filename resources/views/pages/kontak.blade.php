@extends('layouts.app')

@section('title', 'Kontak — ' . config('pondok.name'))

@section('content')
    <x-page-header title="Hubungi Kami" subtitle="Kunjungi pesantren atau hubungi panitia untuk informasi lebih lanjut" breadcrumb="Kontak" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="space-y-6">
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100">
                        <h3 class="font-semibold text-forest-800">Alamat</h3>
                        <p class="mt-2 text-forest-600">{{ config('pondok.address') }}</p>
                    </div>
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100">
                        <h3 class="font-semibold text-forest-800">Telepon & Email</h3>
                        <p class="mt-2 text-forest-600">{{ config('pondok.phone') }}</p>
                        <p class="text-forest-600">{{ config('pondok.email') }}</p>
                    </div>
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100">
                        <h3 class="font-semibold text-forest-800">Media Sosial Resmi</h3>
                        <div class="mt-4 flex gap-4">
                            @if(config('pondok.social.instagram'))
                                <a href="{{ config('pondok.social.instagram') }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl bg-forest-100 text-forest-700 hover:bg-forest-700 hover:text-white transition" aria-label="Instagram">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                </a>
                            @endif
                            @if(config('pondok.social.youtube'))
                                <a href="{{ config('pondok.social.youtube') }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl bg-forest-100 text-forest-700 hover:bg-forest-700 hover:text-white transition" aria-label="YouTube">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.518 3.545 12 3.545 12 3.545s-7.518 0-9.388.507a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.87.507 9.388.507 9.388.507s7.518 0 9.388-.507a3.003 3.003 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </a>
                            @endif
                            @if(config('pondok.social.facebook'))
                                <a href="{{ config('pondok.social.facebook') }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl bg-forest-100 text-forest-700 hover:bg-forest-700 hover:text-white transition" aria-label="Facebook">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                            @endif
                            @if(config('pondok.social.tiktok'))
                                <a href="{{ config('pondok.social.tiktok') }}" target="_blank" rel="noopener noreferrer" class="flex h-10 w-10 items-center justify-center rounded-xl bg-forest-100 text-forest-700 hover:bg-forest-700 hover:text-white transition" aria-label="TikTok">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.01 1.76 4.08.97.91 2.25 1.45 3.58 1.62v3.9c-1.35-.02-2.68-.43-3.8-1.21-.6-.41-1.12-.95-1.5-1.58-.02 2.63-.01 5.25-.02 7.88-.04 2.37-.88 4.74-2.58 6.42-1.92 1.95-4.75 2.82-7.44 2.28-2.68-.49-5.07-2.45-5.99-5.01-1.07-2.88-.5-6.31 1.49-8.6 1.77-2.07 4.54-3.08 7.21-2.62.01 1.42.01 2.84.01 4.26-1.57-.45-3.32-.08-4.52.97-1.17 1-.16 2.05-.16 3.12 0 1.25 1.05 2.28 2.31 2.28 1.44-.01 2.68-1.12 2.76-2.56.02-3.61.01-7.23.01-10.84z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    <a
                        href="https://wa.me/{{ config('pondok.whatsapp') }}"
                        target="_blank"
                        rel="noopener"
                        class="inline-flex items-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-green-700"
                    >
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.881 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Chat WhatsApp
                    </a>
                </div>

                <form class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100" action="{{ route('kontak.kirim') }}" method="POST">
                    @csrf
                    <x-honeypot />
                    <h3 class="text-lg font-semibold text-forest-800">Kirim Pesan</h3>

                    @if(session('success'))
                        <div class="mt-4 rounded-lg bg-green-50 p-4 text-sm text-green-700 border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-4 rounded-lg bg-rose-50 p-4 text-sm text-rose-700 border border-rose-200">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-6 space-y-4">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-forest-700">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required value="{{ old('nama') }}" class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-forest-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200" placeholder="email@contoh.com">
                        </div>
                        <div>
                            <label for="pesan" class="block text-sm font-medium text-forest-700">Pesan</label>
                            <textarea id="pesan" name="pesan" rows="4" required class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200" placeholder="Tulis pesan Anda...">{{ old('pesan') }}</textarea>
                        </div>
                        <button type="submit" class="w-full rounded-xl bg-forest-700 px-4 py-3 text-sm font-semibold text-white transition hover:bg-forest-800">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
