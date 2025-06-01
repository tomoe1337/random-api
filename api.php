<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Service\RandomService;
use App\Repository\RandomRepository;

header('Content-Type: application/json');

$repository = new RandomRepository();
$service = new RandomService($repository);

$requestUri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && $requestUri === '/api/random') {
    $result = $service->generate();
    echo json_encode($result);
} elseif ($method === 'GET' && str_starts_with($requestUri, '/api/get')) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid ID']);
    } else {
        $result = $service->getById($id);
        if ($result !== null) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Not found']);
        }
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found']);
}