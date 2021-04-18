<?php
require_once 'functions.php';
$link = db_link();

$jsonStr = file_get_contents('php://input');
$basket = json_decode($jsonStr, TRUE);

if (empty($basket)) return null;

foreach ($basket as $id => $count) {
    if ($game = mysqli_query($link, "SELECT * FROM games WHERE id='$id'")) {
        $game = mysqli_fetch_assoc($game);

        $id = $game['id'];
        $name = $game['name'];
        $publisher = $game['publisher'];
        $price = $game['price'];
        $cover = $game['cover'];
        ?>

        <div class="product">
            <img src="<?= '../' . $cover ?>" alt="Обложка">
            <div class="product-info">
                <h2><?= $name ?></h2>
                <p class="price-game"><?= $price ?> ₽</p>
                <div class="product-count">
                    <button onclick="remove('<?= $id ?>')">-</button>
                    <div><?= $count ?></div>
                    <button onclick="add('<?= $id ?>')">+</button>
                </div>
                <button class="delete-button" onclick="fromBasket('<?= $id ?>')">Удалить</button>
            </div>
        </div>
        <?php
    }
} ?>
