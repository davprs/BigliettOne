<!-- da aggiornare quando sarà fatto il db -->
<?php
$attributiArticolo = $dbh->getArticle($articolo["id_articolo"])[0];
$idCarrello = $dbh->getCartByUsername($_COOKIE["user"])[0];
$carrello = $dbh->getQuantity($idCarrello["carrello"], $articolo["id_articolo"])[0];
$phpLessOperation = "oneLess.php?id=".$articolo['id_articolo'];
?>

<div class="cartArticle" id="<?php echo $articolo['id_articolo']; ?>">
    <a href="removeFromCart.php?id=<?php echo $articolo['id_articolo']; ?>" class="closebtn">&times;</a>
    <a href="javascript:void(0)" class="img"><img src="<?php echo UPLOAD_DIR.$attributiArticolo['immagine']; ?>" alt="<?php echo $attributiArticolo['immagine']; ?>" onload="resizeImg(this)"/></a>
    <div class="title"><?php echo $attributiArticolo["nome"]; ?></div>
    <div class="priceDialog">
        <a href="<?php if($carrello["quantita"] > 1){
            echo $phpLessOperation;
        } else {
            echo "#";
        } ?>" class="btnminus">-</a>
        <div class="quantity"><?php echo $carrello["quantita"]; ?></div>
        <a href="oneMore.php?id=<?php echo $articolo['id_articolo']; ?>" class="btnplus">+</a>
        <div class="price"><?php echo $attributiArticolo["prezzo"] * $carrello["quantita"]; ?>$</div>
    </div>
    <hr/>
</div>
