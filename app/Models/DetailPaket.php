<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPaket extends Model
{
    protected $table = 'detail_paket';

    protected $fillable = [
        'paket_id',
        'tanggal_keberangkatan',
        'jumlah_seat',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
