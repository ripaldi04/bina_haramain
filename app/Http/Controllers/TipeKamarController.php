<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'paket_id' => 'required|exists:paket,id',
            'harga_kamar_quad' => 'required|numeric|min:0',
            'harga_kamar_triple' => 'required|numeric|min:0',
            'harga_kamar_double' => 'required|numeric|min:0',
        ]);

        // Simpan masing-masing tipe kamar
        $tipeKamars = [
            ['tipe' => 'quad', 'harga' => $request->harga_kamar_quad],
            ['tipe' => 'triple', 'harga' => $request->harga_kamar_triple],
            ['tipe' => 'double', 'harga' => $request->harga_kamar_double],
        ];

        foreach ($tipeKamars as $data) {
            TipeKamar::create([
                'paket_id' => $request->paket_id,
                'tipe' => $data['tipe'],
                'harga' => $data['harga'],
            ]);
        }

        return redirect()->back()->with('success', 'Tipe kamar berhasil ditambahkan!');
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
