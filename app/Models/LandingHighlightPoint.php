<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingHighlightPoint extends Model
{
    use HasFactory;

    protected $table = 'landing_highlights_points';

    protected $fillable = [
        'title',
        'deskripsi',
        'image_url',
    ];
}
