<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	// Подтверждение с редиректом

	$userModel = new UserModel();
	$appModel = new AppModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_FILES['photoAfter'])) {
			$id = $_POST['app-approve-id'];
			$photoAfter = file_get_contents($_FILES['photoAfter']['tmp_name']);
	
			$appModel->approveApp($id, $photoAfter);
			return $appModel->redirect('admin.php');
		}

		return $appModel->redirect('admin.php?error=1');
	}
