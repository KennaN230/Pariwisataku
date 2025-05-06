<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    protected $table = 'budaya';
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'kategori', 'jadwal', 'tiket'];
}
