<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        Wisata::create([
            'nama_wisata' => 'Pantai Senggigi',
            'lokasi' => 'Lombok Barat',
            'deskripsi' => 'Pantai dengan garis pantai yang panjang dan gradasi pasir hitam-putih yang memukau. Sangat cocok untuk menikmati matahari terbenam.',
            'harga_tiket' => 15000,
        ]);

        Wisata::create([
            'nama_wisata' => 'Gili Trawangan',
            'lokasi' => 'Lombok Utara',
            'deskripsi' => 'Pulau bebas polusi kendaraan bermotor dengan air laut super jernih, terumbu karang yang indah, dan kehidupan malam yang seru.',
            'harga_tiket' => 50000,
        ]);

        Wisata::create([
            'nama_wisata' => 'Bukit Merese',
            'lokasi' => 'Lombok Tengah',
            'deskripsi' => 'Bukit hijau luas yang langsung menghadap ke Samudra Hindia. Tempat terbaik untuk menikmati keindahan Tanjung Aan dari ketinggian.',
            'harga_tiket' => 10000,
        ]);
    }
}