<?php

require_once __DIR__ . '/functions.php';

$link = mysqli_connect('localhost', 'root', 'admin', 'mazurgames');

$name = trim($_POST['name']);
$password = trim($_POST['password']);

$nameCorrect = mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM users WHERE name = '$name'"))[0] > 0;

if ($nameCorrect) {
    $user = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE name = '$name'"));
    if (password_verify($password, $user['password'])) {
        startSession();
        $_SESSION['uid'] = $user['id'];
        header('Location: ../');
    } else header('Location: ../login?login=fail');
} else
    header('Location: ../login' . '?' . 'login=fail');