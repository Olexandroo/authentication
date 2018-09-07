<?php
require 'data.php';
function verify_user($username,$userpass,$array){
    if(is_array($array)){
    foreach ($array as $key => $value) {
        if($user === $key && md5($pass) === $value){
            return true;
        }
    }
    }
    return false;
}
?>