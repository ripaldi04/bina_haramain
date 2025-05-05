<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingHighlight1 extends Model
{
    protected $table = 'landing_highlights1'; // <- Tambahkan ini

    protected $fillable = [
        'header',
        'deskripsi',
        'point1',
        'point2',
        'point3',
        'point4',
        'point5',
        'image_url',
    ];
}