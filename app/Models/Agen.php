<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'agens'; // nama tabel, opsional kalau sudah default (agens)

    protected $fillable = [
        'name',
        'email',
        'phone',
        'kode',
        'jumlah_jamaah',
    ];
    public function orderPaket()
    {
        return $this->hasMany(OrderPaket::class, 'referral_agen_id');
    }
    // Agen.php
    public function getJumlahJamaahAttribute()
    {
        return $this->orderPaket->sum(function ($order) {
            return $order->jamaah->count();
        });
    }

}
