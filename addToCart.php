<?php
require_once 'config.php';

$id = $_GET["id"];
if(isset($_COOKIE["user"])){
    //richiesta al db dell id del carrello dell utente
    $dbh->addEventInCart(1, $id);
    header("location: ../cart.php");
} else {
    header("location: ../account.php");
}

 ?>
