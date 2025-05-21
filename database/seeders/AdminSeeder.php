<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; // pastikan namespace User sudah benar

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@binaharamain.com',
            'password' => Hash::make('kohdenislim'), // ganti sesuai kebutuhan
            'role' => 'admin', // pastikan ada kolom role di tabel users
            'remember_token' => Str::random(10),
        ]);
    }
}
