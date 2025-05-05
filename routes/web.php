<?php

use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\Highlight1Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotDealController;
use App\Http\Controllers\LandingFasilitasController;
use App\Http\Controllers\LandingGaleriController;
use App\Http\Controllers\LandingKeunggulanController;
use App\Http\Controllers\OrderPaketController;
use App\Http\Controllers\TipeKamarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminLandingPageController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserPaketController;


// Route untuk halaman pertama (form pemesanan)
// Route::post('/pesan-paket', [OrderPaketController::class, 'prosesPesan'])->name('prosesPesan');


Route::get('/pesanan-sukses', [OrderPaketController::class, 'pesananSukses'])->name('pesananSukses');

Route::post('/proses-pesan', [OrderPaketController::class, 'prosesPesan'])->name('prosesPesan');


// Route untuk menampilkan halaman transaksi setelah pemesanan dilakukan
Route::get('/transaksi/{order_id}', [OrderPaketController::class, 'showTransaksiForm'])->name('order.transaksi');

// Route untuk mengolah data transaksi dan update ke database
Route::post('/transaksi/{order_id}', [OrderPaketController::class, 'prosesTransaksi'])->name('prosesTransaksi');

// Route::get('/transaksi', [OrderPaketController::class, 'create'])->name('transaksi');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/admin/questions', [AdminQuestionController::class, 'index'])->name('questions.index');
Route::post('/admin/questions', [AdminQuestionController::class, 'store'])->name('questions.store');
Route::put('/admin/questions/{id}', [AdminQuestionController::class, 'update'])->name('questions.update');
Route::delete('/admin/questions/{id}', [AdminQuestionController::class, 'destroy'])->name('questions.destroy');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route untuk menampilkan notice verifikasi
Route::get('/email/verify', function () {
    return view('auth.verify_email'); // kamu harus buat view ini
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $user = User::findOrFail($id);

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    if (!$user->hasVerifiedEmail()) {
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

Route::get('/admin/galeri/{id}/edit', [LandingGaleriController::class, 'edit'])->name('admin.galeri.edit');
Route::put('/admin/galeri/{id}', [LandingGaleriController::class, 'update'])->name('admin.galeri.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/haji', [UserPaketController::class, 'index'])->name('layanan_haji');
Route::get('/umrah', [UserPaketController::class, 'store'])->name('layanan_umrah');



// Route::get('/haji/detail-bintang-tiga', function () {
//     return view('pages.user.detailb3_layanan_haji');
// })->name('detailb3_layanan_haji');

// Route::get('/haji/detail-bintang-lima', function () {
//     return view('pages.user.detailb5_layanan_haji');
// })->name('detailb5_layanan_haji');

Route::get('/paket/detail/{id}', [UserPaketController::class, 'show'])->name('layanan_haji.detail');

Route::get('/hubungi-kami', function () {
    return view('pages.user.hubungi_kami');
})->name('hubungi_kami');

Route::get('/riwayat', function () {
    return view('pages.user.riwayat');
})->name('riwayat');

// Route::get('/transaksi', function () {
//     return view('pages.user.transaksi');
// })->name('transaksi');

Route::put('/highlight1/{id}', [Highlight1Controller::class, 'update'])->name('highlight1.update');
Route::put('/highlight1/{highlight1}', [Highlight1Controller::class, 'update'])->name('highlight1.update');

// Route Landing Hot Deal (admin)
Route::get('/admin/landing-hotdeal', [HotDealController::class, 'index'])->name('admin.hotdeal.index');
Route::put('/admin/landing-hotdeal/{id}', [HotDealController::class, 'update'])->name('admin.hotdeal.update');

Route::resource('/admin/users', AdminUserController::class)->names([
    'index' => 'admin.users.index',
    'store' => 'admin.users.store',
    'update' => 'admin.users.update',
    'destroy' => 'admin.users.destroy',
]);

Route::post('/admin/keunggulan', [LandingKeunggulanController::class, 'store'])->name('admin.keunggulan.store');
Route::delete('/admin/keunggulan/{id}', [LandingKeunggulanController::class, 'destroy'])->name('keunggulan.destroy');
Route::post('/admin/storeOrUpdateKeunggulan', [AdminLandingPageController::class, 'storeOrUpdateKeunggulan'])->name('storeOrUpdateKeunggulan');
Route::post('/keunggulan/store-or-update', [LandingKeunggulanController::class, 'storeOrUpdate'])->name('keunggulan.storeOrUpdate');
Route::get('/admin/landing-page', [AdminLandingPageController::class, 'index'])->name('landing.index');
Route::post('/keunggulan/store', [LandingKeunggulanController::class, 'store'])->name('keunggulan.store');
Route::post('/keunggulan/update/{id}', [LandingKeunggulanController::class, 'update'])->name('keunggulan.update');
Route::delete('/keunggulan/{id}', [LandingKeunggulanController::class, 'destroy'])->name('keunggulan.destroy');

Route::resource('keunggulan', LandingKeunggulanController::class);


Route::get('/admin/affiliate', function () {
    return view('pages.admin.admin_affiliate');
})->name('admin_affiliate');

Route::get('/admin/jamaah', function () {
    return view('pages.admin.admin_jamaah');
})->name('admin_jamaah');

Route::get('/admin/paket', [PaketController::class, 'index'])->name('admin_paket');
Route::post('/admin/paket', [PaketController::class, 'store'])->name('paket.store');
Route::get('/admin/paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.edit');
Route::put('/admin/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
Route::delete('/admin/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
Route::delete('/admin/paket/hapus-semua', [PaketController::class, 'destroyAll'])->name('paket.destroyAll');




Route::get('/admin/agen', function () {
    return view('pages.admin.admin_agen');
})->name('admin_agen');

Route::get('/admin/landing-page', [AdminLandingPageController::class, 'index'])->name('admin.landing.index');

Route::get('admin/edit-banner/{id}', [AdminLandingPageController::class, 'editBanner'])->name('admin.banner.edit');
Route::post('admin/update-banner/{id}', [AdminLandingPageController::class, 'updateBanner'])->name('admin.banner.update');

Route::get('/admin/paket/{id}/detail-paket', [PaketController::class, 'getDetailPaket']);

Route::resource('tipe-kamar', TipeKamarController::class);

Route::post('/admin/fasilitas', [LandingFasilitasController::class, 'store'])->name('fasilitas.store');
// Rute untuk memperbarui fasilitas
Route::put('/admin/fasilitas/{id}', [LandingFasilitasController::class, 'update'])->name('fasilitas.update');
// Rute untuk menghapus fasilitas
Route::delete('/admin/fasilitas/{id}', [LandingFasilitasController::class, 'destroy'])->name('fasilitas.destroy');

