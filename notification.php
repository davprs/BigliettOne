<?php
require_once 'config.php';

$templateParams["title"] = "Home";
$templateParams["navbar"] = "fullNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";
$templateParams["content"] = "notification.php";

if(isset($_COOKIE['user'])){
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
