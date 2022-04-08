<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	// Отмена действия с редиректом

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';
		
		$appModel = new AppModel();

		$id = $_POST['app-cancel-id'];
		$reason = $_POST['reason'];

		$appModel->cancelApp($id, $reason);
		return $appModel->redirect('admin.php');
	}
