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
$_SERVER['APP_STORAGE'] = '/tmp/storage';

// Pastikan folder cache dan storage di /tmp tersedia
$tmpDirs = [
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Gunakan SQLite di /tmp agar Vercel bisa menulis database saat runtime
$tmpSqlite = '/tmp/database.sqlite';
if (!file_exists($tmpSqlite)) {
    touch($tmpSqlite);
    chmod($tmpSqlite, 0666);
}

$runtimeEnv = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => $tmpSqlite,
    'SESSION_DRIVER' => 'file',
    'CACHE_STORE' => 'file',
    'QUEUE_CONNECTION' => 'sync',
    'FILESYSTEM_DISK' => 'local',
    'LOG_CHANNEL' => 'stack',
];

if (empty(getenv('APP_KEY')) && empty($_ENV['APP_KEY']) && empty($_SERVER['APP_KEY'])) {
    $runtimeEnv['APP_KEY'] = 'base64:MWVnU0Z4aXIzQkV0b1paV2ljc1pYRVRXS0RkU1ZxU3M=';
}

foreach ($runtimeEnv as $key => $value) {
    putenv("{$key}={$value}");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$publicIndex = __DIR__ . '/../public/index.php';
if (!file_exists($publicIndex)) {
    header('Content-Type: text/plain; charset=utf-8', true, 500);
    echo "ERROR: public/index.php tidak ditemukan. Path: {$publicIndex}";
    exit;
}

try {
    require $publicIndex;
} catch (\Throwable $e) {
    header('Content-Type: text/plain; charset=utf-8', true, 500);
    echo "ERROR Laravel boot failed:\n";
    echo $e->getMessage() . "\n";
    echo $e->getTraceAsString();
    exit;
}