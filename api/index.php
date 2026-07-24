<?php

// Mengatur direktori penyimpanan agar mengarah ke /tmp Vercel yang writable
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_VIEW_COMPARED_PATH'] = '/tmp';

// Otomatis buat database SQLite dan jalankan migrate jika belum ada
$dbPath = '/tmp/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
    
    // Boot Laravel secara minimal untuk menjalankan migrate
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->call('migrate', ['--force' => true]);
}

require __DIR__ . '/../public/index.php';