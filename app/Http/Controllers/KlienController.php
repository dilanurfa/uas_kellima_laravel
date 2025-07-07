<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;

class KlienController extends Controller
{
    public function index()
    {
        $Ruangan = Ruangan::all();
        return view('welcome', compact('Ruangan'));
    }

    public function dashboard()
    {
        return view('klien.dashboard');
    }


    
}
