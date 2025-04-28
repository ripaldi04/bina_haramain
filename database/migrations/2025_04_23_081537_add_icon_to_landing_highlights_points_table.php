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
    Schema::table('landing_highlights_points', function (Blueprint $table) {
        $table->string('icon')->nullable()->after('deskripsi');
    });
}

public function down(): void
{
    Schema::table('landing_highlights_points', function (Blueprint $table) {
        $table->dropColumn('icon');
    });
}

};
