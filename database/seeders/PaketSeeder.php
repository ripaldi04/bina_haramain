<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket; 

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paket::create([
            'nama_paket' => 'Haji Furada Paket Bintang Tiga',
            'harga' => 20000,
            'keberangkatan' => '2025-05-22',
            'jenis' => 'haji',
            'hotel_mekkah' => 'Hotel Mekkah Bintang 3',
            'hotel_madinah' => 'Hotel Madinah Bintang 3',
            'maskapai' => 'Garuda Indonesia',
            'bandara' => 'Soekarno Hatta',
            'gambar' => 'images/DetailB3.png',
        ]);    }
}
