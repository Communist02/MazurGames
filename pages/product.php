<!DOCTYPE html>
<html lang="ru">

<?php
require __DIR__ . '/../blocks/header.php';

$product = '';
$nameGame = explode('/', $_SERVER['REQUEST_URI']);
$nameGame = $nameGame[count($nameGame) - 1];
if (getGameById($nameGame) != null)
    $product = getGameById($nameGame);
else header('Location: ../');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
    <link rel="stylesheet" href="../css/product.css">
</head>

<body>
<div class="content">
    <div class="form-product">
        <div class="form-image">
            <img class="game-logo" src="<?= '../' . $product['cover'] ?>" alt="Обложка">
            <table class="table-info">
                <tr>
                    <td class="text-light">Жанр</td>
                    <th><?= $product['genre'] ?></th>
                </tr>
                <tr>
                    <td class="text-light">Платформа</td>
                    <th><?= $product['platform'] ?></th>
                </tr>
                <tr>
                    <td class="text-light">Дата выхода</td>
                    <th><?= $product['date'] ?></th>
                </tr>
                <tr>
                    <td class="text-light">Издатель</td>
                    <th><?= $product['publisher'] ?></th>
                </tr>
                <tr>
                    <td class="text-light">Разработчик</td>
                    <th><?= $product['developer'] ?></th>
                </tr>
            </table>
        </div>

        <div class="form-info">
            <h1 id="game-name">Купить <?= $product['name'] ?></h1>
            <ul style="padding-left: 15px">
                <li>
                    <p id="product-status">В наличии</p>
                </li>
            </ul>
            <div id="purchase">
                <button onclick="toBasket()">В корзину</button>
                <p id="price"><?= $product['price'] ?> ₽</p>
            </div>

            <?php if (isset($_SESSION['uid']) && admin($_SESSION['uid'])) { ?>
                <form action="admin.php" method="get">
                    <button class="edit" name="product" value="<?= $product['id'] ?>">Редактировать</button>
                </form>
            <?php } ?>

            <table class="table-info">
                <tr>
                    <td class="text-light">Поддержка языков</td>
                    <td class="text-light">Регион активации</td>
                    <td class="text-light">Сервис активации</td>
                </tr>

                <tr>
                    <th><?= $product['language'] ?></th>
                    <th><?= $product['region'] ?></th>
                    <th><?= $product['service'] ?></th>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>

<script src="../js/toBasket.js"></script>

</html>