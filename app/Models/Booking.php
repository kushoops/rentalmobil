<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $fillable = [
        'userid',
        'nama',
        'telp',
        'email',
        'alamat',
        'tglmulaisewa',
        'tglakhirsewa',
        'mobil',
        'platno',
        'driver',
        'total',
        'pembayaran',
    ];
}
