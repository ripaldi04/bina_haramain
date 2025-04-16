<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/PackageDetail.php
class PackageDetail extends Model
{
    protected $table = 'packages_details';

    protected $fillable = [
        'packages_id',
        'departure_date',
        'departure_airport',
        'program_days',
        'room_type',
        'room_count',
        'created_at',
    ];

    public $timestamps = false; // karena kamu pakai created_at manual
}
