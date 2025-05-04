<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'landing_question'; // Penting karena default Laravel pakai bentuk jamak (plural)

    protected $fillable = [
        'title',
        'deskripsi',
    ];
}