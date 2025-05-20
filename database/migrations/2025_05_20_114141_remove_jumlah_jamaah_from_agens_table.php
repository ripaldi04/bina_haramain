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
        Schema::table('agens', function (Blueprint $table) {
            Schema::table('agens', function (Blueprint $table) {
                $table->dropColumn('jumlah_jamaah');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agens', function (Blueprint $table) {
            Schema::table('agens', function (Blueprint $table) {
                $table->integer('jumlah_jamaah')->default(0);
            });
        });
    }
};
