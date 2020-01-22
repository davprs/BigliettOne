<?php
require_once 'config.php';

if(isset($_COOKIE["user"])){
    $templateParams["title"] = "Crea Evento";
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["alert"] = "";
    $templateParams["content"] = "template/crea_evento.php";

    $templateParams["overlayMenu"] = "loggedOverlay.php";

} else {
    $templateParams["title"] = "Login";
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";

    if(isset($_COOKIE['alert'])){
        $templateParams["alert"] = $_COOKIE['alert'];
        unset($_COOKIE['alert']);
    } else {
        $templateParams["alert"] = '';
    }

    $templateParams["overlayMenu"] = "notLoggedOverlay.php";

    $templateParams["content"] = "template/login.php";
}

require 'template/base.php';

 ?>
