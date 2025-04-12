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
        Schema::create('landing_highlights1', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('point1');
            $table->string('point2');
            $table->string('point3');
            $table->string('point4');
            $table->string('point5');
            $table->text('deskripsi');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_highlights1');
    }
};
