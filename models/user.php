<?php
   require_once __DIR__ . "/database/database.php";

   session_start();

   if(!isset($_SESSION['user_name'])){
      header('location: /user.php');
   }