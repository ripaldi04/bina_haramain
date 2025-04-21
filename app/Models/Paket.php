<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'kode_paket',
        'jenis',
        'nama_paket',
        // 'keberangkatan',
        'program_hari',        
        'hotel_mekkah',
        'hotel_madinah',
        'maskapai',
        'bandara',
        'harga',
        'gambar',
    ];

    public function detail_Paket()
    {
        return $this->hasMany(DetailPaket::class, 'paket_id');
    }

}
