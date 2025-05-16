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
            $table->decimal('diskon', 10, 2)->default(0)->after('total_harga');
            $table->unsignedBigInteger('referral_user_id')->nullable()->after('diskon');
            $table->foreign('referral_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_paket', function (Blueprint $table) {
            $table->dropForeign(['referral_user_id']);
            $table->dropColumn(['diskon', 'referral_user_id']);
        });
    }
};
