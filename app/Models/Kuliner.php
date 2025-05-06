<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $table = 'kuliners'; // sesuaikan nama tabel di database
    protected $fillable = ['nama', 'lokasi', 'rating', 'gambar'];
}
