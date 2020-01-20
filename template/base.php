<?php
/*if(/*se ci sono notifiche non mostrate 1){
    if(isset($_COOKIE['notifications'])){
        setcookie('notifications', $_COOKIE['notifications'].';'."notifica", time() + (86400 * 30), "/");
    } else {
        setcookie('notifications', "notifica", time() + (86400 * 30), "/");
    }
}*/
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require($templateParams["head"]); ?>
    </head>
    <body>
        <?php require($templateParams["navbar"]);?>

        <a href="#" class="scrollToTop"><img src="img/go to top.png" /></a>
        <div class="alert"><?php echo $templateParams["alert"];?></div>
        <!--<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>-->

        <main>
            <?php require($templateParams["content"]); ?>
        </main>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <script>

        function openNavMobile() {
            document.getElementById("myNav").style.width = "100%";
            }

        function closeNavMobile() {
            document.getElementById("myNav").style.width = "0%";
        }

        function openNavBig() {
            document.getElementById("myNav").style.width = "20%";
        }

        function closeNavBig() {
            document.getElementById("myNav").style.width = "0";
        }



            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;

            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }

            function openAttachment() {
              document.getElementById('eventImg').click();
            }

            function fileSelected(input){
              document.getElementById('btnAttachment').value = "File: " + input.files[0].name
            }
        </script>


    </body>
</html>
