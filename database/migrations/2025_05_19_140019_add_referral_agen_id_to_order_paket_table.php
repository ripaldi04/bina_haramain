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
        Schema::table('order_paket', function (Blueprint $table) {
            $table->unsignedBigInteger('referral_agen_id')->nullable()->after('referral_user_id');
            $table->foreign('referral_agen_id')->references('id')->on('agens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_paket', function (Blueprint $table) {
            $table->dropForeign(['referral_agen_id']);
            $table->dropColumn('referral_agen_id');
        });
    }
};
