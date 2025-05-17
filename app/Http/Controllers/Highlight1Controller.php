<?php

namespace App\Http\Controllers;

use App\Models\LandingBanner;
use App\Models\LandingHighlight1;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Highlight1Controller extends Controller
{
    // public function index()
    // {
    //     $highlights1 = LandingHighlight1::all();
    //     return view('pages.admin.admin_landing_page', compact('highlights1'));
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'header' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'point1' => 'nullable|string',
            'point2' => 'nullable|string',
            'point3' => 'nullable|string',
            'point4' => 'nullable|string',
            'point5' => 'nullable|string',
            'gambar' => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['image_url'] = $request->file('gambar')->store('highlight1', 'public');
        }

        LandingHighlight1::create($validated);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $highlight = LandingHighlight1::findOrFail($id);

        $validated = $request->validate([
            'header' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'point1' => 'nullable|string',
            'point2' => 'nullable|string',
            'point3' => 'nullable|string',
            'point4' => 'nullable|string',
            'point5' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($highlight->image_url && Storage::disk('public')->exists($highlight->image_url)) {
                Storage::disk('public')->delete($highlight->image_url);
            }
            $validated['image_url'] = $request->file('image')->store('highlight1', 'public');
        }

        $highlight->update($validated);

        return redirect()->back()->with('success', 'Highlight berhasil diperbarui.');
    }

}