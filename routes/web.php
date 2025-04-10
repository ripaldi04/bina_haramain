<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.user.home')->with('success', 'Selamat datang di halaman beranda!');
})->name('home');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route untuk menampilkan notice verifikasi
Route::get('/email/verify', function () {
    return view('auth.verify_email'); // kamu harus buat view ini
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    if (! $user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
    }

    Auth::logout(); // << Ini penting agar user keluar dari sesi

    return redirect()->route('login.form')->with('success', 'Email kamu berhasil diverifikasi! Silakan login.');
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    if (Auth::check() && !$request->user()->hasVerifiedEmail()) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Link verifikasi baru telah dikirim ke email kamu.');
    }

    return redirect('/login');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

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

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');