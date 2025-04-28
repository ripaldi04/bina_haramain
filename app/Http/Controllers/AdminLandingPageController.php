<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LandingBanner;
use App\Models\LandingHighlight2;
use App\Models\LandingHighlightPoints;

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
            'hotDeals' => DB::table('landing_hot_deal')->get(),
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
    $request->validate([
        'header1' => 'required|string|max:255',
        'header2' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $banner = LandingBanner::findOrFail($id);
    $banner->header1 = $request->header1;
    $banner->header2 = $request->header2;
    $banner->deskripsi = $request->deskripsi;

    if ($request->hasFile('image_url')) {
        $imagePath = $request->file('image_url')->store('banner_images', 'public');
        $banner->image_url = $imagePath;
    }

    $banner->save();

    return redirect()->route('admin.landing.index')->with('success', 'Banner berhasil diperbarui');
}

public function editHighlight2($id)
{
    $highlight = LandingHighlight2::findOrFail($id);
    return view('admin.edit-highlight2', compact('highlight'));
}

public function updateHighlight2(Request $request, $id)
{
    $request->validate([
        'header' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $highlight = LandingHighlight2::findOrFail($id);
    $highlight->header = $request->header;
    $highlight->deskripsi = $request->deskripsi;

    if ($request->hasFile('image_url')) {
        $imagePath = $request->file('image_url')->store('highlight2_images', 'public');
        $highlight->image_url = $imagePath;
    }

    $highlight->save();

    return redirect()->route('admin.landing.index')->with('success', 'Highlight 2 berhasil diperbarui');
}


public function editHighlightPoint($id)
{
    $highlightPoint = LandingHighlightPoints::findOrFail($id);
    return response()->json($highlightPoint);
}

public function updateHighlightPoint(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $highlight = LandingHighlightPoints::findOrFail($id);
    $highlight->title = $request->title;
    $highlight->deskripsi = $request->deskripsi;

    // Upload gambar jika ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('highlight_points', 'public');
        $highlight->image_url = $imagePath; // simpan path yang sudah cocok
    }
    

    $highlight->save();

    return response()->json(['success' => true]);
}



public function showHome()
{
    $banner = LandingBanner::first(); // Ambil banner pertama
    $highlight2 = LandingHighlight2::first(); // Ambil highlight 2 pertama
    $highlightPoints = LandingHighlightPoints::all();
    return view('pages.user.home', compact('banner', 'highlight2', 'highlightPoints'));
}


}