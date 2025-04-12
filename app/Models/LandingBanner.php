<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandingBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'header1', 'header2', 'deskripsi', 'image_url',
    ];
}
