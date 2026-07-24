<?php

// Mengatur direktori penyimpanan agar mengarah ke /tmp Vercel yang writable
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp';

require __DIR__ . '/../public/index.php';