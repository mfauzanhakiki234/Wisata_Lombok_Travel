<?php

// 1. Pindahkan folder cache & view Laravel ke folder /tmp bawaan Vercel (Read-Write)
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

// Buat folder temporary jika belum ada
if (!is_dir('/tmp/storage/framework/views')) {
    mkdir('/tmp/storage/framework/views', 0755, true);
}

// 2. Jalankan aplikasi Laravel melalui folder public
require __DIR__ . '/../public/index.php';