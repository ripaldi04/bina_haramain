<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingHighlightPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HighlightPointController extends Controller
{
    public function editHighlightPoint($id)
    {
        $highlightPoint = LandingHighlightPoint::findOrFail($id);
        return response()->json($highlightPoint);
    }

    public function updateHighlightPoint(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $highlight = LandingHighlightPoint::findOrFail($id);
        $highlight->title = $request->title;
        $highlight->deskripsi = $request->deskripsi;

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            if ($highlight->image_url && Storage::disk('public')->exists($highlight->image_url)) {
                Storage::disk('public')->delete($highlight->image_url);
            }

            $imagePath = $request->file('image')->store('highlight_points', 'public');
            $highlight->image_url = $imagePath; // simpan path yang sudah cocok
        }


        $highlight->save();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.landing.index')->with('success', 'Highlight Point berhasil diperbarui');


    }
}
