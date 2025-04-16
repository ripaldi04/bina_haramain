<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('packages_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('packages_id');
            $table->date('departure_date')->nullable();
            $table->string('departure_airport')->nullable();
            $table->integer('program_days')->nullable();
            $table->enum('room_type', ['quad', 'double', 'triple']);
            $table->integer('room_count');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages_details');
    }
};
