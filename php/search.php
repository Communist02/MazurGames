<?php

require_once __DIR__ . '/functions.php';

$link = db_link();

$text = file_get_contents('php://input');

$search = "SELECT * FROM games WHERE name REGEXP '$text'";

if ($games = mysqli_query($link, $search)) {
    while ($game = mysqli_fetch_assoc($games)) {
        $id = $game['id'];
        $name = $game['name'];
        $cover = $game['cover'];
        ?>

        <a class="search-card" href="product/<?= $id ?>">
            <img src="<?= '../' . $cover ?>" alt="Обложка">
            <p><?= $name ?></p>
        </a>

        <?php
    }
}