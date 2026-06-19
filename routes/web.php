<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Halaman utama portal berita wisata
Route::get('/', [TaskController::class, 'index']);

// Proses Simpan Berita Wisata Baru (Create)
Route::post('/wisata', [TaskController::class, 'store'])->name('tasks.store');

// Proses Hapus Berita Wisata (Delete)
Route::delete('/wisata/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');