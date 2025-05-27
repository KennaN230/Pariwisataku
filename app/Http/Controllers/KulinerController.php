<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::latest()->get(); // Get all with latest first
        return view('kuliner', compact('kuliners'));
    }
    
    public function show($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        return view('kuliner.show', compact('kuliner'));
    }
}