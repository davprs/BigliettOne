<?php
require_once 'config.php';

//if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true ){
    $templateParams["title"] = "My Account";
    $templateParams["navbar"] = "eventsNav.php";
    $templateParams["head"] = "head.php";
    $templateParams["content"] = "boughtEvent.php";
/*}else{
    $templateParams["title"] = "Login";
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["content"] = "template/login.php";
}*/
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
