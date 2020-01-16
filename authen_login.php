<?php 
    require('db_connect.php');
    if(isset($_POST['username']) and isset($_POST['password'])){
        //assignign post values to variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        //checking the record
        $query = "SELECT * FROM 'user_login' WHERE username='$username' and Password='$password'";
        $result = mysqli_query($connection, $query) or die (mysqli_error($connection));
        $count = mysqli_num_rows($result);

        if($count == 1){
            echo"<script type='text/javascript'>alert('Login credentials verified')</script>";
        }else{
            echo"<script type='text/javascript'>alert('Invalid login credentials')</script>";
        }
    }
?>