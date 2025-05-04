<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'landing_galeri'; // Sesuaikan ke nama tabel kamu

    protected $fillable = [
        'image1_url',
        'image2_url',
        'image3_url',
        'image4_url',
        'image5_url',
        'image6_url',
        'image7_url',
        'image8_url',
        'title',
        'deskripsi',
    ];
}