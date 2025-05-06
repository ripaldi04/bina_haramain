<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LandingMuthawif;
use Illuminate\Http\Request;

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
        $path = $request->file('image_url')->store('landing_muthawif', 'public');
        $muthawif->image_url = $path;
    }


    $muthawif->nama = $request->nama;
    $muthawif->daerah = $request->daerah;
    $muthawif->save();

    return response()->json(['message' => 'Muthawif berhasil diperbarui']);
}
}
