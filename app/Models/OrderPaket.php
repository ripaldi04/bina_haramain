<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderPaket extends Model
{
    use HasFactory;

    // Nama tabel (jika tidak sesuai konvensi plural)
    protected $table = 'order_paket';

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'paket_id',
        'detail_paket_id',
        'user_id',
        'total_harga',
        'nama_pemesan',
        'jenis_kelamin_pemesan',
        'telepon_pemesan',
        'email_pemesan',
        'catatan',
    ];

    // Relasi ke tabel Paket
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    // Relasi ke tabel DetailPaket
    public function detailPaket()
    {
        return $this->belongsTo(DetailPaket::class, 'detail_paket_id');
    }

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderKamar()
    {
        return $this->hasMany(OrderKamar::class);
    }
    public function jamaah()
    {
        return $this->hasMany(Jamaah::class, 'order_paket_id');
    }

}
