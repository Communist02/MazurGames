<?php

require_once __DIR__ . '/functions.php';

$link = db_link();

$correct = TRUE;

$post = array();

$user = getUserById($_SESSION['uid']);

$name = trim($_POST['name']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$email = trim($_POST['email']);

$nameCorrect = mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM users WHERE name = '$name'"))[0] == 0 || $name == $user['name'];
$emailCorrect = mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM users WHERE email = '$email'"))[0] == 0 || $email == $user['email'];

if (!$nameCorrect) {
    //echo "Такой никнейм сущесвует";
    $correct = FALSE;
    $post['name'] = 'exist';
} else if (iconv_strlen($name) < 4 && $name != '') {
    //echo "Никнейм должен содержать не меньше 4 символов";
    $correct = FALSE;
    $post['name'] = 'less';
}

if (iconv_strlen($password) < 6 && $password != '') {
    //echo "Пароль должен содержать не меньше 6 символов";
    $correct = FALSE;
    $post['password'] = 'less';
} else if ($password != $password2) {
    $correct = FALSE;
    $post['password'] = 'different';
}

if (!$emailCorrect) {
    //echo "Аккаунт с такой почтой уже зарегистрирован";
    $correct = FALSE;
    $post['email'] = 'exist';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //echo "Некорректно написана почта";
    $correct = FALSE;
    $post['email'] = 'incorrect';
}

if ($correct) {
    if ($user['name'] != $name && $name != '' || !password_verify($password, $user['password']) && $password != '' || $user['email'] != $email) {
        $id = $user['id'];
        if ($user['name'] != $name && $name != '') {
            mysqli_query($link, "UPDATE users SET name = '$name' where id = '$id'");
        }
        if (!password_verify($password, $user['password']) && $password != '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($link, "UPDATE users SET password = '$hash' where id = '$id'");
        }
        if ($user['email'] != $email) {
            mysqli_query($link, "UPDATE users SET email = '$email' where id = '$id'");
        }
        header('Location: ../profile' . '?' . 'edit=' . '&' . 'update=success');
    } else header('Location: ../profile' . '?' . 'edit=' . '&' . 'update=none');
} else {
    $postStr = "";
    foreach ($post as $key => $value) {
        $postStr .= '&' . $key . '=' . $value;
    }
    header('Location: ../profile' . '?'. 'edit=&update=fail' . $postStr);
}