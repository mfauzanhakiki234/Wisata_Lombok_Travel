<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        try {
            $semuaWisata = Wisata::all();
        } catch (\Throwable $e) {
            $semuaWisata = collect([
                (object) [
                    'id' => 1,
                    'nama_wisata' => 'Pantai Kuta Lombok',
                    'lokasi' => 'Lombok Tengah',
                    'deskripsi' => 'Nikmati pasir putih dan panorama sunset yang memukau.',
                    'harga_tiket' => 50000,
                ],
                (object) [
                    'id' => 2,
                    'nama_wisata' => 'Gili Trawangan',
                    'lokasi' => 'Gili Islands',
                    'deskripsi' => 'Pulau kecil dengan air jernih dan suasana santai.',
                    'harga_tiket' => 75000,
                ],
            ]);
            $errorMessage = 'Gagal mengambil data wisata dari database. Menampilkan contoh data sementara.';
            return view('welcome', compact('semuaWisata', 'errorMessage'));
        }

        return view('welcome', compact('semuaWisata'));
    }

    public function show($id)
    {
        try {
            $wisata = Wisata::findOrFail($id);
        } catch (\Throwable $e) {
            return redirect('/');
        }

        return view('detail', compact('wisata'));
    }
}