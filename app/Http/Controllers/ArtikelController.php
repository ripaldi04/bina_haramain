<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('pages.user.detail_artikel', compact('artikel'));
    }

    public function index()
    {
        // Ambil semua artikel, urutkan terbaru dulu
        $artikels = Artikel::orderBy('created_at', 'desc')->get();

        // Kirim ke view
        return view('pages.user.artikel', compact('artikels'));
    }


}
