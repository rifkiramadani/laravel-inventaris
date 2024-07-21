<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index() {
        $peminjams = Peminjam::all(); 
        return view('peminjam.index');
    }
}
