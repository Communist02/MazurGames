<?php

require_once __DIR__ . '/functions.php';

$link = db_link();

$index = (int)file_get_contents('php://input');

$all = "SELECT * FROM promo LEFT JOIN games USING(id)";

$count = mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM promo"))[0];

if ($promo = mysqli_query($link, $all)) {
    $game = [];
    for ($i = 0; $i <= $index; $i++) {
        $game = mysqli_fetch_assoc($promo);
    }
    $id = $game['id'];
    $image = $game['image'];
    $name = $game['name'];
    $price = $game['price'];
    ?>

    <button class="promo-button" onclick="left(<?= $count ?>)">&lt;</button>
    <a class="promo-info" href="product/<?= $id ?>">
        <img src="<?= '../' . $image ?>" alt="">
        <div class="promo-text">
            <h2><?= $name ?></h2>
            <p><?= $price ?> ₽</p>
        </div>
    </a>
    <button class="promo-button" onclick="right(<?= $count ?>)">&gt;</button>

    <?php
}