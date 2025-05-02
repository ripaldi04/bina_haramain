<?php

namespace App\Http\Controllers;

use App\Models\LandingBanner;
use App\Models\LandingHighlight1;
use Illuminate\Http\Request;
use App\Models\LandingHotDeal;

class HotDealController extends Controller
{
    // Tampilkan semua Hot Deal (untuk admin)
    public function index()
    {
        $hotDeals = LandingHotDeal::all();
        return view('pages.admin.admin_landing_page', compact('hotDeals'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->only(['title', 'subtitle', 'deskripsi']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('hotdeal', $imageName, 'public');
            $data['image_url'] = 'storage/' . $imagePath;
        }

        LandingHotDeal::create($data);

        return redirect()->back()->with('success', 'Hot Deal berhasil ditambahkan.');
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $hotDeal = LandingHotDeal::findOrFail($id);

        $data = $request->only(['title', 'subtitle', 'deskripsi']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('hotdeal', $imageName, 'public');
            $data['image_url'] = '/storage/' . $imagePath;
        }

        $hotDeal->update($data);

        return redirect()->back()->with('success', 'Hot Deal berhasil diperbarui.');
    }

    public function home()
    {
        $hotdeal = LandingHotDeal::first();
        $banner = LandingBanner::first(); // Ambil data pertama untuk banner
        $highlight1 = LandingHighlight1::first();

    
        return view('pages.user.home', compact('hotdeal', 'banner', 'highlight1'));
    }

}
