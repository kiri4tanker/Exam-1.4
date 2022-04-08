<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	// Регистрация

	$userModel = new UserModel();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = json_decode(file_get_contents('php://input'), true);

		$name = $data['name'];
		$login = $data['login'];
		$email = $data['email'];
		$password = $data['password'];

		$userModel->register($name, $login, $email, $password);
	}
