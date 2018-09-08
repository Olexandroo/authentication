<?php
session_start();
require 'data.php';
require 'functions.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Аутентификация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js" defer></script>
</head>
<body>
    <h1 id="header">Аутентификация</h1>
    <!-- <button class="change" onclick="changeTheme()">Change theme</button> -->

    <form  method="POST" action="" class="form">
    <?php if(isset($problems['trouble'])) {
	echo '<p class="trouble">'.$problems['trouble'].'</p>';
    }?>
    <input type="text" name="login" placeholder="olexandro" required="required" class="login">
    <input type="text" name="password" placeholder="olexandro" required="required" class="pass">
    <button type="submit" name="sign in" class="submit-btn" >Войти</button>
    </form>

</body>
</html>