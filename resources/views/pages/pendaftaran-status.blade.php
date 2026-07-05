@extends('layouts.app')

@section('title', 'Cek Status Pendaftaran — ' . config('pondok.name'))

@section('content')
    <x-page-header title="Cek Status Pendaftaran" subtitle="Periksa status berkas dan penerimaan calon santri secara mandiri" breadcrumb="Status Pendaftaran" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            
            {{-- Form Pencarian --}}
            <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100">
                <form action="{{ route('pendaftaran.status') }}" method="GET">
                    <h3 class="text-lg font-semibold text-forest-800">Cari Data Pendaftaran</h3>
                    <p class="mt-1 text-sm text-forest-500">Masukkan nomor HP / WhatsApp yang Anda gunakan saat mendaftar online.</p>
                    
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <div class="relative flex-grow">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-forest-400">
                                📞
                            </div>
                            <input 
                                type="tel" 
                                name="hp" 
                                id="hp" 
                                required 
                                value="{{ $hp }}"
                                placeholder="Contoh: 08123456789" 
                                class="w-full rounded-xl border border-forest-200 py-3 pl-10 pr-4 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200"
                            >
                        </div>
                        <button 
                            type="submit" 
                            class="rounded-xl bg-forest-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-forest-850"
                        >
                            Cari Pendaftaran
                        </button>
                    </div>
                </form>
            </div>

            {{-- Tampilan Hasil Pencarian --}}
            @if($hp !== '')
                <div class="mt-10 space-y-6">
                    <h3 class="text-base font-semibold text-forest-800">Hasil Pencarian untuk: <span class="text-forest-650">{{ $hp }}</span></h3>

                    @if($registrations->isEmpty())
                        <div class="rounded-2xl border border-rose-100 bg-rose-50/50 p-6 text-center">
                            <span class="text-3xl">🔍</span>
                            <h4 class="mt-3 font-bold text-rose-800">Data Tidak Ditemukan</h4>
                            <p class="mt-2 text-sm text-rose-650 leading-relaxed">
                                Mohon maaf, tidak ditemukan data pendaftaran dengan nomor HP tersebut. <br>
                                Pastikan nomor HP yang Anda masukkan tepat atau silakan hubungi panitia pendaftaran.
                            </p>
                            <div class="mt-5">
                                <a 
                                    href="https://wa.me/{{ config('pondok.whatsapp') }}" 
                                    target="_blank" 
                                    rel="noopener" 
                                    class="inline-flex rounded-xl bg-rose-700 px-5 py-2.5 text-xs font-semibold text-white transition hover:bg-rose-850"
                                >
                                    Tanya Panitia via WhatsApp
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($registrations as $reg)
                                <article class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-forest-100">
                                    {{-- Card Header: Nama & Status --}}
                                    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-forest-50 bg-forest-50/40 px-6 py-4">
                                        <div>
                                            <h4 class="font-bold text-forest-800 text-lg">{{ $reg->nama_santri }}</h4>
                                            <p class="text-xs text-forest-500 mt-0.5">Terdaftar pada: {{ $reg->created_at->translatedFormat('d F Y, H:i') }}</p>
                                        </div>

                                        {{-- Badge Status --}}
                                        <div>
                                            @if($reg->status === 'approved')
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3.5 py-1 text-xs font-bold text-green-700 border border-green-200">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                                    Diterima / Lolos
                                                </span>
                                            @elseif($reg->status === 'rejected')
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-rose-50 px-3.5 py-1 text-xs font-bold text-rose-700 border border-rose-200">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                                    Belum Diterima
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3.5 py-1 text-xs font-bold text-amber-700 border border-amber-200">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                                    Menunggu Peninjauan
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Card Body: Detail Informasi --}}
                                    <div class="p-6">
                                        <div class="grid gap-x-6 gap-y-4 sm:grid-cols-2 text-sm text-forest-700">
                                            <div>
                                                <span class="text-xs font-medium text-forest-400 block">Jenjang Pendidikan</span>
                                                <strong class="text-forest-800 text-base font-semibold">{{ strtoupper($reg->jenjang) }}</strong>
                                            </div>
                                            <div>
                                                <span class="text-xs font-medium text-forest-400 block">Nama Orang Tua / Wali</span>
                                                <span class="font-medium">{{ $reg->nama_ortu ?: '-' }}</span>
                                            </div>
                                            <div>
                                                <span class="text-xs font-medium text-forest-400 block">Tempat, Tanggal Lahir</span>
                                                <span>{{ $reg->ttl ?: '-' }}</span>
                                            </div>
                                            <div>
                                                <span class="text-xs font-medium text-forest-400 block">Nomor HP / WhatsApp</span>
                                                <span>{{ $reg->hp }}</span>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <span class="text-xs font-medium text-forest-400 block">Alamat Lengkap</span>
                                                <p class="mt-1 leading-relaxed">{{ $reg->alamat ?: '-' }}</p>
                                            </div>
                                        </div>

                                        {{-- Informasi Lanjutan Berdasarkan Status --}}
                                        <div class="mt-6 border-t border-forest-50 pt-5">
                                            @if($reg->status === 'approved')
                                                <div class="rounded-xl bg-green-50/50 p-4 border border-green-100 text-xs text-green-800 leading-relaxed">
                                                    <strong>Selamat!</strong> Calon santri telah dinyatakan <strong>Diterima</strong>. Silakan segera menghubungi panitia pendaftaran melalui nomor WhatsApp resmi untuk koordinasi penyerahan berkas fisik, administrasi, dan pembagian kamar/kelas.
                                                </div>
                                            @elseif($reg->status === 'rejected')
                                                <div class="rounded-xl bg-rose-50/50 p-4 border border-rose-100 text-xs text-rose-800 leading-relaxed">
                                                    Mohon maaf, saat ini pendaftaran Anda belum disetujui oleh panitia. Silakan hubungi sekretariat pendaftaran pondok untuk informasi lebih lanjut mengenai hasil peninjauan berkas.
                                                </div>
                                            @else
                                                <div class="rounded-xl bg-amber-50/50 p-4 border border-amber-100 text-xs text-amber-800 leading-relaxed">
                                                    Berkas pendaftaran Anda telah berhasil kami terima dan sedang dalam proses verifikasi oleh panitia. Pengumuman penerimaan akan diperbarui di halaman ini atau dikirim via WhatsApp. Mohon untuk memantau status secara berkala.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-8 text-center">
                <a href="{{ route('pendaftaran') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-forest-700 hover:text-forest-900">
                    ← Kembali ke Halaman Pendaftaran
                </a>
            </div>

        </div>
    </section>
@endsection
