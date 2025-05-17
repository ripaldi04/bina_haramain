<?php

namespace App\Http\Controllers;

use App\Models\LandingHighlight2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Highlight2Controller extends Controller
{

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
            if ($highlight->image_url && Storage::disk('public')->exists($highlight->image_url)) {
                Storage::disk('public')->delete($highlight->image_url);
            }
            $imagePath = $request->file('image_url')->store('highlight2_images', 'public');
            $highlight->image_url = $imagePath;
        }

        $highlight->save();

        return redirect()->route('admin.landing.index')->with('success', 'Highlight 2 berhasil diperbarui');
    }
}