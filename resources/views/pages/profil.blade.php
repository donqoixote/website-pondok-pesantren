@extends('layouts.app')

@section('title', 'Profil — ' . config('pondok.name'))

@section('content')
    <x-page-header title="Profil Pesantren" subtitle="Mengenal lebih dekat sejarah, visi, dan pengurus Pondok Pesantren Ikhlas" breadcrumb="Profil" />

    <section class="py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-2">
                <div>
                    <h2 class="text-2xl font-bold text-forest-800">Sejarah Berdiri</h2>
                    <p class="mt-4 leading-relaxed text-forest-600">
                        Berdirinya pondok pesantren putra putri Al-Ikhlas Bahrul Ulum Tambakberas Jombang merupakan salah satu bentuk perhatian para pengasuh pesantren bahrul ulum khusunya KH. M.Djamaluddin Achmad beserta keluarga. Pondok yang berdiri tahun 1998 dan berjalan fungsi kegiatannya pada tahun 1999 yang diamanatkan pada menantu dan putri beliau, Agus H.Hasyim Yusuf dan Hj. Lathifah Hidayati. pada awalnya bertujuan untuk memberikan pendidikan baik Al-Qur'an, Keagamaan serta seni Hadroh pada Masyarakat sekitar pesantren. tidak seperti pada umumnya pesantren yang mana santrinya menetap, santri pondok pesantren putra-putri Al - Ikhlas Bahrul Ulum Tambakberas Jombang pada awalnya hanya nglowo (malam di pondok dan pagi pulang kerumah masing-masing). Namun seiring berjalannya waktu semakin bertambah keprcayaan dan animo luar kota maupun luar jawa. Maka beliau KH. Djamaluddin Achmad memberikan izin kepada menantu dan putrinya untuk menerima santri-santri yang berkeinginan untuk tinggal di pesantren. pesantren yang berdiri sejak 1999 selalu berusaha meningkatkan  dan menumbuhkembangkan pendidikan pesantren dengan pendidikan ilmu-ilmu Al-Qur'an dan pendidikan salaf Ahlussunnah agar terbentuk santri yang berakhlakul karimah, berilmu dan terampil.
                    </p>

                </div>
                <div class="rounded-2xl bg-forest-50 p-8 ring-1 ring-forest-100">
                    <h3 class="text-lg font-semibold text-forest-800">Visi</h3>
                    <p class="mt-2 text-forest-600">Mencetak generasi qur’ani dan salafi yang berwawasan Al-qur’an dan kitab kitab ahlussunnah wal jama’ah yang berakhlaqul karimah</p>
                    <h3 class="mt-8 text-lg font-semibold text-forest-800">Misi</h3>
                    <ul class="mt-3 space-y-2 text-forest-600">
                        <li class="flex gap-2"><span class="text-gold-500">✦</span> Mencetak santri agar hafal Al-Qur’an dan bisa memahami dan mengamalkan kitab kitab salaf.</li>
                        <li class="flex gap-2"><span class="text-gold-500">✦</span> Menyelenggarakan pendidikan dengan kurikulum pesantren yang berwawasan Al-Qur’an dan kitab salaf/kitab kuning .</li>
                        <li class="flex gap-2"><span class="text-gold-500">✦</span> Membimbing santri membaca Al-Qur’an dengan baik dan benar, baik secara binnadzri dan bil ghoib.</li>
                        <li class="flex gap-2"><span class="text-gold-500">✦</span> Memberikan pendidikan agama kepada santri melalui madrasah diniyyah dan madrasah Al-Qur’an</li>
                        <li class="flex gap-2"><span class="text-gold-500">✦</span> Membina santri untuk berbudi luhur dalam kehidupan sehari hari..</li>
                        <li class="flex gap-2"><span class="text-gold-500">✦</span> Mempersiapkan santri yang mandiri dan mampu menginternalisasi nilai nilai islam dalam kehidupan sehari hari dalam masyarakat.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-forest-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-2xl font-bold text-forest-800">Pengurus & Pengasuh</h2>
            <p class="mx-auto mt-2 max-w-xl text-center text-forest-600">Dipimpin oleh para ulama dan pendidik berpengalaman</p>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach (config('pondok.leaders') as $leader)
                    <article class="rounded-2xl bg-white p-6 text-center shadow-sm ring-1 ring-forest-100">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-forest-700 text-2xl font-bold text-gold-300">
                            {{ substr($leader['name'], 0, 1) }}
                        </div>
                        <h3 class="mt-4 font-semibold text-forest-800">{{ $leader['name'] }}</h3>
                        <p class="text-sm font-medium text-gold-600">{{ $leader['role'] }}</p>
                        <p class="mt-2 text-sm text-forest-600">{{ $leader['bio'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
