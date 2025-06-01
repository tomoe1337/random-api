<?php
namespace App\Controller;

use App\Service\RandomService;
use App\Response\JsonResponse;

class RandomController {
    private RandomService $randomService;

    public function __construct(RandomService $randomService) {
        $this->randomService = $randomService;
    }

    public function generate() {
        $result = $this->randomService->generate();
        return new JsonResponse($result);
    }

    public function get(int $id) {
        $result = $this->randomService->getById($id);
        if ($result === null) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }
        return new JsonResponse($result);
    }
}