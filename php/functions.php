<?php

function startSession()
{
    if (session_status() === PHP_SESSION_DISABLED) {
        echo 'Сессии выключены';
        die();
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function db_link(): bool|mysqli
{
    return mysqli_connect('localhost', 'root', 'admin', 'mazurgames');
}

function getUserByName(string $name): ?array
{
    $link = db_link();
    return mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE name = '$name'"));
}

function getUserById(int $id): ?array
{
    $link = db_link();
    return mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE id = '$id'"));
}

function getGameById(string $id): ?array
{
    $link = db_link();
    return mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM games WHERE id = '$id'"));
}

function admin(int $id): bool
{
    $link = db_link();
    return mysqli_fetch_row(mysqli_query($link, "SELECT count(*) FROM admins WHERE id = '$id'"))[0] > 0;
}

function logout()
{
    $_SESSION = [];
    setcookie(session_name(), '', time() - 10000);
    session_destroy();
}