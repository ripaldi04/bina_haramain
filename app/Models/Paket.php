<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'kode_paket',
        'jenis',
        'nama_paket',
        'keberangkatan',
        'hotel_mekkah',
        'hotel_madinah',
        'maskapai',
        'bandara',
        'harga',
        'gambar',
    ];
}
