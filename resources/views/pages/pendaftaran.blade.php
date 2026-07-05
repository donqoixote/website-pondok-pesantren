@extends('layouts.app')

@section('title', 'Pendaftaran — ' . config('pondok.name'))

@section('content')
    <x-page-header title="Pendaftaran Santri Baru" subtitle="Tahun Ajaran 2026/2027 — MTs & MA" breadcrumb="Pendaftaran" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 rounded-2xl border border-gold-200 bg-gold-50 p-6">
                <h3 class="font-semibold text-forest-800">Syarat Pendaftaran</h3>
                <ul class="mt-3 space-y-2 text-sm text-forest-700">
                    <li>• Formulir Pendaftaran</li>
                    <li>• Fotokopi Kartu Keluarga(KK)</li>
                    <li>• Fotocopy KTP Orang Tua / Wali</li>
                    <li>• Foto 3×4 Berwarna</li>
                    <li>• Melunasi Administrasi Pendaftaran</li>
                    <li>• Sowan Pengasuh</li>
                </ul>
            </div>

            <div class="mb-6 rounded-2xl border border-forest-100 bg-cream p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h4 class="font-semibold text-forest-800 text-sm">Sudah Melakukan Pendaftaran Online?</h4>
                    <p class="text-xs text-forest-500 mt-0.5">Periksa status penerimaan dan kelengkapan berkas Anda secara mandiri.</p>
                </div>
                <a href="{{ route('pendaftaran.status') }}" class="inline-flex justify-center items-center rounded-xl border border-forest-300 bg-white px-4 py-2 text-xs font-semibold text-forest-700 transition hover:bg-forest-50">
                    Cek Status Pendaftaran
                </a>
            </div>

            <form class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100" action="{{ route('pendaftaran.kirim') }}" method="POST">
                @csrf
                <x-honeypot />
                <h3 class="text-lg font-semibold text-forest-800">Formulir Pendaftaran Online</h3>

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

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="nama_santri" class="block text-sm font-medium text-forest-700">Nama Calon Santri</label>
                        <input type="text" id="nama_santri" name="nama_santri" required value="{{ old('nama_santri') }}" class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200">
                    </div>
                    <div>
                        <label for="jenjang" class="block text-sm font-medium text-forest-700">Jenjang</label>
                        <select id="jenjang" name="jenjang" required class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200">
                            <option value="mts" {{ old('jenjang') == 'mts' ? 'selected' : '' }}>MTs</option>
                            <option value="ma" {{ old('jenjang') == 'ma' ? 'selected' : '' }}>MA</option>
                        </select>
                    </div>
                    <div>
                        <label for="ttl" class="block text-sm font-medium text-forest-700">Tempat, Tanggal Lahir</label>
                        <input type="text" id="ttl" name="ttl" value="{{ old('ttl') }}" class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200" placeholder="Contoh: Jombang, 10 Mei 2012">
                    </div>
                    <div>
                        <label for="nama_ortu" class="block text-sm font-medium text-forest-700">Nama Orang Tua / Wali</label>
                        <input type="text" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200">
                    </div>
                    <div>
                        <label for="hp" class="block text-sm font-medium text-forest-700">No. HP / WhatsApp</label>
                        <input type="tel" id="hp" name="hp" required value="{{ old('hp') }}" class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200" placeholder="Contoh: 08123456789">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-forest-700">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="3" required class="mt-1 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="mt-6 w-full rounded-xl bg-gold-500 px-4 py-3.5 text-sm font-semibold text-forest-900 transition hover:bg-gold-400">
                    Kirim Pendaftaran
                </button>
                <p class="mt-4 text-center text-sm text-forest-500">
                    Atau hubungi panitia:
                    <a href="https://wa.me/{{ config('pondok.whatsapp') }}" class="font-medium text-forest-700 underline" target="_blank" rel="noopener">WhatsApp</a>
                </p>
            </form>
        </div>
    </section>
@endsection
