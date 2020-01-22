<?php
require_once 'config.php';

$category = $_GET["category"];

$events = $dbh->getEventsByCategory($category);
/*
$response = '';

foreach ($events as $articolo){
    re("articlePage.php");
}*/

//richiesta al db
//resa sotto forma di article
//manda risposta
 ?>

<?php foreach ($events as $articolo): ?>
    <?php require "template/article.php"; ?>
    <?php endforeach;?>
