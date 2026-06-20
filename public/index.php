<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Cek apakah aplikasi sedang dalam mode pemeliharaan (Maintenance Mode)
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