<?php

class Router
{
    private array $routesConfig; // список маршрутов, обслуживаемых роутером

    public function __construct(array $routesConfig)
    {
        $this->routesConfig = $routesConfig;
    }

    public function match(string $uri): ?Route // Возвращается либо объект класса Route, либо null
    {
        $uriParts = explode('?', $uri); // Разбор строки с URI на массив по символу "?"
        $clearUri = $uriParts[0]; // URI из масива без строки с GET параметрами

        foreach ($this->routesConfig as $item) { // Обход обслуживаемых маршрутов
            $pattern = $item['pattern'];
            $isMatch = preg_match($pattern, $clearUri, $matches); // Проверка URI на соответствие шаблону
            // Про preg_match https://www.php.net/manual/ru/function.preg-match.php
            // Про perl-совместимые выражения https://www.php.net/manual/ru/book.pcre.php

            if ($isMatch) {
                $route = new Route(); // Создание объекта роута
                $route->filepath = $item['filepath']; // Путь до подключаемого файла
                $route->params = array_slice($matches, 1); // Динамические параметры, которые удалось извлечь

                return $route;
            }
        }

        return null; // Обход закончен и соответствия не найдено
    }
}
