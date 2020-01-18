<?php
require_once 'config.php';

$templateParams["title"] = "Servizio Clienti";
$templateParams["navbar"] = "minimalNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";
$templateParams["content"] = "template/customer_service.php";

if(isset($_COOKIE['user'])){
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
