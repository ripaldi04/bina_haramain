<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LandingMuthawifSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('landing_muthawif')->insert([
            [
                'nama' => 'Ust. Ahmad Fauzi',
                'daerah' => 'Bandung',
                'image_url' => 'landing_muthawif/ust_ahmad_fauzi.jpg',
                'background_image_url' => 'landing_muthawif/bg_ust_ahmad_fauzi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Ust. Hendra Saputra',
                'daerah' => 'Jakarta',
                'image_url' => 'landing_muthawif/ust_hendra_saputra.jpg',
                'background_image_url' => 'landing_muthawif/bg_ust_hendra_saputra.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Ust. Syaiful Anwar',
                'daerah' => 'Surabaya',
                'image_url' => 'landing_muthawif/ust_syaiful_anwar.jpg',
                'background_image_url' => 'landing_muthawif/bg_ust_syaiful_anwar.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
