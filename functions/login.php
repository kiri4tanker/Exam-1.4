<?php
   require_once __DIR__ . "/database/database.php";

   session_start();

   function validateLogin(array $data): array{
      $errors = [];

      if (!filter_var($data["login"])){
         $errors["login"] = true;
      }

      if (empty($data["password"])){
         $errors["password"] = true;
      }
      return $errors;
   }

   //  Поиск по login из БД user для авторизации
   function fetchUserByLogin(object $dbh,string $login){
      $sql = "SELECT * FROM `users` WHERE `login` = :login";
      $params = ["login" => $login];

      $fetchUser = $dbh->prepare($sql);
      $fetchUser->execute($params);
      return $fetchUser->fetch(PDO::FETCH_ASSOC);
   }

   