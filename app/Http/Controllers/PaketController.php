<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;



class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();
        return view('pages.admin.admin_paket', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama_paket' => 'required|string',
            'hotel_mekkah' => 'required|string',
            'hotel_madinah' => 'required|string',
            'maskapai' => 'required|string',
            'bandara' => 'required|string',
            'harga' => 'required|numeric',
            'jenis' => 'required|string',
            'keberangkatan' => 'required|date',
        ]);

        $path = $request->file('gambar')->store('images/paket', 'public');

        Paket::create([
            'gambar' => $path,
            'nama_paket' => $request->nama_paket,
            'hotel_mekkah' => $request->hotel_mekkah,
            'hotel_madinah' => $request->hotel_madinah,
            'maskapai' => $request->maskapai,
            'bandara' => $request->bandara,
            'harga' => $request->harga,
            'jenis' => $request->jenis, // default
            'keberangkatan' => $request->keberangkatan,
        ]);

        return redirect()->route('admin_paket')->with('success', 'Paket berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Paket::findOrFail($id);
        return response()->json($paket); // Untuk AJAX
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paket = Paket::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required|string',
            'hotel_mekkah' => 'required|string',
            'hotel_madinah' => 'required|string',
            'maskapai' => 'required|string',
            'bandara' => 'required|string',
            'harga' => 'required|numeric',
            'jenis' => 'required|string',
            'keberangkatan' => 'required|date',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images/paket', 'public');
            $paket->gambar = $path;
        }

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'hotel_mekkah' => $request->hotel_mekkah,
            'hotel_madinah' => $request->hotel_madinah,
            'maskapai' => $request->maskapai,
            'bandara' => $request->bandara,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'keberangkatan' => $request->keberangkatan,
        ]);

        return redirect()->route('admin_paket')->with('success', 'Paket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return response()->json(['message' => 'Paket berhasil dihapus']);
    }
}
