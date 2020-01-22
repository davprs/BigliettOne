<!-- da aggiornare quando sarà fatto il db -->
<?php $attributiArticolo = $dbh->getArticle($articolo["id_articolo"]); ?>

<div class="cartArticle" id="<?php echo $articolo['id_articolo']; ?>">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <a href="javascript:void(0)" class="img"><img src="<?php echo UPLOAD_DIR.$attributiArticolo[0]['immagine']; ?>" alt="future" onload="resizeImg(this)"/></a>
    <div class="title"><?php echo $attributiArticolo[0]["nome"]; ?></div>
    <div class="priceDialog">
        <a href="javascript:void(0)" class="btnminus">-</a>
        <div class="quantity">1</div>
        <a href="javascript:void(0)" class="btnplus">+</a>
        <div class="price">78$</div>
    </div>
    <hr/>
</div>
