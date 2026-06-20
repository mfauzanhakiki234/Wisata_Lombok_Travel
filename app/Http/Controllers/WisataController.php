<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    // Menampilkan semua data wisata di halaman depan
    public function index()
    {
        $semuaWisata = Wisata::all();
        return view('welcome', compact('semuaWisata'));
    }

    // BARU: Menampilkan halaman detail wisata berdasarkan ID
    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('detail', compact('wisata'));
    }
}