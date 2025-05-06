<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oleh2 extends Model
{
    protected $table = 'oleh-oleh'; // atau ubah ke 'oleh_oleh' jika memungkinkan
    protected $fillable = ['nama', 'lokasi', 'rating', 'gambar'];
}
