<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oleh2;

class Oleh2Controller extends Controller
{
    public function index()
    {
        $oleh = Oleh2::all();
        return view('oleh2', compact('oleh'));
    }
}
