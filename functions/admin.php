<?php
   require_once __DIR__ . "/database/database.php";

   session_start();

   if(!isset($_SESSION['admin_name'])){
      header('location: /admin.php');
   }