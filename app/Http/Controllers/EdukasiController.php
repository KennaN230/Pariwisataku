<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;

class EdukasiController extends Controller
{
    // Menampilkan semua data edukasi
    public function index()
    {
        $edukasi = Edukasi::all();
        return view('edukasi', compact('edukasi'));
    }

    // Menampilkan detail dari satu destinasi edukasi
    public function show($id)
    {
        $item = Edukasi::findOrFail($id);
        return view('edukasi', compact('item'));
    }
}
