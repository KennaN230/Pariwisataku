<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    protected $table = 'penginapan';
    protected $fillable = [
        'nama', 'lokasi', 'gambar', 'deskripsi', 'harga', 'rating', 'fasilitas', 'link_maps'
    ];

    protected $casts = [
        'fasilitas' => 'array',
    ];
}
