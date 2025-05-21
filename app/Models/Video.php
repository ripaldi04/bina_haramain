<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    // Menentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'title',
        'youtube_id',
        'description',
    ];
}