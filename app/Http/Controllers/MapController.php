<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
use App\Models\WisataAlam;
use App\Models\Kuliner;
use App\Models\Oleh2;

class MapController extends Controller
{
    public function index()
    {
        $edukasi = Edukasi::select('nama', 'deskripsi', 'latitude', 'longitude')->get();
        $alam = WisataAlam::select('nama', 'deskripsi', 'latitude', 'longitude')->get();
        $kuliner = Kuliner::select('nama', 'deskripsi', 'latitude', 'longitude')->get();
        $oleh2 = Oleh2::select('nama', 'deskripsi', 'latitude', 'longitude')->get();

        return view('petainteraktif', compact('edukasi', 'alam', 'kuliner', 'oleh2'));
    }
}