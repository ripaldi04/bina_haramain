<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderPaket;
use Illuminate\Http\Request;

class AdminJamaahController extends Controller
{
    public function semuaPemesan()
    {
        $orders = OrderPaket::with(['user', 'paket', 'orderKamar.jamaahs'])->get();
        return view('pages.admin.admin_jamaah', compact('orders'));
    }
}