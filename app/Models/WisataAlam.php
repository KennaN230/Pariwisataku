<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataAlam extends Model
{
    use HasFactory;

    // Beritahu Laravel bahwa tabel yang digunakan adalah 'alam'
    protected $table = 'alam';

    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'gambar',
        'rating',
    ];
}
