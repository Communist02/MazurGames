<?php

// Конфигурационный файл для роутера.
// Здесь описаны все маршруты, которые роутер будет обслуживать.

return [ // Файл возвращает массив
    [ // Описание первого маршрута
        'pattern' => '/^\/$/', // Регулярное выражение, соответствующее маршруту
        'filepath' => __DIR__ . '/pages/home.php', // Подключаемый файл, соответствующий маршруту
    ],
    [
        'pattern' => '/^\/login$/',
        'filepath' => __DIR__ . '/pages/login.php',
    ],
    [
        'pattern' => '/^\/registration$/',
        'filepath' => __DIR__ . '/pages/registration.php',
    ],
    [
        'pattern' => '/^\/basket$/',
        'filepath' => __DIR__ . '/pages/basket.php',
    ],
    [
        'pattern' => '/^\/profile$/',
        'filepath' => __DIR__ . '/pages/profile.php',
    ],
    [
        'pattern' => '/^\/admin$/',
        'filepath' => __DIR__ . '/pages/admin.php',
    ],
    [
        'pattern' => '/^\/product\/(\S+)$/',
        'filepath' => __DIR__ . '/pages/product.php',
    ],
];
