<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	// Удаление заявки с редиректом

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if ($userModel->isAdmin()) return $userModel->redirect('admin.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';
		
		$appModel = new AppModel();

		$id = $_POST['app-delete-id'];

		$appModel->delApp($id);
		$userModel->redirect('profile.php');
	}
