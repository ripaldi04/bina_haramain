<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.user.login'); // buat file ini nanti
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah sudah verifikasi email
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun kamu belum diverifikasi. Silakan cek email untuk verifikasi.']);
            }
            $request->session()->regenerate(); // Tambahkan regenerasi session demi keamanan

            if ($user->role === 'admin') {
                return redirect('/admin/users');
            } elseif ($user->role === 'user') {
                return redirect('/');
            } else {
                // fallback jika role tidak dikenali
                Auth::logout();
                return back()->withErrors(['email' => 'Role tidak dikenali. Hubungi admin.']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout');
        ;
    }
}
