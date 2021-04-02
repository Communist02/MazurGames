<link rel="stylesheet" href="css/header.css">
<header class="header">
    <a class="header-big" href="index.php">
        <img src="icons/game.svg">
        <div>MazurGames</div>
    </a>
    <a class="header-small" href="index.php">MG</a>
    <div class="header-end">
        <div class="search">
            <img src="icons/loupe.svg" alt="">
            <input placeholder="Поиск" type="search" oninput="input(this.value)">
        </div>
        <?php require_once 'php/functions.php';
        startSession();

        if (isset($_SESSION['uid'])) { ?>
            <a class="user" href="profile.php">
                <img class="avatar" src="icons/person.svg" alt="Логин">
                <p><?= getUserById($_SESSION['uid'])['name'] ?></p>
            </a>
            <?php
        } else { ?>
            <form action="login.php">
                <button>Вход</button>
            </form>
            <form action="registration.php">
                <button class="registration-button">Регистрация</button>
            </form>
            <?php
        } ?>
        <a class="user" href="basket.php">
            <img class="avatar" src="icons/basket.svg" alt="Корзина">
        </a>
    </div>
</header>
<div class="search-block"></div>

<script src="js/search.js"></script>