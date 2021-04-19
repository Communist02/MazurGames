<link rel="stylesheet" href="../css/header.css">
<header class="header">
    <a class="header-big" href="../">
        <img src="../icons/game.svg" alt="">
        <div>MazurGames</div>
    </a>
    <a class="header-small" href="">MG</a>
    <div class="header-end">
        <div class="search">
            <img src="../icons/loupe.svg" alt="">
            <input placeholder="Поиск" type="search" oninput="input(this.value)">
        </div>
        <?php require_once __DIR__ . '/../php/functions.php';
        startSession();

        if (isset($_SESSION['uid'])) { ?>
            <a class="user" href="../profile">
                <img class="avatar" src="../icons/person.svg" alt="Логин">
                <p><?= getUserById($_SESSION['uid'])['name'] ?></p>
            </a>
            <?php
        } else { ?>
                <a class="button-text" href="../login">Вход</a>
                <a class="button-text registration-button" href="../registration">Регистрация</a>
            <?php
        } ?>
        <a class="user" href="../basket">
            <img class="avatar" src="../icons/basket.svg" alt="Корзина">
        </a>
    </div>
</header>
<div class="search-block"></div>

<script src="../js/search.js"></script>