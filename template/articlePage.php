<?php
    $luogo = $dbh->getAddress($articolo["luogo"])[0];
    $luogoStr = $luogo["via"]." ".$luogo["civico"]." ". $luogo["citta"];
 ?>

<div class="articleContent" id="<?php echo $articolo["id_articolo"]; ?>">
    <img src="<?php echo UPLOAD_DIR.$articolo["immagine"]; ?>" alt="">
    <div class="imgHUD">
    <span class="map">Apri Mappa</span>
        <div class="priceDialog">
            <a href="javascript:void(0)" class="btnminus">-</a>
            <div class="quantity">1</div>
            <a href="javascript:void(0)" class="btnplus">+</a>
            <div class="price"><?php echo $articolo["prezzo"]; ?>$</div>
        </div>
    </div>
    <p class="description"><?php echo $articolo["descrizione"]; ?></p>
    <div class="address"><?php echo $luogoStr; ?></div>
</div>
<a class="acquistaArticle button" href="addToCart.php/?id=<?php echo $articolo["id_articolo"]; ?>&qty="><p>Acquista</p></a>
