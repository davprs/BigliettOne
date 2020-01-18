<?php
require_once 'config.php';

$templateParams["title"] = "Home";
$templateParams["navbar"] = "simpleNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";
$templateParams["content"] = "contatti.php";

if(isset($_COOKIE['user'])){
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
