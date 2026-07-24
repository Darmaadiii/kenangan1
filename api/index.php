<?php

// Mengatur direktori penyimpanan agar mengarah ke /tmp Vercel yang writable
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp'; // Pastikan kuncinya VIEW_COMPILED_PATH

// Otomatis buat database SQLite dan jalankan migrate jika belum ada
$dbPath = '/tmp/database.sqlite';
if (!file_exists($dbPath)) {
    touch($dbPath);
    
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->call('migrate', ['--force' => true]);
}

require __DIR__ . '/../public/index.php';