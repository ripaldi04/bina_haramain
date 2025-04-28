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
        Schema::create('order_paket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained('paket')->onDelete('cascade');
            $table->foreignId('detail_paket_id')->constrained('detail_paket')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('total_harga', 15, 2)->default(0);  // Total harga berdasarkan kamar yang dipilih
            $table->string('nama_pemesan')->nullable();
            $table->enum('jenis_kelamin_pemesan', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('telepon_pemesan')->nullable();
            $table->string('email_pemesan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_paket');
    }
};
