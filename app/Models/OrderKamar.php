<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderKamar extends Model
{
    use HasFactory;

    // Nama tabel (jika tidak sesuai konvensi plural)
    protected $table = 'order_kamar';

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'order_paket_id',
        'tipe_kamar_id',
        'jumlah_kamar',
    ];

    // Relasi ke tabel OrderPaket
    public function orderPaket()
    {
        return $this->belongsTo(OrderPaket::class);
    }

    // Relasi ke tabel TipeKamar
    public function tipeKamar()
    {
        return $this->belongsTo(TipeKamar::class);
    }
    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class, 'order_kamar_id');
    }
}
