<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingMuthawif extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'landing_muthawif';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama',
        'daerah',
        'image_url',
    ];
}