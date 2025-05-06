<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    protected $fillable = [
        'nama', 'deskripsi', 'gambar', 'jadwal', 'tiket'
    ];
}
