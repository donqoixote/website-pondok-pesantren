<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\KaryaSantri;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $newsItems = [
            [
                'title' => 'Penerimaan Santri Baru Tahun Ajaran 2026/2027 Dibuka',
                'excerpt' => 'Pendaftaran dibuka untuk jenjang MTs dan MA. Kuota terbatas, segera daftarkan putra-putri Anda.',
                'category' => 'Pengumuman',
            ],
            [
                'title' => 'Santri Raih Juara 1 Lomba Tahfidz Tingkat Kabupaten',
                'excerpt' => 'Alhamdulillah, santri kami Muhammad Fadli meraih juara umum lomba tahfidz 5 juz.',
                'category' => 'Prestasi',
            ],
            [
                'title' => 'Kegiatan Bakti Sosial di Desa Binaan',
                'excerpt' => 'Santri dan pengurus pesantren menggelar bakti sosial berupa pengobatan gratis dan pembagian sembako.',
                'category' => 'Kegiatan',
            ],
        ];

        foreach ($newsItems as $item) {
            News::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'title' => $item['title'],
                    'content' => $item['excerpt']."\n\nIni adalah contoh isi berita lengkap dari ".$item['title'].'. Santri Pondok Pesantren Al-Ikhlas berpartisipasi aktif dalam kegiatan ini dengan semangat tinggi.',
                    'excerpt' => $item['excerpt'],
                    'category' => $item['category'],
                    'is_published' => true,
                    'published_at' => now(),
                ]
            );
        }

        $galleries = [
            ['title' => 'Kegiatan Tahfidz', 'description' => 'Dokumentasi hafalan santri'],
            ['title' => 'Sholat Berjamaah', 'description' => 'Ibadah wajib berjamaah di masjid'],
            ['title' => 'Ekstrakurikuler', 'description' => 'Pengembangan minat bakat santri'],
            ['title' => 'Pramuka Santri', 'description' => 'Latihan kepramukaan mingguan'],
            ['title' => 'Kajian Kitab', 'description' => 'Kajian kitab kuning klasik'],
            ['title' => 'Halal Bihalal', 'description' => 'Kegiatan silaturahmi tahunan'],
            ['title' => 'Olahraga Santri', 'description' => 'Futsal, bulutangkis, dan senam pagi'],
            ['title' => 'Wisuda Hafidz', 'description' => 'Kelulusan santri tahfidz 30 juz'],
            ['title' => 'Bakti Sosial', 'description' => 'Pengabdian masyarakat santri'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::firstOrCreate(
                ['title' => $gallery['title']],
                [
                    'image_path' => '',
                    'description' => $gallery['description'],
                ]
            );
        }

        $karya = [
            [
                'title' => 'Cahaya di Ujung Fajar',
                'author' => 'Muhammad Zaky',
                'class' => 'XI MA',
                'category' => 'Puisi',
                'content' => '<p>Dinginnya malam mulai menghilang,<br>Fajar menyapa dengan cahaya tenang.<br>Di sini kami bersimpuh bersujud,<br>Mencari ridho-Mu yang mewujud.<br><br>Lembaran suci kami lantunkan,<br>Menghias jiwa dari kegelapan.<br>Wahai santri pejuang Al-Qur\'an,<br>Tetaplah teguh di jalan iman.</p>',
                'image_path' => null,
                'is_approved' => true,
            ],
            [
                'title' => 'Mimpi Sang Penghafal Al-Qur\'an',
                'author' => 'Aisyah Humaira',
                'class' => 'VIII MTs',
                'category' => 'Cerpen',
                'content' => '<p>Aisyah terbangun di sepertiga malam terakhir. Suara gemerisik daun jati di sekitar kompleks pesantren terdengar pelan tertiup angin. Baginya, setiap malam adalah perjuangan untuk menuntun hafalan baru.</p>',
                'image_path' => null,
                'is_approved' => true,
            ],
            [
                'title' => 'Lukisan Kaligrafi Surah Luqman Ayat 12',
                'author' => 'Fahri Husein',
                'class' => 'XII MA',
                'category' => 'Kaligrafi',
                'content' => '<p>Karya seni lukis kaligrafi menggunakan media kanvas dan cat akrilik yang menggambarkan keindahan kalimat tauhid dan nasihat Luqman Al-Hakim.</p>',
                'image_path' => null,
                'is_approved' => true,
            ],
        ];

        foreach ($karya as $item) {
            KaryaSantri::firstOrCreate(['title' => $item['title']], $item);
        }
    }
}
