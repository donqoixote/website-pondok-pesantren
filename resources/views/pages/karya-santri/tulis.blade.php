@extends('layouts.app')

@section('title', 'Kirim Karya — ' . config('pondok.name'))

@section('content')
    <x-page-header 
        title="Kirimkan Karyamu" 
        subtitle="Bagikan puisi, cerpen, artikel opini, atau karya kaligrafi hasil kreativitasmu di sini" 
        breadcrumb="Tulis Karya" 
    />

    <section class="py-12 sm:py-16">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            
            {{-- Tombol Kembali --}}
            <div class="mb-6">
                <a href="{{ route('karya') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-forest-700 hover:text-forest-900">
                    ← Kembali ke Galeri Karya
                </a>
            </div>

            {{-- Formulir --}}
            <form class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100" action="{{ route('karya.kirim') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-honeypot />
                <h3 class="text-lg font-bold text-forest-800 border-b border-forest-50 pb-4 mb-6">Formulir Pengiriman Karya</h3>

                @if(session('success'))
                    <div class="mb-6 rounded-xl bg-green-50 p-4 text-sm text-green-700 border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-xl bg-rose-50 p-4 text-sm text-rose-700 border border-rose-200">
                        <span class="font-bold">Gagal mengirim karya:</span>
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-5">
                    {{-- Judul Karya --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-forest-700">Judul Karya</label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            required 
                            value="{{ old('title') }}" 
                            placeholder="Tuliskan judul karyamu"
                            class="mt-1.5 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200"
                        >
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        {{-- Nama Penulis --}}
                        <div>
                            <label for="author" class="block text-sm font-semibold text-forest-700">Nama Lengkap (Penulis)</label>
                            <input 
                                type="text" 
                                id="author" 
                                name="author" 
                                required 
                                value="{{ old('author') }}" 
                                placeholder="Nama lengkapmu"
                                class="mt-1.5 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200"
                            >
                        </div>

                        {{-- Kelas / Jenjang --}}
                        <div>
                            <label for="class" class="block text-sm font-semibold text-forest-700">Kelas / Jenjang (Opsional)</label>
                            <input 
                                type="text" 
                                id="class" 
                                name="class" 
                                value="{{ old('class') }}" 
                                placeholder="Contoh: IX MTs, X MA, dll."
                                class="mt-1.5 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200"
                            >
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="category" class="block text-sm font-semibold text-forest-700">Kategori Karya</label>
                        <select 
                            id="category" 
                            name="category" 
                            required
                            class="mt-1.5 w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200"
                        >
                            <option value="Puisi" {{ old('category') == 'Puisi' ? 'selected' : '' }}>Puisi</option>
                            <option value="Cerpen" {{ old('category') == 'Cerpen' ? 'selected' : '' }}>Cerpen</option>
                            <option value="Kaligrafi" {{ old('category') == 'Kaligrafi' ? 'selected' : '' }}>Kaligrafi / Lukisan (Berupa Gambar)</option>
                            <option value="Opini" {{ old('category') == 'Opini' ? 'selected' : '' }}>Opini / Artikel Pendek</option>
                            <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    {{-- Isi Karya (Teks) --}}
                    <div>
                        <label for="content" class="block text-sm font-semibold text-forest-700">Isi Karya (Teks)</label>
                        <p class="text-xs text-forest-500 mb-1.5">Tuliskan naskah puisi, cerpen, atau opini di sini. Kosongkan jika karya berupa foto/kaligrafi fisik.</p>
                        <textarea 
                            id="content" 
                            name="content" 
                            rows="10" 
                            placeholder="Tuliskan naskah karyamu secara lengkap..."
                            class="w-full rounded-lg border border-forest-200 px-4 py-2.5 text-sm focus:border-forest-500 focus:outline-none focus:ring-2 focus:ring-forest-200"
                        >{{ old('content') }}</textarea>
                    </div>

                    {{-- Upload Gambar --}}
                    <div>
                        <label for="image_path" class="block text-sm font-semibold text-forest-700">Upload Foto Karya (Opsional)</label>
                        <p class="text-xs text-forest-500 mb-2">Unggah foto kaligrafi, lukisan, poster, atau mading karyamu dalam format JPG/PNG (Maksimal 5MB).</p>
                        <input 
                            type="file" 
                            id="image_path" 
                            name="image_path" 
                            accept="image/*"
                            class="w-full text-sm text-forest-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-forest-100 file:text-forest-800 hover:file:bg-forest-200"
                        >
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-8 border-t border-forest-50 pt-6">
                    <button 
                        type="submit" 
                        class="w-full rounded-xl bg-forest-700 px-4 py-3.5 text-sm font-bold text-white shadow-md transition hover:bg-forest-800"
                    >
                        Kirim Karya ke Moderasi Admin
                    </button>
                    <p class="mt-3 text-center text-xs text-forest-500">
                        *Karya yang dikirim tidak akan langsung tampil di website. Admin akan memeriksa kelayakan karya terlebih dahulu.
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
