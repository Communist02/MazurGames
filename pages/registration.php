<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>
<?php include 'blocks/header.php'; ?>

<div class="content">
    <h2>Регистрация нового пользователя</h2>
    <p>Здравствуйте, мы рады, что вы решили стать полноценным участником сайта.</p>
    <p>Регистрация на сайте откроет вам дополнительные возможности и в полной мере раскроет функционал данного
        проекта.</p>
    <p>В случае возникновения проблем с регистрацией, обратитесь к администратору сайта.</p>

    <form action="php/check_registration.php" method="post">
        <div>
            <label for="name">Никнейм</label>
            <input class="input-form" id="name" name="name" type="text">
            <?php
            if (array_key_exists('name', $_GET) && $_GET['name'] == 'exist')
                echo '<p class="login-failed">Такой никнейм сущесвует</p>';
            else if (array_key_exists('name', $_GET) && $_GET['name'] == 'less')
                echo '<p class="login-failed">Никнейм должен содержать не меньше 4 символов</p>';
            ?>
        </div>

        <div>
            <label for="password">Пароль</label>
            <input class="input-form" id="password" name="password" type="password">
            <?php
            if (array_key_exists('password', $_GET) && $_GET['password'] == 'less')
                echo '<p class="login-failed">Пароль должен содержать не меньше 6 символов</p>';
            ?>
        </div>

        <div>
            <label for="password2">Повторите пароль</label>
            <input class="input-form" id="password2" name="password2" type="password">
        </div>

        <div>
            <label for="email">E-mail</label>
            <input class="input-form" id="email" name="email" type="email">
            <?php
            if (array_key_exists('email', $_GET) && $_GET['email'] == 'exist')
                echo '<p class="login-failed">Аккаунт с такой почтой уже зарегистрирован</p>';
            else if (array_key_exists('email', $_GET) && $_GET['email'] == 'incorrect')
                echo '<p class="login-failed">Некорректно написана почта</p>';
            ?>
        </div>
        <button class="enter-button">Зарегистрироваться</button>
        <?php
        if (array_key_exists('registration', $_GET) && $_GET['registration'] == 'success')
            echo 'Регистрация прошла успешно';
        ?>
    </form>
</div>
</body>

</html>