<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;



class RegisterController extends Controller
{
    public function showForm()
    {
        return view('pages.user.register'); // Ganti sesuai nama file blade kamu
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kode_referral' => Str::random(8), // Auto generate referral code
        ]);

            // Kirim verifikasi email
        $user->sendEmailVerificationNotification();

        // Optional: login langsung setelah register
        auth()->login($user);

        return redirect('/email/verify'); // Ganti tujuan redirect jika perlu
    }
}
