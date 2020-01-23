<?php
require_once 'config.php';
$article = $dbh->getArticle($event["articolo"])[0];
$luogo = $dbh->getAddress($article["luogo"])[0];
$luogoStr = "https://www.google.com/maps?q=via+".$luogo["via"].",+".$luogo["civico"].",+". $luogo["citta"];
 ?>

<div class="eventContainer">
    <div class="boughtEvent" id="<?php echo $event["articolo"] ?>">
        <a href="article.php?id=<?php echo $event["articolo"]; ?>" class="img"><img src="<?php echo UPLOAD_DIR.$article["immagine"]; ?>" alt="<?php echo $article["nome"]; ?>"/></a>
        <div class="title"><?php echo $article["nome"]; ?></div>
        <div class="quantity"><p><?php echo $event["quantita"]; ?></p></div>
        <div class="ticketID">ID: <p>12345</p></div>
        <div class="map"><a href="<?php echo $luogoStr ?>">Apri mappa</a></div>
    </div>
    <hr/>
</div>
