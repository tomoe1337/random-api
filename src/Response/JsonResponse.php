<?php

namespace App\Response;

class JsonResponse {
    private mixed $data;
    private int $statusCode;

    public function __construct(mixed $data, int $statusCode = 200) {
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function send(): void {
        http_response_code($this->statusCode);
        header('Content-Type: application/json');
        echo json_encode($this->data);
        exit;
    }
}