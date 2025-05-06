<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;

class KulinerController extends Controller
{
    public function index()
{
    $kuliners = Kuliner::all(); // Model Kuliner
    return view('kuliner', compact('kuliners'));
}

}
