<?php

namespace Database\Seeders;

use App\Models\LandingHighlight1;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingHighlight1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LandingHighlight1::create([
            'header' => 'Umrah Nyaman & Aman',
            'deskripsi' => 'Kami memberikan pelayanan terbaik untuk kenyamanan ibadah Anda.',
            'point1' => 'Hotel Dekat Masjid',
            'point2' => 'Muthawif Berpengalaman',
            'point3' => 'Pesawat Langsung',
            'point4' => 'Manasik Lengkap',
            'point5' => 'Pendampingan Maksimal',
            'image_url' => 'highlight1/sample.jpg' // pastikan file ini ada di storage/public
        ]);
    }
}
