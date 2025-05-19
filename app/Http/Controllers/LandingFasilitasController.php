<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LandingFasilitasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Menangani upload gambar
        $imagePath = null;
        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('image_fasilitas', 'public');
        }

        // Menambahkan data ke database
        Fasilitas::create([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'image_url' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Menangani gambar
        $imagePath = $fasilitas->image_url;

        if ($request->hasFile('image_file')) {
            // Menghapus gambar lama jika ada
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Menyimpan gambar baru
            $imagePath = $request->file('image_file')->store('image_fasilitas', 'public');
        }

        // Memperbarui fasilitas di database
        $fasilitas->update([
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'image_url' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        try {
            if ($fasilitas->image_url && Storage::disk('public')->exists($fasilitas->image_url)) {
                Storage::disk('public')->delete($fasilitas->image_url);
            }

            // Menghapus fasilitas dari database
            $fasilitas->delete();
        } catch (\Exception $e) {
            Log::error('Error saat menghapus fasilitas: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus fasilitas.');
        }

        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }

    public function showHome()
    {
        $fasilitas = Fasilitas::all(); // Atau query lain yang Anda butuhkan
        dd($fasilitas); // Cek data fasilitas di sini
        return view('pages.user.home', compact('fasilitas'));
    }
}