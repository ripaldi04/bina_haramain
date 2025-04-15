<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\Storage;

class AdminPaketController extends Controller
{
    public function index()
    {
        return view('pages.admin.admin_paket');
    }

    public function getData()
    {
        return response()->json(Paket::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'hotel_makkah' => 'nullable|string',
            'hotel_madinah' => 'nullable|string',
            'maskapai' => 'nullable|string',
            'maktab' => 'nullable|string',
            'handling_bandara' => 'nullable|string',
            'makan' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('paket', 'public');
            $data['gambar'] = $gambar;
        }

// Menyimpan data ke database
$paket = Paket::create($data)([
    'nama' => $request->nama,
    'hotel_makkah' => $request->hotel_makkah,
    'hotel_madinah' => $request->hotel_madinah,
    'maskapai' => $request->maskapai,
    'maktab' => $request->maktab,
    'handling_bandara' => $request->handling_bandara,
    'makan' => $request->makan,
    'harga' => $request->harga,
    'gambar' => $imagePath ?? null, // Jika gambar ada, simpan path
]);
return response()->json(['message' => 'Paket berhasil disimpan!'])($paket);
}


    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);
        
        $data = $request->validate([
            'nama' => 'required|string',
            'hotel_makkah' => 'nullable|string',
            'hotel_madinah' => 'nullable|string',
            'maskapai' => 'nullable|string',
            'maktab' => 'nullable|string',
            'handling_bandara' => 'nullable|string',
            'makan' => 'nullable|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('paket', 'public');
            $data['gambar'] = $gambar;
        }

        $paket->update($data);
        return response()->json($paket);
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        if ($paket->gambar) {
            Storage::disk('public')->delete($paket->gambar);
        }
        $paket->delete();
        return response()->json(['status' => 'deleted']);
    }

    public function destroyMultiple(Request $request)
    {
        $pakets = Paket::whereIn('id', $request->ids)->get();
        foreach ($pakets as $paket) {
            if ($paket->gambar) {
                Storage::disk('public')->delete($paket->gambar);
            }
            $paket->delete();
        }

        return response()->json(['status' => 'bulk deleted']);
    }
}
