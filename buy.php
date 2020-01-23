<?php
require_once 'config.php';

$cartId = $_GET["id"];
if(isset($_COOKIE["user"])){
    //richiesta al db dell id del carrello dell utente
    $userId = $dbh->getUserId($_COOKIE["user"])["id"];
    $dbh->buyCart($cartId, $userId);
    print_r( $userId);

    header("location: ./cart.php");
} else {
    header("location: ./account.php");
}



 ?>
