<?php
session_start();
require 'data.php';
require 'goods.php';
function verify_user($username,$userpassword,$array){
    if(is_array($array)){
    foreach ($array as $key => $value) {
        if($username === $key && md5($userpassword) === $value){
            return true;
        }
    }
    }
    return false;
}
function cartRecalc() {
	$products = getProducts();
	$items = $_SESSION['cart']['items'];
	$sum = 0; 
	foreach($items as $key=>$value){
		$sum +=$products[$key]['cost']*$value['count'];
	}
	$_SESSION['cart']['sum']=$sum;
}    

// function check(){
    
//     $products = getProducts();
//     if(!empty($_POST)){
	
//         if(isset($_POST['goods'])&& $_POST['goods']!=0){
//             $product = $_POST['goods'];
//         }else{
//             $errors['goods'] ='Выберите товар';
//         }
//         if(isset($_POST['count'])&&$_POST['count']!=0){
//             $count = $_POST['count'];
//         }else{
//             $errors['count'] = 'Введите количество товара';
//         }
        
//         if(empty($errors)){
//             $index = $product;
//             $product = $products[$index];
//             if(isset($_SESSION['cart']['items'][$index])){
//                 $count +=  $_SESSION['cart']['items'][$index]['count'];
//             }
//         $_SESSION['cart']['items'][$index] = ['name'=> $product["name"],'count'=>$count];
//         }
//     }
//}

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


$problems = [];
if(!empty($_POST)){
    if(isset($_POST['login']) && isset($_POST['password'])){
        if(verify_user($_POST['login'],$_POST['password'] ,$data)){
            $_SESSION['Name'] = $_POST['login'];
            $_SESSION['Password'] = $_POST['password'];
        }
    }
    if(isset($_SESSION['Name']) && isset($_SESSION['Password'])){
        header('Location: cart.php');
    }
    else {
        $problems['trouble'] = 'Пароль или логин введен неверно';
    }
}
?>