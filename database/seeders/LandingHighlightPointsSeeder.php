<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingHighlightPointsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('landing_highlights_points')->insert([
            [
                'title' => 'Pelayanan Terbaik',
                'deskripsi' => 'Kami memberikan pelayanan terbaik dengan tim profesional dan berpengalaman.',
                'image_url' => 'highlight-point1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Akomodasi Nyaman',
                'deskripsi' => 'Penginapan bintang 4 dan 5 yang nyaman dan dekat dengan Masjidil Haram.',
                'image_url' => 'highlight-point2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Legalitas Terjamin',
                'deskripsi' => 'Resmi terdaftar di Kemenag dengan izin umrah dan haji khusus.',
                'image_url' => 'highlight-point3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pelayanan Terbaik4',
                'deskripsi' => 'Kami memberikan pelayanan terbaik dengan tim profesional dan berpengalaman.4',
                'image_url' => 'highlight-point4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Akomodasi Nyaman5',
                'deskripsi' => 'Penginapan bintang 4 dan 5 yang nyaman dan dekat dengan Masjidil Haram.5',
                'image_url' => 'highlight-point5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Legalitas Terjamin6',
                'deskripsi' => 'Resmi terdaftar di Kemenag dengan izin umrah dan haji khusus.6',
                'image_url' => 'highlight-point6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
