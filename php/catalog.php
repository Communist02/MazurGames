<?php

require_once __DIR__ . "/functions.php";

$link = db_link();

$all = "SELECT * FROM games";

if ($games = mysqli_query($link, $all)) {
    while ($game = mysqli_fetch_assoc($games)) {
        $id = $game['id'];
        $name = $game['name'];
        $publisher = $game['publisher'];
        $price = $game['price'];
        $cover = $game['cover'];
        ?>

        <a class="card" href="product/<?= $id ?>">
            <img src="<?= '../' . $cover ?>" alt="Обложка">
            <div class="card-text">
                <p class="name"><?= $name ?></p>
                <p class="publisher"><?= $publisher ?></p>
                <p class="price"><?= $price ?> ₽</p>
            </div>
        </a>
        <?php
    }
}