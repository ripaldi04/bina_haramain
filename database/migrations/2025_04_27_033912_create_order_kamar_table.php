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
        Schema::create('order_kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_paket_id')->constrained('order_paket')->onDelete('cascade');
            $table->foreignId('tipe_kamar_id')->constrained('tipe_kamar')->onDelete('cascade');
            $table->unsignedInteger('jumlah_kamar'); // Jumlah kamar per tipe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_kamar');
    }
};
