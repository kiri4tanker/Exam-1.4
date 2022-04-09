<?php
	require_once 'setupDatabase.php';
	require_once 'fillDatabase.php';

	try {
		$db = new PDO('mysql:host=localhost', 'root', '', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);

		setupDatabase($db);
		fillDatabase($db);
	} catch(PDOException $e) {
		echo $e;
	}