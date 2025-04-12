<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingBanner;


class LandingBannerController extends Controller
{
    public function index()
{
    $banner = LandingBanner::first(); // atau berdasarkan id
    return view('pages.user.home', compact('banner'));
}
}
