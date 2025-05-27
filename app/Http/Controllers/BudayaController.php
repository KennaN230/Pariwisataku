<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;

class BudayaController extends Controller
{
    public function index()
    {
        $budaya = Budaya::all(); // Ambil semua data budaya
        return view('budaya', compact('budaya')); // Kirim data budaya ke view
    }
}
