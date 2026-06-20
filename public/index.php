<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Buat storage /tmp writable di Vercel
$storageFolders = [
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/testing',
    '/tmp/storage/logs',
];
foreach ($storageFolders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }
}

// Pastikan environment runtime masih menggunakan /tmp dan SQLite saat di Vercel
$runtimeEnv = [
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true',
    'APP_STORAGE' => '/tmp/storage',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => '/tmp/database.sqlite',
    'SESSION_DRIVER' => 'file',
    'CACHE_STORE' => 'file',
    'QUEUE_CONNECTION' => 'sync',
    'FILESYSTEM_DISK' => 'local',
];

if (empty(getenv('APP_KEY')) && empty($_ENV['APP_KEY']) && empty($_SERVER['APP_KEY'])) {
    $runtimeEnv['APP_KEY'] = 'base64:MWVnU0Z4aXIzQkV0b1paV2ljc1pYRVRXS0RkU1ZxU3M=';
}

foreach ($runtimeEnv as $key => $value) {
    putenv("{$key}={$value}");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

if (!file_exists($runtimeEnv['DB_DATABASE'])) {
    touch($runtimeEnv['DB_DATABASE']);
    chmod($runtimeEnv['DB_DATABASE'], 0666);
}

// Cek apakah aplikasi sedang dalam mode pemeliharaan
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registrasi Autoloader Composer
require __DIR__.'/../vendor/autoload.php';

// Jalankan Aplikasi Laravel
/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$request = Request::capture();

$response = $app->handle($request);

$response->send();

$app->terminate($request, $response);