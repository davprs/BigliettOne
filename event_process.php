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

    $via = $_POST["via"];
    $civ = $_POST["civ"];
    $cap = $_POST["cap"];
    $cit = $_POST["cit"];
    $stat = $_POST["stat"];

    /*$via = "roma";
    $civ = "55";
    $cap = "65010";
    $cit = "montesilvano";
    $stat = "italia";*/

    echo $via.$civ.$cap.$cit.$stat;


    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["eventImg"]);
    if($result != 0){
        $place = $dbh->insertPlace($via, $civ, $cap, $cit, $stat);
        echo $place;
        $imgarticolo = $msg;
        $descrizione_breve = "L'evento si terrà a ".$cit." il ".$eventDay;
        $id = $dbh->insertArticle($eventTitle, $autore, $place, $eventDay, $eventCategory, $imgarticolo, $eventDescription, $descrizione_breve, $eventPrice);
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
