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
        Schema::table('order_paket', function (Blueprint $table) {
            $table->enum('jenis_pembayaran', ['booking', 'dp', 'cash'])->nullable();
            $table->integer('jumlah_dibayar')->default(0);  // Menyimpan sebagai integer tanpa angka desimal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
