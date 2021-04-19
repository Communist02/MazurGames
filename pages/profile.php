<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
<?php require_once __DIR__ . '/../blocks/header.php';

if (!isset($_SESSION['uid'])) {
    header('Location: ../login');
    die();
} else if (array_key_exists('exit', $_GET)) {
    logout();
    header('Location: ../');
    die();
}

if (array_key_exists('save', $_POST)) {
    require __DIR__ . '/../php/check_update.php';
}

?>

<div class="content">
    <div class="form-product">
        <div>
            <img class="profile-avatar" src="../icons/person.svg" alt="">
        </div>

        <div class="form-info">
            <h1 id="name-user"><?php echo getUserById($_SESSION['uid'])['name'] ?></h1>
            <ul style="padding-left: 15px">
                <li>
                    <p id="product-status"><?php
                        if (admin($_SESSION['uid'])) echo 'Админ';
                        else echo 'Пользователь'; ?>
                    </p>
                </li>
            </ul>
            <?php if (!array_key_exists('edit', $_GET)) { ?>
                <div class="action">
                    <form>
                        <button name="edit" class="action-button">Редактировать</button>
                    </form>
                    <form>
                        <button name="exit" class="action-button">Выйти</button>
                    </form>
                    <?php if (admin($_SESSION['uid'])) { ?>
                        <a class="action-button" href="../admin">Админка</a>
                    <?php } ?>
                </div>
                <table class="table-info">
                    <tr>
                        <td class="text-light">Электронная почта</td>
                    </tr>

                    <tr>
                        <th><?= getUserById($_SESSION['uid'])['email'] ?></th>
                    </tr>
                </table>
                <?php
            } else require __DIR__ . '/../php/editor_profile.php' ?>
        </div>
    </div>
</div>
</body>
</html>
