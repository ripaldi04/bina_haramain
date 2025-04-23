<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LandingHighlight2;

class LandingHighlight2Seeder extends Seeder
{
    public function run(): void
    {
        if (!LandingHighlight2::exists()) {
            LandingHighlight2::create([
                'header' => 'Mengapa Harus Pilih PT. Bina Haramain?',
                'deskripsi' => 'PT. Bina Haramain adalah perusahaan travel profesional dengan pengalaman 3 tahun dalam penyelenggaraan perjalanan haji...',
                'image_url' => 'highlight2/default.png',
            ]);
        }
    }
}
