<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryaSantriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::controller(StaticPageController::class)->group(function () {
    Route::get('/profil', 'profil')->name('profil');
    Route::get('/program', 'program')->name('program');
});

Route::controller(NewsController::class)->group(function () {
    Route::get('/berita', 'index')->name('berita');
    Route::get('/berita/{berita:slug}', 'show')->name('berita.show');
});

Route::get('/galeri', GalleryController::class)->name('galeri');
Route::get('/galeri/{gallery}', [GalleryController::class, 'show'])->name('galeri.show');

Route::controller(ContactController::class)->group(function () {
    Route::get('/kontak', 'index')->name('kontak');
    Route::post('/kontak', 'store')->middleware('throttle:5,1')->name('kontak.kirim');
});

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/pendaftaran', 'index')->name('pendaftaran');
    Route::post('/pendaftaran', 'store')->middleware('throttle:3,1')->name('pendaftaran.kirim');
    Route::get('/pendaftaran/status', 'status')->name('pendaftaran.status');
});

Route::controller(KaryaSantriController::class)->prefix('karya-santri')->group(function () {
    Route::get('/', 'index')->name('karya');
    Route::get('/tulis', 'create')->name('karya.tulis');
    Route::post('/tulis', 'store')->middleware('throttle:3,1')->name('karya.kirim');
});
