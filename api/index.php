<?php

// Buat folder storage darurat di dalam /tmp Linux Vercel
$storageFolders = [
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs'
];

foreach ($storageFolders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

// Beritahu Laravel untuk menggunakan path storage darurat ini
putenv('APP_STORAGE=/tmp/storage');
$_ENV['APP_STORAGE'] = '/tmp/storage';

// Teruskan ke public index Laravel bawaan
require __DIR__ . '/../public/index.php';