<?php
session_start();

require 'data.php';
require 'functions.php';
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Authentication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js" defer></script>
</head>
<body>
    <h1 id="header">Authentication</h1>
    <!-- <button class="change" onclick="changeTheme()">Change theme</button> -->

    <form  method="POST" action="" class="form">
    <?php if(isset($problems['trouble'])) {
	echo '<p class="trouble">'.$problems['trouble'].'</p>';
    }?>
    <input type="text" name="login" placeholder="olexandro" required="required" class="login">
    <input type="text" name="password" placeholder="olexandro" required="required" class="pass">
    <button type="submit" name="sign in" class="submit-btn" >Sign in</button>
    </form>

</body>
</html>