<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('landing_keunggulan', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url')->nullable(); // Menjadikan image_url nullable
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landing_keunggulan');
    }
};
