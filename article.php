<?php
require_once 'config.php';

    $id = $_GET["id"];
    $articolo = $dbh->getArticle($id);
    $titolo = $articolo[0]["nome"];
    
    $templateParams["title"] = $titolo;
    $templateParams["navbar"] = "minimalNavbar.php";
    $templateParams["head"] = "head.php";
    $templateParams["alert"] = "";
    //$templateParams["content"] = "articlePage.php";
    $templateParams["article"] = $articolo;

    require 'template/base.php';

    //header("location: ./index.php");

 ?>
