<?php
  include 'config.php';
  spl_autoload_register(function($class){
    include ('C:/xampp/htdocs/mvc/New_login/core/classes/'.$class.'.php');
  });
  $userObj = new Users;
  session_start();

 ?>
