<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pakets', function (Blueprint $table) {
        $table->string('hotel_makkah')->nullable();
        $table->string('hotel_madinah')->nullable();
        $table->string('maskapai')->nullable();
        $table->string('maktab')->nullable();
        $table->string('handling_bandara')->nullable();
        $table->string('makan')->nullable();
        $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pakets', function (Blueprint $table) {
            $table->dropColumn([
                'hotel_makkah',
                'hotel_madinah',
                'maskapai',
                'maktab',
                'handling_bandara',
                'makan',
                'gambar'
            ]);
        });
    }
};
