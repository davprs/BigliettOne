<?php
require_once 'config.php';

if(isset($_COOKIE['user'])){
    $templateParams["title"] = "My Account";
    $templateParams["navbar"] = "eventsNav.php";
    $templateParams["head"] = "head.php";

    if(isset($_COOKIE['alert'])){
        $templateParams["alert"] = $_COOKIE['alert'];
        unset($_COOKIE['alert']);
        setcookie('alert', null, -1, '/');
    } else {
        $templateParams["alert"] = '';
    }

    $templateParams["overlayMenu"] = "loggedOverlay.php";

    $templateParams["boughtEvent"] = $dbh->getBoughtEvents($_COOKIE['user']);
}else{
    $templateParams["title"] = "Login";
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";

    if(isset($_COOKIE['alert'])){
        $templateParams["alert"] = $_COOKIE['alert'];
        unset($_COOKIE['alert']);
        setcookie('alert', null, -1, '/');
    } else {
        $templateParams["alert"] = '';
    }

    $templateParams["overlayMenu"] = "notLoggedOverlay.php";

    $templateParams["content"] = "template/login.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
