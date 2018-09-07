<?php
session_start();
require 'functions.php';
require 'goods.php';
if(!isset($_SESSION['cart'])){
	$_SESSION['cart']=['sum'=> 0,'items'=>[ ]];	
}
$errors = [];
$products = getProducts();
if(!empty($_POST)){

    if(isset($_POST['goods'])&& $_POST['goods']!=0){
        $product = $_POST['goods'];
    }else{
        $errors['goods'] ='Выберите товар';
    }
    if(isset($_POST['count'])&&$_POST['count']!=0){
        $count = $_POST['count'];
    }else{
        $errors['count'] = 'Введите количество товара';
    }
    
    if(empty($errors)){
        $index = $product;
        $product = $products[$index];
        if(isset($_SESSION['cart']['items'][$index])){
            $count +=  $_SESSION['cart']['items'][$index]['count'];
        }
    $_SESSION['cart']['items'][$index] = ['name'=> $product["name"],'count'=>$count];
    }
}
//check();
cartRecalc();

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
    <!-- <button class="change" onclick="changeTheme()">Change theme</button> -->
   
    <form action="" method="POST" class="form" enctype="multipart/form-data">
    <?php
    if(isset($errors['goods'])) {
	echo '<p class="trouble">'.$errors['goods'].'</p>';
    }
    if(isset($errors['count'])) {
        echo '<p class="trouble">'.$errors['count'].'</p>';
    }?>
    <select name="goods" id="" class="input">
        <option value="">Выберите товар</option>
        <option value="1">Футболка</option>
        <option value="2">Джинсы</option>
        <option value="3">Кроссовки</option>
        <option value="4">Пиджак</option>
        <option value="5">Рубашка</option>
    </select>
    <input type="count" name="count" class="input" placeholder="Количество">
    <button type="submit" name="login" class="submit-btn">Посчитать</button>
    <?php
    foreach($_SESSION['cart']['items'] as $key=>$item){
        echo '<div class="output">'.$item['name'].'    -    '.$item['count'].' шт.    
        <a href="delete.php" id ="'.$key.'"><button type="submit">X</button></a></div><br>';
    }
    ?>
    <hr>
    <p>К оплате <?php echo  $_SESSION['cart']['sum'];?></p>
    </form>
</body>
</html>