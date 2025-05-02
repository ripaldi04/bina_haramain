<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cek apakah user test@example.com sudah ada
        if (!User::where('email', 'test@example.com')->exists()) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'kode_referral' => Str::upper(Str::random(6)),
            ]);
        }

        // Panggil seeder lainnya
        $this->call([
            LandingBannerSeeder::class,
        ]);

        $this->call([
            LandingHighlight1Seeder::class,
        ]);

        $this->call([
            LandingHotDealSeeder::class,
        ]);

    }
}
