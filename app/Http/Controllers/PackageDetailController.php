<?php

namespace App\Http\Controllers;

use App\Models\PackageDetail;
use Illuminate\Http\Request;
use App\Models\Package;


class PackageDetailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'packages_id' => 'required|integer',
            'departure_date' => 'required|date',
            'departure_airport' => 'required|string',
            'program_days' => 'required|integer',
            'room_type' => 'required|in:quad,double,triple',
            'room_count' => 'required|integer|min:1',
        ]);

        PackageDetail::create([
            'packages_id' => $request->packages_id,
            'departure_date' => $request->departure_date,
            'departure_airport' => $request->departure_airport,
            'program_days' => $request->program_days,
            'room_type' => $request->room_type,
            'room_count' => $request->room_count,
            'created_at' => now(),
        ]);

        return back()->with('success', 'Paket detail berhasil disimpan!');
    }
    public function create(Request $request)
    {
        $packageId = $request->query('package_id');

        return view('user.transaksi', compact('package'));
    }
}
