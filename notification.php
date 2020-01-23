<?php
require_once 'config.php';

$templateParams["title"] = "Home";
$templateParams["navbar"] = "fullNavbar.php";
$templateParams["head"] = "head.php";
$templateParams["alert"] = "";

if(isset($_COOKIE['user'])){
    $id= $dbh->getUserId($_COOKIE['user']);
    $templateParams["notification"] = $dbh->getNotification($id["id"]);
    $templateParams["overlayMenu"] = "loggedOverlay.php";
} else {
    $templateParams["overlayMenu"] = "notLoggedOverlay.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
