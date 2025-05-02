<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;

    protected $table = 'tipe_kamar';

    protected $fillable = [
        'paket_id',
        'tipe',
        'harga',
    ];

    /**
     * Relasi ke paket
     */
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
