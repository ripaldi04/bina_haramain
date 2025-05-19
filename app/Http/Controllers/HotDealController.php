<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingHotDeal;
use Illuminate\Support\Facades\Storage;

class HotDealController extends Controller
{
    // Tampilkan semua Hot Deal (untuk admin)
    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['title', 'subtitle', 'deskripsi']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('image_hotdeal', $imageName, 'public');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $hotDeal = LandingHotDeal::findOrFail($id);

        $data = $request->only(['title', 'subtitle', 'deskripsi']);

        if ($request->hasFile('image')) {
            if (
                $hotDeal->image_url &&
                $hotDeal->image_url !== 'storage/image_hotdeal/default.jpg'
            ) {
                $oldPath = str_replace('storage/', '', $hotDeal->image_url);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('image_hotdeal', $imageName, 'public');
            $data['image_url'] = 'storage/' . $imagePath;
        }

        $hotDeal->update($data);

        return redirect()->back()->with('success', 'Hot Deal berhasil diperbarui.');
    }

}