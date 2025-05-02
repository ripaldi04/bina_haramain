<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingBanner;
use App\Models\Keunggulan;

class LandingBannerController extends Controller
{
    public function index()
    {
        $banner = LandingBanner::first();
        $keunggulan = Keunggulan::all(); // ambil semua data keunggulan

        return view('pages.user.home', compact('banner', 'keunggulan'));
    }
}
