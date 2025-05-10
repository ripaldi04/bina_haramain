<?php

namespace Database\Seeders;

use App\Models\LandingBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandingBanner::create([
            'header1' => 'Haji Langsung Berangkat',
            'header2' => 'Tanpa Antri dan Visa Haji Resmi',
            'deskripsi' => 'Spesial bersama Koh Dennis Lim dan Teh Yunda – Kuota Terbatas, Segera Amankan Kuota Anda sebelum Terlambat!',
            'image_url' => 'images/v146_30.png',
        ]);
    }
}
