<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MazurGames</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<?php require_once __DIR__ . '/../blocks/header.php';

if (!isset($_SESSION['uid']) || !admin($_SESSION['uid'])) header('Location: ../home');

if (array_key_exists('add', $_POST) || array_key_exists('change', $_POST)) {
    require __DIR__ . '/../php/editor_game.php';
    $_POST = [];
}

$product = ['id' => '', 'name' => '', 'genre' => '', 'publisher' => '', 'developer' => '', 'platform' => '', 'date' => '', 'language' => '', 'region' => '', 'service' => '', 'price' => '', 'cover' => ''];

if (array_key_exists('product', $_GET)) {
    $product = getGameById($_GET['product']);
}

?>

<div class="content">
    <form method="post">
        <div>
            <label for="id">id игры</label>
            <input class="input-form" id="id" name="id" type="text" value="<?= $product['id'] ?>">
        </div>

        <div>
            <label for="name">Название игры</label>
            <input class="input-form" id="name" name="name" type="text" value="<?= $product['name'] ?>">
        </div>

        <div>
            <label for="genre">Жанр</label>
            <input class="input-form" id="genre" name="genre" type="text" value="<?= $product['genre'] ?>">
        </div>

        <div>
            <label for="publisher">Издатель</label>
            <input class="input-form" id="publisher" name="publisher" type="text" value="<?= $product['publisher'] ?>">
        </div>

        <div>
            <label for="developer">Разработчик</label>
            <input class="input-form" id="developer" name="developer" type="text" value="<?= $product['developer'] ?>">
        </div>

        <div>
            <label for="platform">Платформа</label>
            <input class="input-form" id="platform" name="platform" type="text" value="<?= $product['platform'] ?>">
        </div>

        <div>
            <label for="date">Дата выхода</label>
            <input class="input-form" id="date" name="date" type="date" value="<?= $product['date'] ?>">
        </div>

        <div>
            <label for="language">Поддержка языков</label>
            <input class="input-form" id="language" name="language" type="text" value="<?= $product['language'] ?>">
        </div>

        <div>
            <label for="region">Регион активации</label>
            <input class="input-form" id="region" name="region" type="text" value="<?= $product['region'] ?>">
        </div>

        <div>
            <label for="service">Сервис активации</label>
            <input class="input-form" id="service" name="service" type="text" value="<?= $product['service'] ?>">
        </div>

        <div>
            <label for="price">Цена</label>
            <input class="input-form" id="price" name="price" type="text" value="<?= $product['price'] ?>">
        </div>

        <div>
            <label for="cover">Обложка</label>
            <input class="input-form" id="cover" name="cover" type="text" value="<?= $product['cover'] ?>">
        </div>
        <?php if (array_key_exists('product', $_GET)) { ?>
            <button name="change" value="<?= $product['id'] ?>" class="enter-button">Изменить</button>
        <?php } else { ?>
            <button name="add" class="enter-button">Добавить</button>
        <?php } ?>
    </form>
</div>

</body>

</html>
