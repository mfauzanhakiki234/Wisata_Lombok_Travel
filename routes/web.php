<?php

use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Rute otomatis untuk membuat tabel database via Vercel (Jangan dihapus dulu)
Route::get('/jalankan-migrasi-satelit', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return "Mantap! Semua tabel database berhasil dibuat di Neon.tech via Vercel!";
    } catch (\Exception $e) {
        return "Gagal migrasi: " . $e->getMessage();
    }
});

// Rute Baru: Halaman utama sekarang diatur oleh WisataController
Route::get('/', [WisataController::class, 'index']);