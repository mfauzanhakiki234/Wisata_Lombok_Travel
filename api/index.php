<?php

// 1. Paksa jalur penyimpanan sementara (Read-Write) ke folder /tmp Vercel
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

// 2. Otomatis buat struktur folder runtime yang dibutuhkan Laravel 12 di /tmp
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

// 3. Alihkan penulisan bootstrap cache
putenv('BOOTSTRAP_CACHE_PATH=/tmp/storage/bootstrap/cache');

// 4. Muat Autoloader Vendor Composer Modern
require __DIR__ . '/../vendor/autoload.php';

// 5. Jalankan Aplikasi Laravel via bootstrap/app.php
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 6. Paksa Laravel menggunakan storage dinamis Vercel
$app->useStoragePath('/tmp/storage');

// 7. Handle Request ke Browser
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);