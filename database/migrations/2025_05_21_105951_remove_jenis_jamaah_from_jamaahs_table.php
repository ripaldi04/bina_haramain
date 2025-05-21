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
        Schema::table('jamaahs', function (Blueprint $table) {
            $table->dropColumn('jenis_jamaah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jamaahs', function (Blueprint $table) {
            $table->string('jenis_jamaah')->nullable(); // sesuaikan tipe dan nullable jika perlu
        });
    }
};
