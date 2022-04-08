<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	// Уникальный логин

	$userModel = new UserModel();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = json_decode(file_get_contents('php://input'), true);

		if (!$userModel->isLoginUnique($data['login'])) {
			echo json_encode([
				'isLoginUnique' => false
			]);
			
			return;
		}

		echo json_encode([
			'isLoginUnique' => true
		]);
	}
