<?php

class RandomApiClient {
    private string $baseUrl;

    public function __construct(string $baseUrl) {
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function generate(): array {
        $ch = curl_init($this->baseUrl . '/api/random');
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $response = curl_exec($ch);

        if ($response === false) {
            curl_close($ch);
            return ['error' => 'cURL error: ' . curl_error($ch)];
        }

        curl_close($ch);

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'JSON decode error', 'raw_response' => $response];
        }

        return $data;
    }
    public function get(int $id): array {
        $url = $this->baseUrl . "/api/get?id={$id}";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $response = curl_exec($ch);

        if ($response === false) {
            curl_close($ch);
            return ['error' => 'cURL error: ' . curl_error($ch)];
        }

        curl_close($ch);

        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return ['error' => 'JSON decode error', 'raw_response' => $response];
        }

        return $data;
    }
}