<?php
require_once 'config.php';

if(isset($_COOKIE["user"])){
    $userId = $dbh->getUserId($_COOKIE["user"])["id"];

    $readNotification = $dbh->readNotification($userId);

    if (empty($readNotification)) {
        echo "nulla";
    } else {
        echo($readNotification[0]["contenuto"]);
    }

} else {
    echo "ciao";
}
