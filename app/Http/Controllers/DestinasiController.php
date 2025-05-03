<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class DestinasiController extends Controller
{
    public function index()
    {
        $data = Destinasi::all();
        return response()->json($data);
    }
}
