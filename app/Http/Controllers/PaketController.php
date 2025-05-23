<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailPaket;
use App\Models\Paket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



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

    public function getDetailPaket($id)
    {
        $details = DetailPaket::where('paket_id', $id)->get(['tanggal_keberangkatan', 'jumlah_seat']);
        return response()->json($details);
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
            'jenis' => 'required|string|in:umrah,haji,islamic_tour',
            'program_hari' => 'required|integer|min:1',
            'tanggal_keberangkatan.*' => 'required|date',
            'jumlah_seat.*' => 'required|integer|min:1',
            'harga_kamar_quad' => 'required|numeric',
            'harga_kamar_triple' => 'required|numeric',
            'harga_kamar_double' => 'required|numeric',
        ]);

        $path = $request->file('gambar')->store('images/paket', 'public');

        // Format kode_paket: [Jenis]-[Tanggal Keberangkatan (dd-mm-yyyy)]
        // $keberangkatan = Carbon::parse($request->keberangkatan);
        // $tanggal = $keberangkatan->format('d');
        // $bulan = $keberangkatan->format('m');
        // $tahun = $keberangkatan->format('Y');

        // Tentukan jenis paket (UMR untuk Umrah, HAJ untuk Haji)
        $nama_paket = strtoupper(str_replace(' ', '', $request->nama_paket));
        // Ambil tanggal keberangkatan pertama untuk kode paket
        $tanggal_keberangkatan = $request->tanggal_keberangkatan[0];
        $tanggalFormatted = Carbon::parse($tanggal_keberangkatan)->format('dmY');

        // Buat kode_paket
        $kode_paket = $nama_paket . $tanggalFormatted;

        $paket = Paket::create([
            'kode_paket' => $kode_paket,
            'gambar' => $path,
            'nama_paket' => $request->nama_paket,
            'hotel_mekkah' => $request->hotel_mekkah,
            'hotel_madinah' => $request->hotel_madinah,
            'maskapai' => $request->maskapai,
            'bandara' => $request->bandara,
            'harga' => $request->harga,
            'jenis' => $request->jenis, // default
            'program_hari' => $request->program_hari,
        ]);

        $hargaPaketDasar = $request->harga;

        $tipeKamarData = [
            ['tipe' => 'double', 'harga' => $request->harga_kamar_double + $hargaPaketDasar],
            ['tipe' => 'triple', 'harga' => $request->harga_kamar_triple + $hargaPaketDasar],
            ['tipe' => 'quad', 'harga' => $request->harga_kamar_quad + $hargaPaketDasar],
        ];

        foreach ($tipeKamarData as $data) {
            $paket->tipeKamars()->create([
                'tipe' => $data['tipe'],
                'harga' => $data['harga'],
            ]);
        }

        // Simpan semua jadwal keberangkatan (detail_paket)
        foreach ($request->tanggal_keberangkatan as $index => $tanggal) {
            DetailPaket::create([
                'paket_id' => $paket->id,
                'tanggal_keberangkatan' => $tanggal,
                'jumlah_seat' => $request->jumlah_seat[$index],
            ]);
        }

        return redirect()->route('admin_paket')->with('success', 'Paket berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paket = Paket::with(['detail_layanan', 'detail_paket', 'tipeKamars'])->findOrFail($id);
        return view('pages.user.detail_layanan', compact('paket'));
    }

    public function edit(string $id)
    {
        // $paket = Paket::findOrFail(id: $id);
        $paket = Paket::with(['tipeKamars', 'detail_paket'])->findOrFail($id);
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
            'program_hari' => 'required|integer|min:1',
            'harga_kamar_quad' => 'required|numeric',
            'harga_kamar_triple' => 'required|numeric',
            'harga_kamar_double' => 'required|numeric',
        ]);

        // Jika user upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($paket->gambar && Storage::disk('public')->exists($paket->gambar)) {
                Storage::disk('public')->delete($paket->gambar);
            }

            // Simpan gambar baru
            $path = $request->file('gambar')->store('images/paket', 'public');
            $paket->gambar = $path;
            $paket->save();  // Simpan dulu perubahan gambar

        }

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'hotel_mekkah' => $request->hotel_mekkah,
            'hotel_madinah' => $request->hotel_madinah,
            'maskapai' => $request->maskapai,
            'bandara' => $request->bandara,
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'program_hari' => $request->program_hari,
        ]);

        // Update tipe kamar
        $hargaDasar = $request->harga;
        $paket->tipeKamars()->delete(); // Hapus semua dan buat ulang
        $paket->tipeKamars()->createMany([
            ['tipe' => 'double', 'harga' => $request->harga_kamar_double + $hargaDasar],
            ['tipe' => 'triple', 'harga' => $request->harga_kamar_triple + $hargaDasar],
            ['tipe' => 'quad', 'harga' => $request->harga_kamar_quad + $hargaDasar],
        ]);

        // Simpan tanggal keberangkatan baru
        if ($request->has('tanggal_keberangkatan')) {
            foreach ($request->tanggal_keberangkatan as $i => $tanggal) {
                DetailPaket::create([
                    'paket_id' => $paket->id,
                    'tanggal_keberangkatan' => $tanggal,
                    'jumlah_seat' => $request->jumlah_seat[$i] ?? 0,
                ]);
            }
        }

        return redirect()->route('admin_paket')->with('success', 'Paket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);
        $paket->tipeKamars()->delete();
        $paket->detail_paket()->delete();
        // Hapus file gambar dari storage
        if ($paket->gambar && Storage::disk('public')->exists($paket->gambar)) {
            Storage::disk('public')->delete($paket->gambar);
        }
        $paket->delete();

        return response()->json(['message' => 'Paket berhasil dihapus']);
    }
}
