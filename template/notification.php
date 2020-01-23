<?php
require_once 'config.php';
$articolo = $dbh->getArticle($notification["id_articolo"])[0];
 ?>

    <div class="notification">
        <table class="history_table">
            <tbody>
                <tr>
                    <td>
                        <div class="date">
                            <div class="date_brick" title="2019-11-29 04:39:26Z">
                                <?php echo $articolo["data"]; ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="article.php?id=<?php echo $notification["id_articolo"]; ?>" title="<?php echo $articolo["nome"]; ?>">
                            <img class="icon" src="<?php echo UPLOAD_DIR.$notification["immagine"]; ?>">
                        </a>
                    </td>
                    <td style="color:hotpink; width: 80px;">
                        <?php echo $notification["tipo"]; ?>
                    </td>
                    <td>
                        <a href="article.php?id=<?php echo $notification["id_articolo"]; ?>">
                            <span style="font-weight: bold; color:cornflowerblue;">
                                Out now
                            </span>
                            <br>
                            <span style="color:#444;">
                                <?php echo $notification["contenuto"]; ?>
                            </span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
