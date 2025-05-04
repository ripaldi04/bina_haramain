<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class LandingGaleriController extends Controller
{
    // Menampilkan semua galeri
    public function index()
    {
        $galeri = Galeri::all();
        return redirect()->route('admin.landing.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return redirect()->route('admin.landing.index')->with('success', 'Galeri berhasil diperbarui');
    }

    // Menyimpan hasil edit
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        // Validasi untuk gambar (image1 - image8)
        $request->validate([
            'image1_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image6_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image7_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image8_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update informasi judul dan deskripsi
        $galeri->title = $request->title;
        $galeri->deskripsi = $request->deskripsi;

        // Cek dan update setiap gambar jika ada
        for ($i = 1; $i <= 8; $i++) {
            $imageField = 'image' . $i . '_url';

            if ($request->hasFile('image' . $i)) {
                // Jika file baru di-upload
                $file = $request->file('image' . $i);
                $path = $file->store('galeri', 'public');

                // Hapus gambar lama jika ada
                if ($galeri->$imageField && Storage::disk('public')->exists($galeri->$imageField)) {
                    Storage::disk('public')->delete($galeri->$imageField);
                }

                // Simpan path gambar baru
                $galeri->$imageField = $path;
            } else {
                // Jika gambar tidak di-upload, pertahankan gambar lama
                $galeri->$imageField = $galeri->$imageField ?: $request->$imageField;
            }
        }


        $galeri->save();

        return redirect()->route('admin.landing.index')->with('success', 'Galeri berhasil diperbarui');
    }
}