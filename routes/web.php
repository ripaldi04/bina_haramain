<?php

use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminJamaahController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Highlight1Controller;
use App\Http\Controllers\Highlight2Controller;
use App\Http\Controllers\HighlightPointController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotDealController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LandingFasilitasController;
use App\Http\Controllers\LandingGaleriController;
use App\Http\Controllers\LandingKeunggulanController;
use App\Http\Controllers\LandingMuthawifController;
use App\Http\Controllers\OrderPaketController;
use App\Http\Controllers\TipeKamarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminLandingPageController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\User\UserPaketController;



Route::get('/payment/{order_id}', [OrderPaketController::class, 'payment'])->name('payment');

Route::post('/proses-pesan', [OrderPaketController::class, 'prosesPesan'])->name('prosesPesan');


// Route untuk menampilkan halaman transaksi setelah pemesanan dilakukan
Route::get('/transaksi/{order_id}', [OrderPaketController::class, 'showTransaksiForm'])->name('order.transaksi');

// Route untuk mengolah data transaksi dan update ke database
Route::post('/transaksi/{order_id}', [OrderPaketController::class, 'prosesTransaksi'])->name('prosesTransaksi');

Route::post('/upload-bukti/{order_id}', [OrderPaketController::class, 'uploadBukti'])->name('uploadBuktiPembayaran');


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

Route::get('/admin/jamaah', [AdminJamaahController::class, 'semuaPemesan'])->name('admin.pemesan');

Route::get('/admin/galeri/{id}/edit', [LandingGaleriController::class, 'edit'])->name('admin.galeri.edit');
Route::put('/admin/galeri/{id}', [LandingGaleriController::class, 'update'])->name('admin.galeri.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/haji', [UserPaketController::class, 'index'])->name('layanan_haji');
Route::get('/umrah', [UserPaketController::class, 'store'])->name('layanan_umrah');
Route::get('/islamic-tour', [UserPaketController::class, 'store2'])->name('islamic_tour');


Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');

Route::get('/paket/detail/{id}', [UserPaketController::class, 'show'])->name('layanan_haji.detail');

Route::get('/hubungi-kami', function () {
    return view('pages.user.hubungi_kami');
})->name('hubungi_kami');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');



Route::get('/artikel/detail/{id}', [ArtikelController::class, 'show'])->name('detail_artikel');


Route::get('/tentang-kami', function () {
    return view('pages.user.tentang_kami');
})->name('tentang_kami');

Route::get('/riwayat', [OrderPaketController::class, 'riwayat'])->name('riwayat');

Route::delete('/order/{id}', [OrderPaketController::class, 'destroy'])->name('order.destroy');


// Mengedit muthawif
Route::get('/muthawif/{id}/edit', [LandingMuthawifController::class, 'editMuthawif'])->name('muthawif.edit');
Route::put('/muthawif/{id}', [LandingMuthawifController::class, 'updateMuthawif'])->name('muthawif.update');
Route::post('/muthawif/{id}', [LandingMuthawifController::class, 'updateMuthawif']);

Route::get('/admin/landing/highlightpoint/{id}/edit', [HighlightPointController::class, 'editHighlightPoint'])->name('admin.highlightpoint.edit');
Route::put('/admin/highlightpoint/{id}', [HighlightPointController::class, 'updateHighlightPoint'])->name('admin.highlightpoint.update');
Route::post('/admin/highlight-points/update/{id}', [HighlightPointController::class, 'updateHighlightPoint']);

Route::put('/highlight1/{id}', [Highlight1Controller::class, 'update'])->name('highlight1.update');
Route::put('/highlight1/{highlight1}', [Highlight1Controller::class, 'update'])->name('highlight1.update');

Route::get('/admin/landing/highlight2/{id}/edit', [Highlight2Controller::class, 'editHighlight2'])->name('admin.highlight2.edit');
Route::put('/admin/highlight2/{id}', [Highlight2Controller::class, 'updateHighlight2'])->name('admin.highlight2.update');

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

// Route::get('/admin/jamaah', function () {
//     return view('pages.admin.admin_jamaah');
// })->name('admin_jamaah');
Route::put('/admin/orders/{id}', [OrderPaketController::class, 'update'])->name('admin.orders.update');


Route::get('/admin/paket', [PaketController::class, 'index'])->name('admin_paket');
Route::post('/admin/paket', [PaketController::class, 'store'])->name('paket.store');
Route::get('/admin/paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.edit');
Route::put('/admin/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
Route::delete('/admin/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
Route::delete('/admin/paket/hapus-semua', [PaketController::class, 'destroyAll'])->name('paket.destroyAll');


Route::get('/admin/artikel', function () {
    return view('pages.admin.admin_artikel');
})->name('admin_artikel');

Route::get('/admin/artikel', [AdminArtikelController::class, 'index'])->name('artikel.index');
Route::post('/admin/artikel', [AdminArtikelController::class, 'store'])->name('artikel.store');
Route::post('/admin/artikel/{id}/update', [AdminArtikelController::class, 'update']);
Route::delete('/admin/artikel/{id}/delete', [AdminArtikelController::class, 'destroy']);


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


Route::post('/admin/agen', [AgenController::class, 'store'])->name('agen.store');
Route::get('/admin/agen', [AgenController::class, 'index'])->name('agen.index');
Route::put('/admin/agen/{id}', [AgenController::class, 'update']);
Route::delete('/admin/agen/{id}', [AgenController::class, 'destroy']);


