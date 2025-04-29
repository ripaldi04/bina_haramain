<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'landing_galeri'; // <-- kasih tau nama tabel yang benar

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
