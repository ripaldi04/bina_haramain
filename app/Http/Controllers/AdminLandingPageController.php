<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fasilitas;
use App\Models\Keunggulan;
use App\Models\Galeri;
use App\Models\Question;

class AdminLandingPageController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $keunggulan = Keunggulan::all(); // Ambil data Keunggulan jika diperlukan

        return view('pages.admin.admin_landing_page', [
            'fasilitas' => $fasilitas,
            'keunggulan' => $keunggulan,
            'banners' => DB::table('landing_banners')->get(),
            'highlights1' => DB::table('landing_highlights1')->get(),
            'highlights2' => DB::table('landing_highlights2')->get(),
            'highlightPoints' => DB::table('landing_highlights_points')->get(),
            'muthawif' => DB::table('landing_muthawif')->get(),
            'galeri' => DB::table('landing_galeri')->get(),
            'hotDeals' => DB::table('landing_hot_deal')->get(),
            'questions' => DB::table('landing_question')->get(),
        ]);
        // return view('pages.user.home', compact('fasilitas'));

    }


    public function editBanner($id)
    {
        $banner = DB::table('landing_banners')->where('id', $id)->first();
        return view('admin.edit-banner', compact('banner'));
    }

    public function updateBanner(Request $request, $id)
    {
        $validated = $request->validate([
            'header1' => 'required|string|max:255',
            'header2' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = DB::table('landing_banners')->where('id', $id)->first();

        if ($banner) {
            if ($request->hasFile('image_url')) {
                $image = $request->file('image_url');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $validated['image_url'] = 'images/' . $imageName;
            }

            DB::table('landing_banners')->where('id', $id)->update([
                'header1' => $validated['header1'],
                'header2' => $validated['header2'],
                'deskripsi' => $validated['deskripsi'],
                'image_url' => $validated['image_url'] ?? $banner->image_url,
            ]);

            return redirect()->back()->with('success', 'Banner updated successfully');
        }

        return redirect()->back()->with('error', 'Banner not found');
    }

    // Fungsi untuk edit fasilitas
    public function editFasilitas($id)
    {
        $fasilitas = Fasilitas::findOrFail($id); // Mengambil data fasilitas berdasarkan ID
        return view('pages.admin.admin_landing_page', compact('fasilitas')); // Mengirim data ke view
    }

    // Fungsi untuk update fasilitas
    public function updateFasilitas(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fasilitas = Fasilitas::findOrFail($id); // Mengambil fasilitas berdasarkan ID

        $fasilitas->nama = $validated['nama'];
        $fasilitas->deskripsi = $validated['deskripsi'];

        // Jika ada gambar baru, simpan dan update
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/image_fasilitas', $imageName);
            $fasilitas->gambar = 'image_fasilitas/' . $imageName;
        }

        $fasilitas->save(); // Menyimpan data yang sudah diperbarui

        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui.');
    }

    // Fungsi untuk store atau update keunggulan
    public function storeOrUpdateKeunggulan(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ['title' => $validated['title']];

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $data['image_url'] = 'images/' . $imageName;
        }

        if ($request->id) {
            Keunggulan::where('id', $request->id)->update($data); // Menggunakan model Keunggulan
            return redirect()->back()->with('success', 'Keunggulan berhasil diperbarui.');
        } else {
            Keunggulan::create($data); // Menambahkan data baru dengan model
            return redirect()->back()->with('success', 'Keunggulan berhasil ditambahkan.');
        }
    }
}
