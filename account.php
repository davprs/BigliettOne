<?php
require_once 'config.php';

if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true ){
    $templateParams["title"] = "My Account";
    $templateParams["navbar"] = "simpleNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["content"] = "articlePage.php";
}else{
    $templateParams["title"] = "Login";
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["content"] = "template/login.php";
}
//$templateParams["article"] = "";


require 'template/base.php';

 ?>
