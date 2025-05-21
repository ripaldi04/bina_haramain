<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agens,email',
            'phone' => 'required|string|max:20',
            'kode' => 'required|string|max:50|unique:agens,kode',
        ]);

        $agen = Agen::create($validated);

        return response()->json(['agen' => $agen]);
    }

    public function index(Request $request)
    {
        $year = $request->input('year'); // ambil filter tahun dari request

        $agens = Agen::with([
            'orderPaket' => function ($query) use ($year) {
                if ($year) {
                    $query->whereYear('created_at', $year);
                }
            },
            'orderPaket.jamaah'
        ])->get();
        return view('pages.admin.admin_agen', compact('agens'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:agens,email,{$id}",
            'phone' => 'required|string|max:20',
            'kode' => "required|string|max:50|unique:agens,kode,{$id}",
        ]);

        $agen = Agen::findOrFail($id);
        $agen->update($validated);

        return response()->json(['message' => 'Agen Berhasil Diperbarui.']);
    }

    public function destroy($id)
    {
        $agen = Agen::findOrFail($id);
        $agen->delete();

        return response()->json(['message' => 'Agen berhasil dihapus.']);
    }


}
