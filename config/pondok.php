<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Konten Statis (config/pondok.php)
    |--------------------------------------------------------------------------
    | Profil, program, statistik, dan pengurus diatur di file ini.
    | Berita, galeri, form, dan karya santri dikelola via database + /admin
    |--------------------------------------------------------------------------
    */

    'name' => 'Pondok Pesantren Al-Ikhlas Bahrul Ulum Tambakberas Jombang',
    'tagline' => 'Membentuk Generasi Qur\'ani yang Berakhlak Mulia',
    'description' => 'Pondok Pesantren Ikhlas adalah lembaga pendidikan Islam yang mengintegrasikan tahfidz Al-Qur\'an, pendidikan formal, dan pembinaan karakter santri.',
    'founded' => '1998',
    'address' => 'Pondok pesantren putra putri Al-Ikhlas Bahrul Ulum Tambakberas Jombang berada di lingkungan yayasan pondok pesantren bahrul ulum tambakberas Jombang. Berada di sebelah barat MTsN 3 Jombang. Jl. KH. Abdul Wahab Chasbulloh Gg 3 Tambakberas Timur Jombang Jawa Timur (61451).',
    'phone' => '0813-3510-2722',
    'email' => 'alikhlasbahrululum313@gmail.com',
    'whatsapp' => '6281335102722',
    'social' => [
        'instagram' => 'https://www.instagram.com/alikhlasbahrululum/',
        'youtube' => 'https://www.youtube.com/@alikhlasbahrululum',
        'facebook' => 'https://www.facebook.com/alikhlasbahrululum/',
        'tiktok' => 'https://www.tiktok.com/@alikhlasbahrululum/',
    ],
    'stats' => [
        ['label' => 'Santri Aktif', 'value' => '450+'],
        ['label' => 'Ustadz & Ustadzah', 'value' => '35'],
        ['label' => 'Tahun Berdiri', 'value' => '27'],
        ['label' => 'Hafidz Lulusan', 'value' => '120+'],
    ],
    'programs' => [
        [
            'title' => 'Taman Pendidikan Al-Qur\'an',
            'description' => 'Lembaga pendidikan Al-Qur\'an khusus bagi anak-anak usia dini (PAUD s/d MI) serta wadah pengabdian mengajar bagi santri senior.',
            'icon' => 'school',
        ],
        [
            'title' => 'Madrasah Al-Qur\'an',
            'description' => 'Program unggulan tahfidz (setoran bil ghoib 30 juz & murojaah terstruktur) dan bimbingan membaca Al-Qur\'an binnadhar.',
            'icon' => 'quran',
        ],
        [
            'title' => 'Madrasah Diniyyah',
            'description' => 'Pembelajaran bidang keagamaan mendalam untuk membekali santri di era globalisasi dengan dasar akhlak, iman, dan takwa.',
            'icon' => 'language',
        ],
        [
            'title' => 'Sorogan & Pengajian Wethon',
            'description' => 'Pengkajian kitab kuning klasik (Tafsir Jalalain, Hadist, Akhlak, Tasawwuf) yang diampu langsung oleh KH. Hasyim Yusuf.',
            'icon' => 'heart',
        ],
    ],
    'leaders' => [
        ['name' => 'KH. Hasyim Yusuf.', 'role' => 'Pengasuh & Pendiri', 'bio' => 'Alumni LIPIA Jakarta, berkhidmah di pesantren sejak 1995.'],
        ['name' => 'Ust. Muhammad Ridho, S.Pd.', 'role' => 'Direktur Pendidikan', 'bio' => 'Praktisi pendidikan Islam terpadu dan kurikulum nasional.'],
        ['name' => 'Ustadzah Fatimah Zahra, S.Ag.', 'role' => 'Wakil Bidang Tahfidz', 'bio' => 'Hafidzah 30 juz, pengajar metode tilawah modern.'],
    ],
];
