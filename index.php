<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazurGames</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<?php require_once 'blocks/header.php'; ?>

<div class="content">
    <div class="promo">

    </div>

    <h2 class="catalog-name">Каталог</h2>
    <div class="catalog">
        <?php include 'php/catalog.php' ?>
    </div>
</div>

<!--<footer>-->
<!--    <div class="footer">-->
<!--        <p>© 2021 MazurGames</p>-->
<!--        <a>О магазине</a>-->
<!--        <a>Оплата и доставка</a>-->
<!--        <a>Гарантия возврата</a>-->
<!--    </div>-->
<!--</footer>-->
<!--</body>-->

<script src="js/promo.js"></script>

</html>