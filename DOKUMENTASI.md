# Dokumentasi Website Pondok Pesantren Ikhlas

Website profil resmi pondok pesantren berbasis **Laravel 13**, **Blade**, **Vite**, dan **Tailwind CSS 4**. Situs ini bersifat **statis/informatif**: konten utama diatur lewat file konfigurasi, tanpa panel admin atau database untuk halaman publik.

---

## Daftar Isi

1. [Ringkasan](#ringkasan)
2. [Teknologi](#teknologi)
3. [Struktur Proyek](#struktur-proyek)
4. [Halaman & URL](#halaman--url)
5. [Alur Kerja (Request)](#alur-kerja-request)
6. [Cara Menjalankan](#cara-menjalankan)
7. [Mengubah Konten](#mengubah-konten)
8. [Desain & Tema](#desain--tema)
9. [Komponen Blade](#komponen-blade)
10. [Fitur yang Sudah Ada](#fitur-yang-sudah-ada)
11. [Yang Belum Diimplementasi](#yang-belum-diimplementasi)
12. [Pengembangan Lanjutan](#pengembangan-lanjutan)
13. [Troubleshooting](#troubleshooting)

---

## Ringkasan

| Item | Keterangan |
|------|------------|
| Nama aplikasi | Pondok Pesantren Ikhlas |
| Tujuan | Memperkenalkan pesantren, program, berita, galeri, dan pendaftaran santri baru |
| Bahasa UI | Indonesia |
| Backend | Laravel (routing + controller + view) |
| Frontend | Tailwind CSS via Vite |
| Data konten | File `config/pondok.php` (bukan database) |

---

## Teknologi

| Lapisan | Paket / Tool |
|---------|----------------|
| PHP | 8.3+ (dengan `platform-check: false` di Composer) |
| Framework | Laravel 13 |
| Template | Blade |
| CSS | Tailwind CSS 4 (`@tailwindcss/vite`) |
| Bundler | Vite 8 |
| Font | Instrument Sans (via `laravel-vite-plugin` + Bunny Fonts) |

---

## Struktur Proyek

```
ikhlas/
├── app/Http/Controllers/
│   └── PageController.php      # Controller semua halaman publik
├── config/
│   └── pondok.php              # ⭐ Data utama website (nama, berita, program, dll.)
├── routes/
│   └── web.php                 # Definisi URL
├── resources/
│   ├── css/app.css             # Tema warna (forest, gold, cream)
│   ├── js/app.js               # Menu mobile
│   └── views/
│       ├── layouts/app.blade.php    # Layout induk (head, navbar, footer)
│       ├── components/              # Navbar, footer, page-header, ikon program
│       └── pages/                   # Isi tiap halaman
├── public/build/               # Asset hasil `npm run build`
└── DOKUMENTASI.md              # File ini
```

**File lama (bukan bagian website pondok):**

- `resources/views/welcome.blade.php` — halaman default Laravel
- `resources/views/home.blade.php` — template AdminLTE lama
- `resources/views/view.blade.php` — contoh controller `Coba`
- `app/Http/Controllers/Coba.php` — contoh percobaan

File-file di atas tidak dipakai oleh routing website pondok saat ini.

---

## Halaman & URL

| Halaman | URL | Route name | View |
|---------|-----|------------|------|
| Beranda | `/` | `home` | `pages/home.blade.php` |
| Profil | `/profil` | `profil` | `pages/profil.blade.php` |
| Program | `/program` | `program` | `pages/program.blade.php` |
| Berita | `/berita` | `berita` | `pages/berita.blade.php` |
| Galeri | `/galeri` | `galeri` | `pages/galeri.blade.php` |
| Kontak | `/kontak` | `kontak` | `pages/kontak.blade.php` |
| Pendaftaran | `/pendaftaran` | `pendaftaran` | `pages/pendaftaran.blade.php` |

**Contoh pemanggilan di Blade:**

```blade
<a href="{{ route('profil') }}">Profil</a>
{{ config('pondok.name') }}
```

---

## Alur Kerja (Request)

```
Browser meminta URL (mis. /profil)
        ↓
routes/web.php → PageController@profil
        ↓
return view('pages.profil')
        ↓
Layout layouts/app.blade.php
  ├── <x-navbar />
  ├── @yield('content')  ← isi pages/profil.blade.php
  └── <x-footer />
        ↓
HTML + CSS/JS dari Vite (public/build)
```

Semua method di `PageController` hanya mengembalikan view; tidak ada query database untuk halaman ini.

---

## Cara Menjalankan

### Persyaratan

- PHP 8.3+
- Composer
- Node.js & npm (untuk development asset)

### Instalasi pertama

```powershell
cd d:\pondok\ikhlas
composer install
copy .env.example .env
php artisan key:generate
npm install
npm run build
```

### Development

**Terminal 1 — server PHP:**

```powershell
php artisan serve
```

Buka: http://127.0.0.1:8000

**Terminal 2 — Vite (hot reload CSS/JS):**

```powershell
npm run dev
```

**Atau sekaligus:**

```powershell
composer dev
```

### Production

```powershell
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Deploy folder proyek ke hosting dengan document root mengarah ke `public/`.

### PHP 8.3 dan error platform

Jika muncul pesan *"require PHP >= 8.4"*, pastikan di `composer.json` ada:

```json
"config": {
    "platform-check": false
}
```

Lalu jalankan:

```powershell
composer dump-autoload
```

---

## Mengubah Konten

### 1. Data utama — `config/pondok.php`

Satu file untuk sebagian besar teks situs:

| Key | Isi |
|-----|-----|
| `name` | Nama pondok |
| `tagline` | Slogan |
| `description` | Deskripsi singkat |
| `founded` | Tahun berdiri |
| `address`, `phone`, `email` | Kontak |
| `whatsapp` | Nomor WA tanpa `+` (contoh: `6281234567890`) |
| `social` | Link Instagram, YouTube, Facebook |
| `stats` | Angka di beranda (santri, ustadz, dll.) |
| `programs` | Daftar program (`title`, `description`, `icon`) |
| `news` | Berita (`title`, `date`, `excerpt`, `category`) |
| `leaders` | Pengurus (`name`, `role`, `bio`) |

**Icon program** (`icon`): `quran`, `school`, `language`, atau `heart` (default).

Setelah mengubah config:

```powershell
php artisan config:clear
```

### 2. Judul halaman

Di setiap file `resources/views/pages/*.blade.php`:

```blade
@section('title', 'Profil — ' . config('pondok.name'))
```

### 3. Teks khusus satu halaman

Edit langsung file Blade di `resources/views/pages/`, misalnya paragraf sejarah di `profil.blade.php`.

### 4. Galeri foto asli

1. Simpan gambar di `public/images/galeri/` (buat folder jika belum ada).
2. Ubah `resources/views/pages/galeri.blade.php` — ganti placeholder gradient dengan tag `<img>`:

```blade
<img src="{{ asset('images/galeri/kegiatan-tahfidz.jpg') }}" alt="Kegiatan Tahfidz" class="h-full w-full object-cover">
```

### 5. Nama aplikasi di `.env`

```env
APP_NAME="Pondok Pesantren Ikhlas"
```

---

## Desain & Tema

Warna didefinisikan di `resources/css/app.css`:

| Token Tailwind | Peran |
|----------------|-------|
| `cream` | Background halaman |
| `forest-*` | Hijau utama (header, teks, tombol) |
| `gold-*` | Aksen emas (CTA, highlight) |

Font: **Instrument Sans** (Latin); class `.font-arabic` untuk teks Arab.

Build ulang setelah ubah CSS:

```powershell
npm run build
```

atau `npm run dev` saat development.

---

## Komponen Blade

| Komponen | File | Fungsi |
|----------|------|--------|
| `<x-navbar />` | `components/navbar.blade.php` | Menu atas + mobile |
| `<x-footer />` | `components/footer.blade.php` | Footer & kontak |
| `<x-page-header />` | `components/page-header.blade.php` | Judul halaman dalam (bukan beranda) |
| `<x-program-icon />` | `components/program-icon.blade.php` | SVG ikon program |

**Page header:**

```blade
<x-page-header
    title="Profil Pesantren"
    subtitle="Deskripsi singkat"
    breadcrumb="Profil"
/>
```

---

## Fitur yang Sudah Ada

- Navigasi responsif dengan menu mobile (`resources/js/app.js`)
- Highlight menu aktif berdasarkan route saat ini
- Tombol WhatsApp mengambang di semua halaman
- Section beranda: hero, statistik, tentang, program, berita, CTA
- Halaman profil: sejarah, visi-misi, pengurus
- Form kontak & pendaftaran (tampilan UI)
- Tema hijau-emas khas pesantren
- SEO dasar: `<meta description>`, `<title>` per halaman

---

## Yang Belum Diimplementasi

| Fitur | Status |
|-------|--------|
| Simpan form kontak ke database/email | Demo saja (`action="#"`) |
| Simpan form pendaftaran | Demo saja |
| Panel admin / CMS | Belum ada |
| Berita per slug / halaman detail | Hanya daftar kartu |
| Autentikasi (login admin) | Tidak dipakai |
| Upload galeri dinamis | Placeholder gradient |

---

## Pengembangan Lanjutan

Urutan yang disarankan jika ingin melanjutkan:

1. **Model & migration** — tabel `berita`, `pendaftaran`, `pesan_kontak`
2. **Form request** — validasi form pendaftaran & kontak
3. **Controller method POST** — simpan data + notifikasi email
4. **Filament / admin custom** — kelola berita & galeri
5. **Storage** — upload foto galeri ke `storage/app/public`

Contoh route form (nanti):

```php
Route::post('/kontak', [PageController::class, 'kirimKontak'])->name('kontak.kirim');
Route::post('/pendaftaran', [PageController::class, 'daftar'])->name('pendaftaran.kirim');
```

---

## Troubleshooting

| Masalah | Solusi |
|---------|--------|
| Halaman tanpa CSS | Jalankan `npm run build` atau `npm run dev` |
| `Vite manifest not found` | Pastikan ada `public/build/manifest.json` |
| Error PHP 8.4 | `platform-check: false` + `composer dump-autoload` |
| Perubahan `config/pondok.php` tidak muncul | `php artisan config:clear` |
| Route 404 | `php artisan route:list` — pastikan `web.php` ter-load |

---

## Kontak Pengembangan

Untuk menyesuaikan branding, konten, atau menambah fitur backend, fokuskan perubahan pada:

1. `config/pondok.php` — data
2. `resources/views/pages/` — tampilan
3. `app/Http/Controllers/PageController.php` — logika baru

---

*Terakhir diperbarui: Mei 2026*
