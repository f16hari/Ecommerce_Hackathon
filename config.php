<?php
   error_reporting(0);

   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'vmkart');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   
   session_start();
   if(!isset($_SESSION['login_user'])){
      $user_check="";
      $login='<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
      
 }
 else{
   $login='<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>'; 
   $user_check = "Hi! ".$_SESSION['login_user'];
   
 }
 
?>