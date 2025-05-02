<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LandingHotDeal;

class LandingHotDealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandingHotDeal::create([
            'title' => 'HOT DEAL !!!',
            'subtitle' => 'SEAT TERBATAS !!! PASTIKAN ANDA KEBAGIAN !!!',
            'deskripsi' => 'Pendaftaran Bulan Februari 2025 ini akan mendapatkan potongan harga $1.000/pack! dan Anda berhak 1 Bus serta 1 Hotel Bersama Ustadz Koh Dennis Lim & Teh Yunda',
            'image_url' => 'hotdeal/sample.jpg',
        ]);
    }
}