<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    public function index()
    {
        $data = HubungiKami::first(); // karena hanya satu data
        return view('pages.admin.admin_hubungi_kami', compact('data'));
    }
    public function indexUser()
    {
        $data = HubungiKami::first(); // karena hanya satu data
        return view('pages.user.hubungi_kami', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'layanan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_cs_1' => 'nullable|string',
            'no_cs_2' => 'nullable|string',
            'email_1' => 'nullable|email',
            'email_2' => 'nullable|email',
        ]);

        $hubungiKami = HubungiKami::first();

        // Jika belum ada data, buat dulu agar bisa diupdate
        if (!$hubungiKami) {
            $hubungiKami = new HubungiKami();
        }

        $hubungiKami->layanan = $request->layanan;
        $hubungiKami->deskripsi = $request->deskripsi;
        $hubungiKami->alamat = $request->alamat;
        $hubungiKami->no_cs_1 = $request->no_cs_1;
        $hubungiKami->no_cs_2 = $request->no_cs_2;
        $hubungiKami->email_1 = $request->email_1;
        $hubungiKami->email_2 = $request->email_2;

        $hubungiKami->save();

        return redirect()->route('hubungi-kami.index')->with('success', 'Data berhasil diupdate!');
    }
}
