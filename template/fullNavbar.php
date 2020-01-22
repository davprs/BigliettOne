<header id = "titleNav">

    <div class="header">
        <span class="menu" onclick="openNavMobile()">
            <img src="img/menu.png" alt="Carrello"/>
        </span>
        <a class="title" href="<?php echo INDEX ?>">
             <img src="img/title.png" alt="BigliettOne" height="40px" width="100px">
        </a>
        <a class="cartIcon" href="<?php echo CART ?>">
            <img src="img/cart.png" alt="Carrello"/>
        </a>
        <a class="notifIcon" href="<?php echo NOTIFICATION ?>">
            <img src="img/notification.jpg" alt="Notifiche">
        </a>
    </div>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavMobile()">&times;</a>
        <div class="overlay-content">
            <?php require($templateParams["overlayMenu"]); ?>
        </div>
    </div>

    <nav id="navbar"><a class="active" href="#home">Home</a><a href="#concerto">Concerti</a><a href="#sagra">Sagre</a><a href="#convegno">Convegni</a></nav>
</header>
