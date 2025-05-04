<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Galeri; // <-- ini yang betul
use App\Models\Keunggulan;
use App\Models\LandingBanner;
use App\Models\LandingHotDeal;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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


        return view('pages.user.home', compact('keunggulan', 'fasilitas', 'galeri', 'questions', 'hotDeals'));
    }
}