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
        Schema::create('hubungi_kami', function (Blueprint $table) {
            $table->id();
            $table->string('layanan'); // misalnya nama layanan atau label
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_cs_1')->nullable();
            $table->string('no_cs_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubungi_kami');
    }
};
