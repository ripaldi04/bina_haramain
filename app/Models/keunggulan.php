<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keunggulan extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'landing_keunggulan';  // Pastikan nama tabel sesuai dengan yang ada di database

    // Tentukan kolom yang boleh diisi
    protected $fillable = ['title', 'image_url'];
}