<?php

namespace App\Http\Controllers;

use App\Models\WisataAlam;
use Illuminate\Http\Request;

class WisataAlamController extends Controller
{
    public function index()
    {
        $alam = WisataAlam::all();
        return view('alam', compact('alam'));
    }
}
