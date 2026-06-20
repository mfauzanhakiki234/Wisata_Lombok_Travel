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

// 4. Panggil file index utama Laravel
require __DIR__ . '/../public/index.php';