<?php

// 1. Paksa jalur penyimpanan sementara (Read-Write) ke folder /tmp Vercel
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

// 2. Otomatis buat struktur folder yang dibutuhkan Laravel di dalam /tmp
$required_folders = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/bootstrap/cache'
];

foreach ($required_folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

// 3. Alihkan penulisan bootstrap cache agar tidak mengunci serverless
putenv('BOOTSTRAP_CACHE_PATH=/tmp/storage/bootstrap/cache');

/* |--------------------------------------------------------------------------
| SUNTIKKAN KONFIGURASI STORAGE KE LARAVEL (PERBAIKAN EROR 500)
|--------------------------------------------------------------------------
*/
// Ambil inisialisasi aplikasi Laravel asli
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Paksa Laravel menggunakan folder /tmp untuk menulis data runtime
$app->useStoragePath('/tmp/storage');

// Jalankan kernel Laravel untuk memproses request halaman
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);