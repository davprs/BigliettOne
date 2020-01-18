<?php
require_once 'config.php';

$templateParams["title"] = "Crea Evento";
$templateParams["navbar"] = "minimalNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";
$templateParams["content"] = "template/crea_evento.php";

if(isset($_COOKIE['user'])){
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
