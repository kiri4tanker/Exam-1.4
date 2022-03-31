<?php
   require_once __DIR__ . "/database/database.php";

   function validateRegister(array $data): array{
		$errors = [];

		if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
			$errors["email"] = true;
		}

      if (!filter_var($data["login"])){
			$errors["login"] = true;
		}

		if (empty($data["name"])){
			$errors["name"] = true;
		}

		if (empty($data["password"]) || empty($data["password_confirm"]) || $data["password"] != $data["password_confirm"]){
			$errors["password"] = true;
		}
		return $errors;
	}
   
   function storeUser(object $dbh, string $email, string $login, string $name, string $password): void{
		$sql = "INSERT INTO `users` (`email`, `login`, `name`, `password`) VALUES (:email, :login, :name, :password)";
		$params = [
			"email" => $email,
         "login" => $login,
			"name" => $name,
			"password" => password_hash($password, PASSWORD_DEFAULT)
		];
		$dbh->prepare($sql)->execute($params);
	}