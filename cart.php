<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js" defer></script>
</head>
<body>
    <h1 id="header">Корзина</h1>
    <button class="change" onclick="changeTheme()">Change theme</button>
    <form action="" method="POST" class="form">
    <select name="" id="">
        <option value="">Выберите товары</option>
        <option value="">Футболка</option>
        <option value="">Джинсы</option>
        <option value="">Кроссовки</option>
        <option value="">Пиджак</option>
        <option value="">Рубашка</option>
    </select>
    <button type="submit" name="login" class="submit-btn">Посчитать</button>
    </form>
</body>
</html>