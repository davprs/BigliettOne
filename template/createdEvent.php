<?php
$luogo = $dbh->getAddress($event["luogo"])[0];
$luogoStr = "https://www.google.com/maps?q=via+".$luogo["via"].",+".$luogo["civico"].",+". $luogo["citta"];
 ?>

<div class="eventContainer">
    <div class="createdEvent" id="<?php echo $event["id_articolo"] ?>">
        <a href="article.php?id=<?php echo $event["id_articolo"]; ?>" class="img"><img src="<?php echo UPLOAD_DIR.$event["immagine"]; ?>" alt="<?php echo $event["nome"]; ?>"/></a>
        <div class="title"><?php echo $event["nome"]; ?></div>
        <div class="price"><p><?php echo $event["prezzo"]; ?>$</p></div>
        <div class="date"><?php echo $event["data"]; ?></div>
        <div class="map"><a href="<?php echo $luogoStr; ?>">Apri mappa</a></div>
    </div>
    <hr/>
</div>
