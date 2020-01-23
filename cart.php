<?php
require_once 'config.php';

$templateParams["title"] = "Carrello";
$templateParams["navbar"] = "simpleNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";
$templateParams["content"] = "cart.php";

if(isset($_COOKIE['user'])){
    $cart = $dbh->getCartByUsername($_COOKIE["user"]);
    $articles = $dbh->getCartElementsOf($cart[0]["carrello"]);
    $templateParams["articlesInCart"] = $articles;
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    header("Location: ./account.php");
}

require 'template/base.php';
 ?>
