<?php

// Paksa folder penyimpanan Laravel ke direktori /tmp milik Vercel
unset($_ENV['APP_ENV']);
$appPath = __DIR__ . '/../bootstrap/app.php';
if (file_exists($appPath)) {
    $_ENV['APP_STORAGE'] = '/tmp/storage';
    if (!is_dir('/tmp/storage/framework/views')) {
        mkdir('/tmp/storage/framework/views', 0755, true);
    }
}
// --- CONFIG VERCEL SERVERLESS STORAGE ---
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');
putenv('LOG_CHANNEL=stderr');

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
putenv('BOOTSTRAP_CACHE_PATH=/tmp/storage/bootstrap/cache');
// --- END CONFIG VERCEL ---

define('LARAVEL_START', microtime(true));

// Determine if the application is under maintenance...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
$app = require_once __DIR__.'/../bootstrap/app.php';

// Force Laravel to use Vercel temporary storage path
$app->useStoragePath('/tmp/storage');

$app->handleRequest(
    Illuminate\Http\Request::capture()
);