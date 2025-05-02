<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'landing_fasilitas';

    // Kolom yang bisa diisi secara massal
    // app/Models/Fasilitas.php
    protected $fillable = ['title', 'deskripsi', 'image_url'];
}