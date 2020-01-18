<?php
require_once 'config.php';

if(isset($_COOKIE['user'])){
    $templateParams["title"] = "My Account";
    $templateParams["navbar"] = "eventsNav.php";
    $templateParams["head"] = "head.php";

    if(isset($_COOKIE['alert'])){
        $templateParams["alert"] = $_COOKIE['alert'];
        unset($_COOKIE['alert']);
    } else {
        $templateParams["alert"] = '';
    }

    $templateParams["content"] = "boughtEvent.php";
}else{
    $templateParams["title"] = "Login";
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";

    if(isset($_COOKIE['alert'])){
        $templateParams["alert"] = $_COOKIE['alert'];
        unset($_COOKIE['alert']);
    } else {
        $templateParams["alert"] = '';
    }

    $templateParams["content"] = "template/login.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
