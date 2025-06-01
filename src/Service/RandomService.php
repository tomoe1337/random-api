<?php

namespace App\Service;

use App\Repository\RandomRepository;

class RandomService {
    private RandomRepository $repository;

    public function __construct(RandomRepository $repository) {
        $this->repository = $repository;
    }

    public function generate(): array {
        $id = rand(100000, 999999);
        $number = rand(0, PHP_INT_MAX);
        $this->repository->save($id, $number);
        return ['id' => $id, 'number' => $number];
    }

    public function getById(int $id): ?array {
        $number = $this->repository->get($id);
        return $number !== null ? ['id' => $id, 'number' => $number] : null;
    }
}