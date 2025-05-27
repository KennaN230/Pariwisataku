<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WisataAlam;
use App\Models\Budaya;
use App\Models\Penginapan;
use App\Models\Kuliner;

class HomeController extends Controller
{

    public function index()
{
    return view('dashboard', [
        'alam' => WisataAlam::where('rating', '>', 4)->take(1)->get(), // Contoh dengan kondisi rating
        'kuliner' => Kuliner::all(),
        'budaya' => Budaya::all(),
        'penginapan' => Penginapan::all()
    ]);
}
}
