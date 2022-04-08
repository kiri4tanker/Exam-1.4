<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	// Выход
	
	$userModel = new UserModel();
	$userModel->logout();
