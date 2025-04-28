<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_paket_id', // Relasi ke OrderPaket
        'order_kamar_id', // Relasi ke OrderKamar
        'nama', // Nama Jamaah
        'jenis_jamaah', // Jenis Jamaah (Jamaah Baru, Sesuai Pemesan)
        'jenis_kelamin', // Jenis Kelamin Jamaah
    ];

    /**
     * Relasi ke OrderPaket
     */
    public function orderPaket()
    {
        return $this->belongsTo(OrderPaket::class, 'order_paket_id');
    }

    /**
     * Relasi ke OrderKamar
     */
    public function orderKamar()
    {
        return $this->belongsTo(OrderKamar::class, 'order_kamar_id');
    }
}
