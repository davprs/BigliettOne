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
    $thing = $_POST["thing"];
    $eventCategory = $_POST["category"];

    echo "<p>".$eventCategory."\n".$eventTitle."\n".$eventDescription."\n".$eventPrice."\n".$eventPlaces."\n".$eventAddress."\n".$eventDay."\n".$autore."\n"."</p>";

    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["eventImg"]);
    if($result != 0){
        $imgarticolo = $msg;
        /*$id = $dbh->insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        if($id!=false){
            foreach($categorie_inserite as $categoria){
                $ris = $dbh->insertCategoryOfArticle($id, $categoria);
            }
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }*/
        $msg = "Inserimento completato";

    }
    setcookie("alert", $msg, time() + (86400 * 30), "/");
    header("location: account.php");


?>
