@extends('layouts.app')

@section('title', 'Program — ' . config('pondok.name'))

@section('content')
    <x-page-header 
        title="Program Pendidikan & Kegiatan" 
        subtitle="Pondok Pesantren Putra Putri Al–Ikhlas Bahrul ‘Ulum Tambakberas Jombang merupakan salah satu lembaga di bawah naungan Pondok Pesantren Bahrul 'Ulum yang berciri khas pada pendidikan Al-Qur'an. Selain itu, kami menyelenggarakan pengajaran kitab kuning klasik (pengajian weton) karya ulama salaf dan khalaf berfaham Ahlussunnah wal Jama'ah serta berbagai kegiatan ekstrakurikuler penunjang minat & bakat santri." 
        breadcrumb="Program" 
    />

    {{-- Program Utama --}}
    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Lembaga Pendidikan</span>
                <h2 class="mt-2 text-3xl font-bold text-forest-800">Program Utama & Ciri Khas</h2>
                <p class="mt-4 text-forest-600 max-w-2xl mx-auto">Untuk memenuhi kebutuhan umat, Pondok Pesantren Al-Ikhlas mengintegrasikan pengajaran Al-Qur'an secara mendalam dengan kajian kitab salaf.</p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- TPQ --}}
                <article class="flex flex-col rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-forest-100 text-forest-700 mb-6">
                        <x-program-icon icon="school" class="h-6 w-6" />
                    </div>
                    <h3 class="text-xl font-bold text-forest-800">Taman Pendidikan Al-Qur'an (TPQ)</h3>
                    <p class="mt-3 text-sm leading-relaxed text-forest-600 flex-grow">
                        Cikal bakal lembaga pendidikan pertama di pesantren ini. Dikhususkan bagi anak-anak usia dini (PAUD s/d MI) di sekitar pesantren, sekaligus menjadi wadah praktik pengabdian mengajar dan mengelola lembaga bagi para santri senior.
                    </p>
                </article>

                {{-- Tahfidz Al-Qur'an --}}
                <article class="flex flex-col rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-forest-100 text-forest-700 mb-6">
                        <x-program-icon icon="quran" class="h-6 w-6" />
                    </div>
                    <h3 class="text-xl font-bold text-forest-800">Madrasah Al-Qur'an</h3>
                    <p class="mt-3 text-sm leading-relaxed text-forest-600 flex-grow">
                        Fokus utama pesantren dalam bimbingan membaca Al-Qur'an baik secara <strong>Bin-Nadhar</strong> (membaca mushaf klasikal) maupun <strong>Bil-Ghaib</strong> (menghafal 30 juz) secara terstruktur melalui metode mushafahah/simakan langsung.
                    </p>
                </article>

                {{-- Madrasah Diniyyah --}}
                <article class="flex flex-col rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100 transition hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-forest-100 text-forest-700 mb-6">
                        <x-program-icon icon="language" class="h-6 w-6" />
                    </div>
                    <h3 class="text-xl font-bold text-forest-800">Madrasah Diniyyah</h3>
                    <p class="mt-3 text-sm leading-relaxed text-forest-600 flex-grow">
                        Menunjang materi keagamaan sekolah formal dan membekali santri di era globalisasi dengan pembelajaran bidang tauhid, fiqih, nahwu, sharaf, sejarah Islam, dan akhlak demi mencetak santri yang seimbang secara IMTAK dan IPTEK.
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- Sistem Ujian & Kurikulum Al-Qur'an --}}
    <section class="bg-forest-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Kurikulum Al-Qur'an</span>
                    <h2 class="mt-2 text-3xl font-bold text-forest-800">Metode & Sistem Ujian Tahfidz</h2>
                    <p class="mt-4 leading-relaxed text-forest-600">
                        Kami menerapkan metode setoran hafalan secara <strong>Mushofahah</strong> kepada <strong>KH. Hasyim Yusuf</strong> dan <strong>Ibu Nyai Hj. Lathifah Hidayaty</strong>, di mana santri membaca bil-ghaib dan pengasuh menyimak secara langsung.
                    </p>
                    
                    <div class="mt-6 space-y-4 text-sm text-forest-700">
                        <div class="flex gap-3">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gold-100 text-gold-700 text-xs font-semibold">1</span>
                            <div>
                                <strong>Setoran Bil-Ghaib & Murojaah</strong>
                                <p class="text-forest-600 mt-1">Mengulang kembali hafalan secara disiplin dengan santri tahfidz senior sebelum disetorkan ke pengasuh.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gold-100 text-gold-700 text-xs font-semibold">2</span>
                            <div>
                                <strong>Materi Keilmuan Penunjang</strong>
                                <p class="text-forest-600 mt-1">Pembekalan Makhorijul & Sifatul Huruf, Tajwid, Gharib, Musykilat Al-Qur'an, dan Ilmu Tafsir bagi yang telah khatam.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Langkah Ujian --}}
                <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-forest-100">
                    <h3 class="text-lg font-semibold text-forest-800 mb-6">Tahapan Ujian Tahfidz Berkala</h3>
                    <p class="text-xs text-forest-500 mb-4">*Ujian dilaksanakan 2 kali setahun (November & April) pada kelipatan 5 Juz:</p>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            'Tahap 1' => '5 Juz',
                            'Tahap 2' => '10 Juz',
                            'Tahap 3' => '15 Juz',
                            'Tahap 4' => '20 Juz',
                            'Tahap 5' => '25 Juz',
                            'Tahap 6' => '30 Juz'
                        ] as $tahap => $juz)
                            <div class="rounded-xl border border-forest-100 bg-forest-50/50 px-4 py-3 flex justify-between items-center">
                                <span class="text-xs font-medium text-forest-500">{{ $tahap }}</span>
                                <span class="text-sm font-bold text-forest-700">{{ $juz }}</span>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-4 text-xs text-forest-500 italic">Bagi santri yang belum mencapai kelipatan 5 juz, ujian tetap dilakukan secara berkala sedapatnya.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Pengajian Wethon & Sorogan --}}
    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Kajian Kitab Kuning</span>
                <h2 class="mt-2 text-3xl font-bold text-forest-800">Sorogan & Pengajian Wethon</h2>
                <p class="mt-4 text-forest-600 max-w-2xl mx-auto">Membentuk santri berfaham Ahlussunnah wal Jama'ah melalui pembacaan kitab salaf klasik secara teliti.</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-3">
                {{-- Sorogan --}}
                <div class="rounded-2xl border border-forest-100 p-6 bg-white">
                    <h3 class="text-lg font-bold text-forest-800 mb-2 border-b border-forest-100 pb-3 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-gold-500"></span>
                        Program Sorogan
                    </h3>
                    <p class="text-sm text-forest-600 mb-4">Metode membaca individual di mana santri membaca dan disimak langsung oleh asatidz/ustadzah senior.</p>
                    <ul class="text-xs space-y-2 text-forest-700">
                        <li class="flex gap-2">✔ <strong class="text-forest-800">Sorogan Al-Qur'an:</strong> Setoran juz 1 s/d 30 secara bertahap.</li>
                        <li class="flex gap-2">✔ <strong class="text-forest-800">Sorogan Kitab Gundul:</strong> Bimbingan khusus pemula membaca kitab kuning tanpa harakat.</li>
                    </ul>
                </div>

                {{-- Wethon Shubuh --}}
                <div class="rounded-2xl border border-forest-100 p-6 bg-white">
                    <h3 class="text-lg font-bold text-forest-800 mb-2 border-b border-forest-100 pb-3 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-gold-500"></span>
                        Wethon Ba'da Shubuh
                    </h3>
                    <p class="text-sm text-forest-600 mb-4">Pengajian massal (wetonan/bandongan) yang diikuti oleh seluruh santri putra dan putri, diampu langsung oleh pengasuh.</p>
                    <div class="rounded-lg bg-forest-50 p-3 text-xs text-forest-700">
                        <span class="font-semibold block text-forest-800 mb-1">Kitab Utama yang Dikaji:</span>
                        <ul class="space-y-1">
                            <li>• Kitab Tafsir Jalalain</li>
                            <li>• Kitab Hadist Pilihan</li>
                        </ul>
                    </div>
                </div>

                {{-- Wethon Sore --}}
                <div class="rounded-2xl border border-forest-100 p-6 bg-white">
                    <h3 class="text-lg font-bold text-forest-800 mb-2 border-b border-forest-100 pb-3 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-gold-500"></span>
                        Wethon Sore
                    </h3>
                    <p class="text-sm text-forest-600 mb-4">Pengajian kitab kuning secara berkala setiap sore hari selepas jamaah sholat ashar berjamaah.</p>
                    <div class="rounded-lg bg-forest-50 p-3 text-xs text-forest-700">
                        <span class="font-semibold block text-forest-800 mb-1">Kajian Kitab Akhlaq & Tasawwuf:</span>
                        <ul class="space-y-1">
                            <li>• Tanbihul Ghafilin & Adabul 'Alim (Akhlaq)</li>
                            <li>• Al-Hikam (Tasawwuf)</li>
                            <li>• Kitab Faroidl (Warisan) & Fiqih Salaf</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Kegiatan Harian & Mingguan --}}
    <section class="bg-forest-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Aktivitas & Rutinitas</span>
                <h2 class="mt-2 text-3xl font-bold text-forest-800">Agenda Kegiatan Santri</h2>
                <p class="mt-4 text-forest-600 max-w-2xl mx-auto">Kedisiplinan waktu adalah kunci keberhasilan belajar. Berikut jadwal harian dan mingguan santri Al-Ikhlas.</p>
            </div>

            <div class="grid gap-10 lg:grid-cols-2">
                {{-- Jadwal Harian --}}
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100">
                    <h3 class="text-xl font-bold text-forest-800 mb-6 pb-2 border-b border-forest-50 flex items-center gap-2">
                        📅 Jadwal Rutinitas Harian
                    </h3>
                    <div class="max-h-[480px] overflow-y-auto pr-2 space-y-3">
                        @foreach([
                            '03.15 – 04.15' => 'Qiyamul Lail (Tahajjud & Zikir)',
                            '04.15 – 04.45' => 'Jama’ah Sholat Shubuh',
                            '05.00 – 05.15' => 'Pembacaan Juz ‘Amma Bersama',
                            '05.15 – 05.30' => 'Pengajian Wethon Shubuh (Bersama Pengasuh)',
                            '07.00 – 13.30' => 'Sekolah Formal (MI / MTs / MA di Bahrul Ulum)',
                            '15.00 – 15.30' => 'Jama’ah Sholat Ashar',
                            '15.30 – 16.30' => 'Pengajian Wethon Sore',
                            '17.30 – 18.00' => 'Jama’ah Sholat Maghrib',
                            '18.00 – 19.00' => 'Pengajian Al-Qur’an (Setoran/Sorogan)',
                            '19.15 – 20.15' => 'Pendidikan Madrasah Diniyyah',
                            '20.20 – 20.45' => 'Jama’ah Sholat Isya’',
                            '20.45 – 21.00' => 'Lalaran / Setoran Nadzoman',
                            '21.00 – 21.30' => 'Takror / Wajib Belajar Mandiri',
                            '22.00 – 04.00' => 'Istirahat / Istirahat Malam'
                        ] as $waktu => $kegiatan)
                            <div class="flex justify-between items-start gap-4 py-2 border-b border-dashed border-forest-50 text-sm">
                                <span class="font-mono text-gold-600 font-bold shrink-0">{{ $waktu }}</span>
                                <span class="text-forest-700 text-right">{{ $kegiatan }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Jadwal Mingguan & Tahunan --}}
                <div class="space-y-6">
                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100">
                        <h3 class="text-lg font-bold text-forest-800 mb-4 flex items-center gap-2">
                            🔁 Agenda Mingguan
                        </h3>
                        <div class="space-y-3 text-sm text-forest-600">
                            <p class="flex gap-2">🌟 <strong class="text-forest-800">Malam Jum'at:</strong> Pembacaan Diba'iyah, Muhadloroh (pidato), Istighosah, dan Tahlil.</p>
                            <p class="flex gap-2">🧹 <strong class="text-forest-800">Hari Jum'at:</strong> Ro'an / kerja bakti membersihkan lingkungan pondok.</p>
                            <p class="flex gap-2">🎨 <strong class="text-forest-800">Malam Selasa & Kamis:</strong> Latihan ekstrakurikuler santri.</p>
                            <p class="flex gap-2">📚 <strong class="text-forest-800">2 Minggu Sekali:</strong> Taftisyul Kutub (pemeriksaan kelengkapan kitab) & Ziarah Maqom Masyayikh Bahrul 'Ulum disertai khataman Al-Qur'an.</p>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-forest-100">
                        <h3 class="text-lg font-bold text-forest-800 mb-4 flex items-center gap-2">
                            🏆 Agenda Tahunan & Berkala
                        </h3>
                        <div class="grid grid-cols-2 gap-3 text-xs text-forest-700">
                            <div class="bg-forest-50 p-3 rounded-lg">Peringatan Hari Besar Islam (PHBI)</div>
                            <div class="bg-forest-50 p-3 rounded-lg">Haflah Akhirussanah (Haflah/Kelulusan)</div>
                            <div class="bg-forest-50 p-3 rounded-lg">Gema Muharroman</div>
                            <div class="bg-forest-50 p-3 rounded-lg">Rihlah Ilmiah (Studi Banding/Wisata)</div>
                            <div class="bg-forest-50 p-3 rounded-lg col-span-2 text-center font-bold bg-gold-100 text-gold-800">Wisuda Khotmil Al-Qur'an</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Ekstrakurikuler --}}
    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-sm font-semibold uppercase tracking-wider text-gold-600">Pengembangan Diri</span>
                <h2 class="mt-2 text-3xl font-bold text-forest-800">Kegiatan Ekstrakurikuler</h2>
                <p class="mt-4 text-forest-600 max-w-2xl mx-auto">Menggali dan mengasah minat, bakat, serta kreativitas santri sebagai bekal keterampilan di masa depan.</p>
            </div>

            <div class="grid gap-6 grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
                @foreach([
                    'Qiro’ah' => 'Melatih seni vokal membaca ayat suci Al-Qur\'an dengan keindahan lagu (tilawah).',
                    'Khitobah' => 'Latihan pidato 3 bahasa untuk membekali mental dakwah dan kepemimpinan.',
                    'Kaligrafi' => 'Seni menulis indah huruf hijaiyah dengan berbagai gaya khot klasik.',
                    'Baca Kitab Kuning' => 'Metode bimbingan khusus melancarkan bacaan kitab klasik gundul.',
                    'Mading Santri' => 'Media komunikasi kreatif santri dalam bentuk tulisan, puisi, dan seni lukis.',
                    'Jurnalistik' => 'Pelatihan kepenulisan berita, fotografi, dan pengelolaan media sosial.',
                    'Seni Banjari' => 'Pelatihan rebana hadrah klasik sebagai sarana syiar sholawat nabi.'
                ] as $excul => $desc)
                    <div class="rounded-xl border border-forest-100 p-5 bg-white transition hover:shadow-md hover:ring-1 hover:ring-gold-300">
                        <h4 class="font-bold text-forest-800 border-b border-forest-50 pb-2 mb-2 text-sm">{{ $excul }}</h4>
                        <p class="text-xs text-forest-500 leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
                <div class="rounded-xl bg-gradient-to-br from-forest-800 to-forest-750 p-5 text-white flex flex-col justify-center items-center text-center">
                    <span class="text-2xl mb-1">✨</span>
                    <h4 class="font-bold text-gold-300 text-sm">Dan Lainnya</h4>
                    <p class="text-[10px] text-forest-200 mt-1">Disesuaikan dengan minat bakat baru santri</p>
                </div>
            </div>
        </div>
    </section>
@endsection

