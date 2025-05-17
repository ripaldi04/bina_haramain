<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingMuthawif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingMuthawifController extends Controller
{
    public function editMuthawif($id)
    {
        $muthawif = LandingMuthawif::findOrFail($id);
        return view('pages.admin.admin_landing_page', compact('muthawif'));
    }

    // Memperbarui data muthawif
    public function updateMuthawif(Request $request, $id)
    {
        $muthawif = LandingMuthawif::findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'daerah' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image_url')) {
            if (
                $muthawif->image_url &&
                $muthawif->image_url !== 'landing_muthawif/default.jpg' &&
                Storage::disk('public')->exists($muthawif->image_url)
            ) {
                Storage::disk('public')->delete($muthawif->image_url);
            }
            $path = $request->file('image_url')->store('landing_muthawif', 'public');
            $muthawif->image_url = $path;
        }


        $muthawif->nama = $request->nama;
        $muthawif->daerah = $request->daerah;
        $muthawif->save();

        return response()->json(['message' => 'Muthawif berhasil diperbarui']);
    }
}
