<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="../css/basket.css">
</head>

<body>
<?php require_once __DIR__ . '/../blocks/header.php'; ?>

<div class="content">
    <h2>Корзина</h2>
    <div class="form-basket">
        <div class="products">

        </div>

        <div class="total">
            <div class="total-card">
                <div class="total-price">
                    <p style="margin-right: 20px">Итого</p>
                    <p class="price-games" style="color: orange">0 ₽</p>
                </div>
                <form>
                    <button>Оформить заказ</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

<script src="../js/basket.js"></script>

</html>