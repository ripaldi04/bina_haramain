<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.home');
})->name('home');

Route::get('/register', function () {
    return view('pages.user.register');
})->name('register');

Route::get('/login', function () {
    return view('pages.user.login');
})->name('login');

Route::get('/haji', function () {
    return view('pages.user.layanan_haji');
})->name('layanan_haji');

Route::get('/haji/detail-bintang-tiga', function () {
    return view('pages.user.detailb3_layanan_haji');
})->name('detailb3_layanan_haji');

Route::get('/haji/detail-bintang-lima', function () {
    return view('pages.user.detailb5_layanan_haji');
})->name('detailb5_layanan_haji');

Route::get('/umrah', function () {
    return view('pages.user.layanan_umrah');
})->name('layanan_umrah');

Route::get('/hubungi-kami', function () {
    return view('pages.user.hubungi_kami');
})->name('hubungi_kami');

Route::get('/riwayat', function () {
    return view('pages.user.riwayat');
})->name('riwayat');
