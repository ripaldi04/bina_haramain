<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama', 'hotel_makkah', 'hotel_madinah', 'maskapai', 'maktab',
        'handling_bandara', 'makan', 'harga', 'gambar'
    ];
}
