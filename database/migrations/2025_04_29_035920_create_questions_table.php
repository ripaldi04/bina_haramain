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
<<<<<<< HEAD:database/migrations/2025_04_09_054009_add_kode_referral_to_users_table.php
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'kode_referral')) {
                $table->string('kode_referral')->unique()->after('email');
            }
=======
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
>>>>>>> main:database/migrations/2025_04_29_035920_create_questions_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
