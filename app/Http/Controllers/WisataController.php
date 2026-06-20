<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    // Fungsi untuk menampilkan semua data wisata di halaman depan
    public function index()
    {
        $semuaWisata = Wisata::all();
        return view('welcome', compact('semuaWisata'));
    }
}