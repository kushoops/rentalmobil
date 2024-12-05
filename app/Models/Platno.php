<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platno extends Model
{
    /** @use HasFactory<\Database\Factories\PlatnoFactory> */
    use HasFactory;

    protected $fillable = [
        'mobil',
        'platno',
        'ready',
    ];
}
