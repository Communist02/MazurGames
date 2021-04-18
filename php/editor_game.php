<?php

require_once __DIR__ . '/functions.php';

$link = db_link();

$id = trim($_POST['id']);
$name = trim($_POST['name']);
$genre = trim($_POST['genre']);
$publisher = trim($_POST['publisher']);
$developer = trim($_POST['developer']);
$platform = trim($_POST['platform']);
$date = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['date'])));
$language = trim($_POST['language']);
$region = trim($_POST['region']);
$service = trim($_POST['service']);
$price = (int)trim($_POST['price']);
$cover = trim($_POST['cover']);

$first_id = $_POST['change'];

$correct = TRUE;

if ($id == '') {
    $correct = FALSE;
}

if ($name == '') {
    $correct = FALSE;
}

//if (empty($_FILES['cover']['name'])) {
//    $correct = FALSE;
//} else if ($_FILES['image']['error'] != 0) {
//    $correct = FALSE;
//}

if ($correct) {
    if (array_key_exists('add', $_POST)) {
        mysqli_query($link, "INSERT INTO games(id, name, genre, publisher, developer, platform, date, language, region, service, price, cover) values ('$id', '$name', '$genre', '$publisher', '$developer', '$platform', '$date', '$language', '$region', '$service', '$price', '$cover')");
        header('Location: admin.php' . '?' . 'product=' . $id . '&add=success');
    } else if (array_key_exists('change', $_POST)) {
        mysqli_query($link, "UPDATE games SET id = '$id', name = '$name', genre = '$genre', developer = '$developer', platform = '$platform', date = '$date', language = '$language', region = '$region', service = '$service', price = '$price', cover = '$cover' WHERE id = '$first_id'");
        header('Location: admin.php' . '?' . 'product=' . $id . '&change=success');
    }
} else {
    echo 'id и имя не могут быть пустыми';
    header('Location: admin.php' . '?' . 'editor=fail');
}