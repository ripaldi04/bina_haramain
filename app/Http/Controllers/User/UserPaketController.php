<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class UserPaketController extends Controller
{
    public function index()
    {
        // Ambil paket yang jenisnya adalah 'Haji'
        $pakets = Paket::where('jenis', 'Haji')->get();
        return view('pages.user.layanan_haji', compact('pakets')); // Mengirim data paket ke view
    }
}
