<?php

include_once '../php/functions.php';

$link = db_link();

$correct = TRUE;

$post = array();

$name = trim($_POST['name']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$email = trim($_POST['email']);

$nameCorrect = mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM users WHERE name = '$name'"))[0] == 0;
$emailCorrect = mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM users WHERE email = '$email'"))[0] == 0;

if (!$nameCorrect) {
    //echo "Такой никнейм сущесвует";
    $correct = FALSE;
    $post['name'] = 'exist';
} else if (iconv_strlen($name) < 4) {
    //echo "Никнейм должен содержать не меньше 4 символов";
    $correct = FALSE;
    $post['name'] = 'less';
}

if (iconv_strlen($password) < 6) {
    //echo 'Пароль должен содержать не меньше 6 символов';
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
    $hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($link, "INSERT INTO users(name, password, email) values ('$name', '$hash', '$email')");
    startSession();

    $_SESSION['uid'] = getUserByName($name)['id'];
    //echo "<h2>Регистрация прошла успешно!</h2>";
    header('Location: ../registration.php' . '?' . 'registration=success');
} else {
    $postStr = "";
    foreach ($post as $key => $value) {
        $postStr .= $key . '=' . $value . '&';
    }
    header('Location: ../registration.php' . '?' . $postStr);
}