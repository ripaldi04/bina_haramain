<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jamaahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_paket_id')->constrained('order_paket')->onDelete('cascade'); // Relasi ke OrderPaket
            $table->foreignId('order_kamar_id')->constrained('order_kamar')->onDelete('cascade'); // Relasi ke OrderKamar
            $table->string('nama');
            $table->string('jenis_jamaah');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaahs');
    }
};
