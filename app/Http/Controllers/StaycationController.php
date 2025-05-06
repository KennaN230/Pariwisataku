<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penginapan;

class StaycationController extends Controller
{
    public function index()
    {
        $penginapan = Penginapan::all();
        return view('staycation', compact('penginapan'));
    }
}
