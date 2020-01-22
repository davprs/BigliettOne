<div class="articleContent" id="<?php echo $articolo["id_articolo"]; ?>">
    <img src="<?php echo UPLOAD_DIR.$articolo["immagine"]; ?>" alt="">
    <div class="imgHUD">
    <span class="map">Apri Mappa</span>
        <div class="priceDialog">
            <a href="javascript:void(0)" class="btnminus">-</a>
            <div class="quantity">1</div>
            <a href="javascript:void(0)" class="btnplus">+</a>
            <div class="price"><?php //echo $articolo["prezzo"]; ?>80$</div>
        </div>
    </div>
    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
    <div class="address"><?php echo $articolo["luogo"]; ?></div>
</div>
<a class="acquistaArticle button" href="addToCart.php/?id=<?php echo $articolo["id_articolo"]; ?>"><p>Acquista</p></a>
