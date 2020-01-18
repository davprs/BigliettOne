<?php
require_once 'config.php';

if(isset($_COOKIE['user'])){
    $templateParams["title"] = "Home";
    $templateParams["navbar"] = "fullNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["alert"] = "";
    $templateParams["overlayMenu"] = "loggedOverlay.php";
    $templateParams["content"] = "article.php";
    //$templateParams["article"] = "";
} else {
    $templateParams["title"] = "Home";
    $templateParams["navbar"] = "fullNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["alert"] = "";
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
    $templateParams["content"] = "article.php";
}
/*
if(/*se ci sono notifiche non mostrate 1){
    if(isset($_COOKIE['notifications'])){
        setcookie('notifications', $_COOKIE['notifications'].';'."notifica", time() + (86400 * 30), "/");
    } else {
        setcookie('notifications', "notifica", time() + (86400 * 30), "/");
    }
}*/

require 'template/base.php';

 ?>
