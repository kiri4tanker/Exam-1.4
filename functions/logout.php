<?php
   require_once __DIR__ . "/database/database.php";

   session_start();
   session_unset();
   session_destroy();

   header('location: /index.php');