<?php
require_once 'config.php';
/*
if(!isset($_COOKIES["user"])){
    header("location: account.php");
}*/
    //Inserisco
    $eventTitle = $_POST["eventTitle"];
    $eventDescription = $_POST["eventDescription"];
    $eventPrice = $_POST["eventPrice"];
    $eventPlaces = $_POST["eventPlaces"];
    $eventAddress = $_POST["eventAddress"];
    $eventDay = $_POST["eventDay"];
    $autore = $_COOKIE["user"];
    $eventCategory = $_POST["category"];

    echo "<p>".$eventCategory."\n".$eventTitle."\n".$eventDescription."\n".$eventPrice."\n".$eventPlaces."\n".$eventAddress."\n".$eventDay."\n".$autore."\n"."</p>";

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["eventImg"]);
    if($result != 0){
        echo "ciao";
        $imgarticolo = $msg;
        $descrizione_breve = "L'evento si terrà in ".$eventPlaces." il ".$eventDay;
        $id = $dbh->insertArticle($eventTitle, $autore, 1, $eventDay, $eventCategory, $imgarticolo, $eventDescription, $descrizione_breve, $eventPrice);
        if($id!=false){
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
    }
    setcookie("alert", $msg, time() + (86400 * 30), "/");
    header("location: account.php");


?>
