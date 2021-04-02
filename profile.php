<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php include 'blocks/header.php';

if (!isset($_SESSION['uid'])) header('Location: index.php');

if (array_key_exists('exit', $_GET)) {
    logout();
    header('Location: index.php');
} else if (array_key_exists('admin', $_GET)) {
    header('Location: admin.php');
}

if (array_key_exists('cancel', $_POST)) {
    header('Location: profile.php');
} else if (array_key_exists('save', $_POST)) {
    include 'php/check_update.php';
}

?>

<div class="content">
    <div class="form-product">
        <div>
            <img class="profile-avatar" src="icons/person.svg" alt="">
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
            <?php if (!array_key_exists('edit', $_GET)) {
                echo '
                <form id="action">
                    <button name="edit" class="action-button">Редактировать</button>
                    <button name="exit" class="action-button">Выйти</button>';
                if (admin($_SESSION['uid'])) {
                    echo '<button name="admin" class="action-button">Админка</button>';
                }
                echo '</form>
                <table class="table-info">
                    <tr>
                        <td class="text-light">Электронная почта</td>
                    </tr>
    
                    <tr>
                        <th>' . getUserById($_SESSION['uid'])['email'] . '</th>
                    </tr>
                </table>
                ';
            } else include 'php/editor_profile.php' ?>
        </div>
    </div>
</div>
</body>
</html>
