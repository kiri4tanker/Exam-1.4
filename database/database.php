<?php
	require_once 'setupDatabase.php';

	try {
		$db = new PDO('mysql:host=localhost', 'root', '', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);

		setupDatabase($db);
	} catch(PDOException $e) {
		echo $e;
	}