<?php
require_once 'config.php';

$articleId = $_GET["id"];
$quantity = $_GET["qty"];
if(isset($_COOKIE["user"])){
    //richiesta al db dell id del carrello dell utente
    $cart = $dbh->getCartByUsername($_COOKIE["user"])[0];
    $dbh->addEventInCart($cart["carrello"], $articleId, $quantity);
    header("location: ../cart.php");
} else {
    header("location: ../account.php");
}

 ?>
