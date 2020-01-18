<?php
    require('db/db_connect.php');
    if(isset($_POST['username']) and isset($_POST['password'])){
        //assignign post values to variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        //checking the record
        /*$query = "SELECT * FROM 'user_login' WHERE username='$username' and Password='$password'";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        $count = mysqli_num_rows($result);*/

        if(1 == 1){
            $cookie_name = "user";
            $cookie_value = "davide";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('alert', 'Ben Tornato !', time() + 5);
            header("Location: ./account.php");
            /*$templateParams["title"] = "My Account";
            $templateParams["navbar"] = "eventsNav.php";
            $templateParams["head"] = "head.php";
            $templateParams["alert"] = "Reindirizza all articolo";
            $templateParams["content"] = "boughtEvent.php";
            require 'template/base.php';*/

        }else{
            setcookie('alert', 'Credenziali non valide', time() + 5);
        }
    }
?>
