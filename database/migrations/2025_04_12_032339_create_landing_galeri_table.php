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
        Schema::create('landing_galeri', function (Blueprint $table) {
            $table->id();
            $table->string('image1_url');
            $table->string('image2_url');
            $table->string('image3_url');
            $table->string('image4_url');
            $table->string('image5_url');
            $table->string('image6_url');
            $table->string('image7_url');
            $table->string('image8_url');
            $table->string('title');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_galeri');
    }
};
