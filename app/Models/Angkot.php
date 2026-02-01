<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkot extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_angkot',
        'warna_mobil',
        'jurusan',
        'jalur_rute',
        'harga',
        'latitude',
        'longitude'
    ];
    protected $casts = [
        'route_coords' => 'array'
    ];
}
