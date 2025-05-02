<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLandingPageController extends Controller
{
    public function index()
    {
        return view('pages.admin.admin_landing_page', [
            'banners' => DB::table('landing_banners')->get(),
            'highlights1' => DB::table('landing_highlights1')->get(),
            'highlights2' => DB::table('landing_highlights2')->get(),
            'highlightPoints' => DB::table('landing_highlights_points')->get(),
            'keunggulan' => DB::table('landing_keunggulan')->get(),
            'fasilitas' => DB::table('landing_fasilitas')->get(),
            'muthawif' => DB::table('landing_muthawif')->get(),
            'galeri' => DB::table('landing_galeri')->get(),
            'hotDeals' => DB::table('landing_hot_deals')->get(),
            'questions' => DB::table('landing_question')->get(),
        ]);
    }
    public function editBanner($id)
    {
        // Ambil data banner berdasarkan id
        $banner = DB::table('landing_banners')->where('id', $id)->first();
        return view('admin.edit-banner', compact('banner')); // Pindahkan tampilan ke 'edit-banner'
    }

    public function updateBanner(Request $request, $id)
{
    // Validasi data yang diterima
    $validated = $request->validate([
        'header1' => 'required|string|max:255',
        'header2' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar (opsional)
    ]);

    // Cari banner berdasarkan ID
    $banner = DB::table('landing_banners')->where('id', $id)->first();

    if ($banner) {
        // Jika ada file gambar baru, upload ke folder public/images
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '-' . $image->getClientOriginalName(); // Menggunakan nama unik
            $imagePath = $image->storeAs('public/images', $imageName); // Menyimpan di public/images
            $validated['image_url'] = 'images/' . $imageName; // Menyimpan path relatif
        }

        // Update data banner
        DB::table('landing_banners')->where('id', $id)->update([
            'header1' => $validated['header1'],
            'header2' => $validated['header2'],
            'deskripsi' => $validated['deskripsi'],
            'image_url' => $validated['image_url'] ?? $banner->image_url, // Gunakan gambar lama jika tidak ada yang baru
        ]);

        return redirect()->back()->with('success', 'Banner updated successfully');
    }

    return redirect()->back()->with('error', 'Banner not found');
    }
}