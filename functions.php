<?php
require 'data.php';

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
function check(){
    $errors = [];
    $products = getProducts();
    if(!empty($_POST)){
	
        if(isset($_POST['goods'])&& $_POST['goods']!=0){
            $product = $_POST['goods'];
        }else{
            $errors['goods']='Выберите товар';
        }
        if(isset($_POST['count'])&&$_POST['count']!=0){
            $count = $_POST['count'];
        }else{
            $errors['count']= 'Ввведите количество товара';
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
}

?>