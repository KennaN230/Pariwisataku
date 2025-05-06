<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;

class BudayaController extends Controller
{
    public function index()
    {
        $budaya = Budaya::all();
        return view('budaya', compact('budaya'));
    }
}
