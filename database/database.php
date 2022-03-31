<?php
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=city',"root", "");
	} catch (\Exception $exception){
		echo "Ошибка при подключении БД<br>";
		echo $exception->getMessage();
		die();
	}
