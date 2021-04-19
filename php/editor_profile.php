<form method="post">
    <div id="action">
        <button name="save" class="action-button">Сохранить</button>
        <button name="cancel" class="action-button">Отмена</button>
        <?php
        if (array_key_exists('update', $_GET) && $_GET['update'] == 'success') {
            echo '<p class="update-status" style="color: lightgreen">Изменения сохранены!</p>';
        } else if (array_key_exists('update', $_GET) && $_GET['update'] == 'none') {
            echo '<p class="update-status">Изменений нет!</p>';
        } else if (array_key_exists('update', $_GET) && $_GET['update'] == 'fail') {
            echo '<p class="update-status" style="color: red">Ошибка! Проверьте данные!</p>';
        } ?>
    </div>

    <div class="edit">
        <div>
            <label for="name">Никнейм</label>
            <input class="input-form" id="name" name="name" type="text"
                   value="<?= getUserById($_SESSION['uid'])['name'] ?>">
        </div>

        <div>
            <label for="password">Новый пароль</label>
            <input class="input-form" id="password" name="password" type="password" autocomplete="new-password">
        </div>

        <div>
            <label for="password2">Повторите новый пароль</label>
            <input class=" input-form" id="password2" name="password2" type="password" autocomplete="new-password">
        </div>

        <div>
            <label for="email">E-mail</label>
            <input class="input-form" id="email" name="email" type="email"
                   value="<?= getUserById($_SESSION['uid'])['email'] ?>">
        </div>
    </div>
</form>