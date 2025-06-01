<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/RandomApiClient.php';

$client = new RandomApiClient('http://localhost:8000');

echo "Генерируем случайное число...\n";
$result = $client->generate();

if (isset($result['id'])) {
    echo "Получен ID: {$result['id']}, Число: {$result['number']}\n";

    echo "Получаем число по ID...\n";
    $id = $result['id'];
    $getResult = $client->get($id);

    if (isset($getResult['number'])) {
        echo "Число по ID {$id}: {$getResult['number']}\n";
    } else {
        echo "Ошибка при получении числа по ID\n";
        print_r($getResult);
    }
} else {
    echo "Ошибка при генерации числа\n";
    print_r($result);
}