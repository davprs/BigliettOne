<div class="article" id="<?php echo $articolo["id_articolo"]; ?>">
    <a href="article.php?id=<?php echo $articolo["id_articolo"]; ?>"><img src="<?php echo UPLOAD_DIR.$articolo["immagine"]; ?>" alt="future" onload="resizeImg(this)"/></a>
    <div class="topband"></div>
    <div class="topleft"><?php echo $articolo["nome"]; ?></div>
    <div class="bottomband"></div>
    <div class="bottomleft"><?php echo $articolo["prezzo"]; ?>$</div>
    <div class="bottomright info"><a href="javascript:void(0)">Info</a></div>
    <div class="infopanel">L'evento si terrà in viale Giacomo ed Aldo, Milano.<br>Alle ore 21:00.</div>
</div>
