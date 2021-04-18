<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<?php require_once __DIR__ . '/../blocks/header.php' ?>

<div class="content">
    <h2>Авторизация</h2>

    <form action="../php/check_login.php" method="post">
        <div>
            <label for="name">Логин</label>
            <input class="input-form" id="name" name="name" type="text">
        </div>

        <div>
            <label for="password">Пароль</label>
            <input class="input-form" id="password" name="password" type="password">
        </div>
        <button class="enter-button">Войти</button>
        <?php
        if (array_key_exists('login', $_GET) && $_GET['login'] == 'fail')
            echo '<a class="login-failed">Вход не выполнен</a>';
        ?>
        <div class="offer-register">
            <a>Ещё нет учётной записи?</a>
            <a href="registration">Зарегистрируйтесь</a>
        </div>
    </form>
</div>
</body>
</html>
