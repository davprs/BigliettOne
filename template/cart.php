<div class="content">
    <div class="articlesInCart">
        <?php foreach ($templateParams["articlesInCart"] as $articolo): ?>
            <?php if(! is_null($articolo["id_articolo"])): ?>
                <?php require "articlePreview.php"; ?>
        <?php endif;
    endforeach; ?>

    </div>

    <div class="totalPrice">
        <p>Totale:</p>
        <p class="total"><p>
    </div>

</div>

<span class="acquista button"><p><a href="buy.php?id=<?php print_r($templateParams["articlesInCart"][0]["id_carrello2"]); ?>">Acquista</a></p></span>
