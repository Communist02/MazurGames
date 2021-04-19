<?php

require_once __DIR__ . '/php/functions.php';
startSession();

ini_set('display_errors', '1'); // Установка значения конфигурации PHP для отображения ошибок на экране

require_once './router.php'; // Подключение файла с классами

$routesConfig = include __DIR__ . '/routes-config.php'; // Подключение этого файла с присвоением, вернет массив
$uri = $_SERVER['REQUEST_URI']; // Про REQUEST_URI https://www.php.net/manual/ru/reserved.variables.server.php

$router = new Router($routesConfig); // Создание объекта класса Router
$route = $router->match($uri); // Получение текущего роута (машрута)

if ($route) {
    $filepath = $route->filepath;
    $status = 200; // OK
} else {
    $filepath = __DIR__ . '/pages/404.php'; // Если маршрут не удалось найти, тогда страница со статусом 404
    $status = 404; // Not found
}

http_response_code($status); // Отправляем в ответе HTTP статус код.

require_once $filepath; // Подключаем файл
