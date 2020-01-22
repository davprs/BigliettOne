<?php
require_once 'config.php';

$templateParams["title"] = "Carrello";
$templateParams["navbar"] = "simpleNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";
$templateParams["content"] = "cart.php";
$templateParams["articlesInCart"] = $dbh->getCartElementsOf(1);

if(isset($_COOKIE['user'])){
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
}

require 'template/base.php';
 ?>
