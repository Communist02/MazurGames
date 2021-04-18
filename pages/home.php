<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazurGames</title>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
<?php require_once __DIR__ . '/../blocks/header.php'; ?>

<div class="content">
    <div class="promo">

    </div>

    <h2 class="catalog-name">Каталог</h2>
    <div class="catalog">
        <?php require_once __DIR__ . '/../php/catalog.php'; ?>
    </div>
</div>

<script src="../js/promo.js"></script>

</html>
