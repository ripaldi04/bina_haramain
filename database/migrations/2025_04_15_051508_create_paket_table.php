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
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['haji', 'umrah']); // Haji atau Umrah
            $table->string('nama_paket');
            $table->date('keberangkatan')->nullable();
            $table->string('hotel_mekkah')->nullable();
            $table->string('hotel_madinah')->nullable();
            $table->string('maskapai')->nullable();
            $table->string('bandara')->nullable();
            $table->bigInteger('harga')->nullable();
            $table->string('gambar')->nullable(); // nama file gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket');
    }
};
