<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri; // <-- ini dibenerin
use Illuminate\Support\Facades\Storage;

class LandingGaleriController extends Controller // <-- Nama class juga dibenerin
{
    // Menampilkan semua galeri
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Menyimpan hasil edit
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($galeri->gambar && Storage::disk('public')->exists($galeri->gambar)) {
                Storage::disk('public')->delete($galeri->gambar);
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $path = $file->store('galeri', 'public');

            $galeri->gambar = $path;
        }

        $galeri->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }
}
