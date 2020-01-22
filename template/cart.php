<div class="content">
    <div class="articlesInCart">
        <?php foreach ($templateParams["articlesInCart"] as $articolo): ?>
            <?php require "articlePreview.php"; ?>
        <?php endforeach; ?>

    </div>

    <div class="totalPrice">
        <p>Totale:</p>
        <p class="total"><p>
    </div>

</div>

<span href="#" class="acquista button"><p>Acquista</p></span>
