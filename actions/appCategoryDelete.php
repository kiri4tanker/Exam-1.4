<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

	// Удаление категории с редиректом
	
	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';
		
		$appModel = new AppModel();

		$id = $_POST['app-category-delete-id'];

		$appModel->delCat($id);
		$userModel->redirect('appCategory.php');
	}
