<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Galeri; // <-- ini yang betul
use App\Models\Keunggulan;
use App\Models\LandingBanner;
use App\Models\LandingHighlight2;
use App\Models\LandingHotDeal;
use App\Models\Question;
use App\Models\LandingHighlight1; // pastikan model-nya di-import


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


        return view('pages.user.home', compact('banner', 'keunggulan', 'fasilitas', 'galeri', 'questions', 'hotDeals', 'highlight1','highlight2'));
    }
}