<?php
    require('db/db_connect.php');
    if(isset($_POST['username']) and isset($_POST['password'])){
        //assignign post values to variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['nome'];
        $surname = $_POST['cognome'];
        $birthday = $_POST['nascita'];

        $cookie_name = "user";
        $cookie_value = $username;


        if($dbh->isThereUsername($username)){
            $result = $dbh->checkLogin($username, $password);
            $count = mysqli_num_rows($result);

            if($count >= 1){
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('alert', 'Ben Tornato '.$username.'!', time() + 5);
                header("Location: ./account.php");

            }else{
                setcookie('alert', 'username già in uso !', time() + 5);
                header("Location: ./signup.php");
            }
        } else{
            $result = $dbh->signUp($username, $password, $name, $surname, $birthday);
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            setcookie('alert', 'Benvenuto a bordo '.$username.'!', time() + 5);
            header("Location: ./account.php");
        }
    }
?>
