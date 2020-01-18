<?php
   session_start();
   define('DB_SERVER', 'localhost');  //host's ip
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'blogtw');
   define('INDEX', 'index.php');
   define('CART', 'cart.php');
   define('NOTIFICATION', 'notification.php');
   define('ACCOUNT', 'account.php');
   define('SERVICE', 'customer_service.php');
   define('CONTACTS', 'contacts.php');
   define('LEGAL', 'info_legali.php');
   define('SIGNUP', 'signup.php');
   define('ALERT', '');
   define('CREATE', 'crea_evento.php');
   require_once("utils/functions.php");
   require_once("db/database.php");
   $dbh = new DatabaseHelper("localhost", "root", "", "bigliettone");
   //$db = new DatabaseHelper(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   //$db = new DatabaseHelper("localhost", "root", "", "blogtw");
?>
