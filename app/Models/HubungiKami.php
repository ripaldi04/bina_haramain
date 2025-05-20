<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    use HasFactory;

    protected $table = 'hubungi_kami';

    protected $fillable = [
        'layanan',
        'deskripsi',
        'alamat',
        'no_cs_1',
        'no_cs_2',
        'email_1',
        'email_2',
        'gambar',
    ];
}
