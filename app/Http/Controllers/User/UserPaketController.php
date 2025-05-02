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
        $paket_haji = Paket::where('jenis', 'Haji')->get();
        return view('pages.user.layanan_haji', compact('paket_haji')); // Mengirim data paket ke view
    }
    public function store()
    {
        // Ambil paket yang jenisnya adalah 'Haji'
        $paket_umrah = Paket::where('jenis', 'Umrah')->get();
        return view('pages.user.layanan_umrah', compact('paket_umrah')); // Mengirim data paket ke view
    }
    public function show($id)
    {
        $paket = Paket::findOrFail($id); // atau where('slug', $slug) kalau pakai slug
        return view('pages.user.detail_layanan', compact('paket'));
    }
    
}
