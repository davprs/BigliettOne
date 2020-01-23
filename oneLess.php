<?php

require_once 'config.php';


if(isset($_COOKIE["user"])){
    $articleId = $_GET["id"];
    $cartId = $dbh->getCartByUsername($_COOKIE["user"]);
    $events = $dbh->removeOneArticle($articleId, $cartId[0]["carrello"]);
    header("location: ./cart.php");
} else {
    header("location: ./account.php");
}

 ?>
