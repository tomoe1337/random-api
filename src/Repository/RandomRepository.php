<?php

namespace App\Repository;

class RandomRepository {
    private string $storageFile;

    public function __construct(string $storageFile = __DIR__ . '/../../data/storage.json') {
        $this->storageFile = $storageFile;
        if (!file_exists($storageFile)) {
            file_put_contents($storageFile, json_encode([]));
        }
    }

    public function save(int $id, int $number): void {
        $data = $this->getAll();
        $data[$id] = $number;
        file_put_contents($this->storageFile, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function get(int $id): ?int {
        return $this->getAll()[$id] ?? null;
    }

    private function getAll(): array {
        return json_decode(file_get_contents($this->storageFile), true) ?: [];
    }
}