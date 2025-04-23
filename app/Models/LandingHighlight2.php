<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingHighlight2 extends Model
{
    use HasFactory;

    protected $table = 'landing_highlights2'; 
    protected $fillable = [
        'header',
        'deskripsi',
        'image_url',
    ];
}
