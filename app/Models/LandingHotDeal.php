<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingHotDeal extends Model
{
    use HasFactory;

    protected $table = 'landing_hot_deal'; // sesuaikan nama tabelnya!

    protected $fillable = [
        'title',
        'subtitle',
        'deskripsi',
        'image_url',
    ];
}