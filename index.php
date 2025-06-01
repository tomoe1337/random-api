<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_starts_with($uri, '/api/')) {
    require_once __DIR__ . '/api.php';
} else {
    require_once __DIR__ . '/public/index.php';
}