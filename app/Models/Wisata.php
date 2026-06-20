<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    // Paksa model ini untuk membaca tabel 'wisatas' yang ada di Neon.tech
    protected $table = 'wisatas';

    // Izinkan semua kolom diisi data
    protected $guarded = [];
}
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang ada di database
    protected $table = 'wisatas';

    // Daftarkan kolom yang boleh diisi data
    protected $fillable = [
        'nama_wisata',
        'lokasi',
        'deskripsi',
        'gambar',
        'harga_tiket'
    ];
}