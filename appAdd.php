<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if ($userModel->isAdmin()) return $userModel->redirect('admin.php');

	$appModel = new AppModel();

	$appCats = $appModel->getCats();

	$isError = false;

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_FILES['photo'])) {
			$userId = $userModel->get('id');
			$catId = $_POST['cat-id'];
			$name = $_POST['name'];
			$text = $_POST['text'];
			$photo = file_get_contents($_FILES['photo']['tmp_name']);
			$created = date('d.m.Y H:i');

			$appModel->addApp($userId, $catId, $name, $text, $photo, $created);
			return $appModel->redirect('profile.php');
		}

		$isError = true;
	}
?>
<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Создание заявки</title>
   <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
   <header class="header">
      <div class="container">
         <div class="header__content">
            <a href="index.php" class="logo">
               <img src="assets/images/logo/logo.svg" alt="LOGO">
            </a>
            <div class="inline">
               <a href="profile.php" class="btn"><?= $userModel->get('name') ?></a>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Создание заявки</h1>
            </div>
            <div class="section__content">
               <!-- Форма создания заявки -->
               <form method="post" enctype="multipart/form-data" class="form">
                  <h2 class="login__name">Создание</h2>
                  <input type="text text_muted" name="name" placeholder="Введите название" class="input" required>
                  <select class="input text_muted" name="cat-id" required>
                     <?php foreach($appCats as $cat): ?>
								<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
							<?php endforeach; ?>
                  </select>
                  <textarea name="text" id="description" class="input text_muted" placeholder="Описание" required></textarea>
                  <input required class="input" type="file" name="photo" accept="image/jpg, image/jpeg, image/png, image/bmp" placeholder="Фотография заявки">
                  <button name="submit" class="btn">Создать</button>
               </form>
            </div>
         </div>
      </section>
   </main>
   <footer class="footer">
      <div class="container">
         <div class="footer__content">
            <a href="index.php" class="logo">
               <img src="assets/images/logo/logo__footer.svg" alt="LOGO">
            </a>
            <p class="copyright">© Терентьев Кирилл. Все права защищены 2022</p>
         </div>
      </div>
   </footer>
   
   <script src="assets/js/main.js"></script>
</body>
</html>