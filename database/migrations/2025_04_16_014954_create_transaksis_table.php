<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('jenis_kamar');
            $table->integer('jumlah_pax');
            $table->date('tanggal_keberangkatan');
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->text('alamat');
            $table->timestamps();
        });
    }
};
