<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class AdminArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('pages.admin.admin_artikel', compact('artikels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $artikel->judul = $request->input('judul');
        $artikel->isi = $request->input('isi');

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && \Storage::disk('public')->exists($artikel->gambar)) {
                \Storage::disk('public')->delete($artikel->gambar);
            }

            $gambarPath = $request->file('gambar')->store('artikel', 'public');
            $artikel->gambar = $gambarPath;
        }

        $artikel->save();

        return response()->json(['success' => 'Artikel berhasil diperbarui.']);
    }
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus gambar jika ada
        if ($artikel->gambar && \Storage::disk('public')->exists($artikel->gambar)) {
            \Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return response()->json(['success' => 'Artikel berhasil dihapus.']);
    }

}
