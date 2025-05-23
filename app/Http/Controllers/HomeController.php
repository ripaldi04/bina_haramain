<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Fasilitas;
use App\Models\Galeri; // <-- ini yang betul
use App\Models\Keunggulan;
use App\Models\LandingBanner;
use App\Models\LandingHighlight2;
use App\Models\LandingHighlightPoint;
use App\Models\LandingHotDeal;
use App\Models\LandingMuthawif;
use App\Models\Paket;
use App\Models\Question;
use App\Models\LandingHighlight1; 
use App\Models\Video;// pastikan model-nya di-import


class HomeController extends Controller
{
    public function index()
    {
        $keunggulan = Keunggulan::all();
        $banner = LandingBanner::first();
        $fasilitas = Fasilitas::all();
        $galeri = Galeri::first();
        $questions = Question::all();
        $hotDeals = LandingHotDeal::all();
        $highlight1 = LandingHighlight1::first();
        $highlight2 = LandingHighlight2::first();
        $landingPoint = LandingHighlightPoint::All();
        $muthawifs = LandingMuthawif::All();
        $artikels = Artikel::latest()->take(3)->get();
        $paketHaji = Paket::with('detail_paket') // eager load relasi
            ->where('jenis', 'haji')
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();
        $video = Video  ::latest()->first(); // Atau sesuai kebutuhan

        return view('pages.user.home', compact('banner', 'keunggulan', 'fasilitas', 'galeri', 'questions', 'hotDeals', 'highlight1', 'highlight2', 'landingPoint', 'muthawifs', 'paketHaji', 'artikels','video'));
    }
}