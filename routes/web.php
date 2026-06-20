<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;

// Pastikan rute utama '/' mengarah ke WisataController, BUKAN langsung ke view
Route::get('/', [WisataController::class, 'index']);