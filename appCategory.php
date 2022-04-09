<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	$appModel = new AppModel();

	$appCats = $appModel->getCats();
	$appCatsNotEmpty = !empty($appCats);
?>
<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Список категорий заявок</title>
   <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
   <header class="header">
      <div class="container">
         <div class="header__content">
            <a href="index.php" class="logo">
               <img src="assets/images/logo/logo.svg" alt="LOGO">
            </a>
            <a href="admin.php" class="btn"><?= $userModel->get('name') ?></a>
         </div>
      </div>
   </header>
   <main class="main">
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Категории</h1>
            </div>
            <div class="section__content">
               <div class="inline">
                  <form class="inline__between" action="actions/appCategoryAdd.php" method="post">
                     <!-- Добавление новой категории -->
                     <input required name="name" type="text" class="input" placeholder="Название категории">
                     <button class="btn">Добавить</button>
                  </form>
               </div>
               <div class="profile__content">
                  <!-- Таблица заявок -->
                  <?php if ($appCatsNotEmpty): ?>
                     <table class="table">
                        <!-- Название колонок -->
                        <tr class="row row_title">
                           <td class="column">Название</td>
                           <td class="column">Изменение</td>
                        </tr>
                        <?php foreach($appCats as $cat): ?>
                        <!-- Колонки -->
                        <tr class="row">
                           <td><?= $cat['name'] ?></td>
									<td><a href="#" data-modal-open="app-category-delete" data-app-id="<?= $cat['id'] ?>" class="link">Удалить</a></td>
                        </tr>
                        <?php endforeach; ?>
                     </table>
               </div>
               <?php else: ?>
						<p>К сожалению, категорий заявок пока нет.</p>
					<?php endif; ?>
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
   <!-- Удаление категории модальное окно -->
	<div class="modal" id="app-category-delete">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Удалить категорию заявки?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<p>Все заявки с данной категорией будут удалены!</p>
				<form style="width: 100%;" method="post" action="actions/appCategoryDelete.php">
					<input type="hidden" name="app-category-delete-id" id="app-category-delete-id">
					<div class="inline">
						<button class="btn">Удалить</button>
						<a class="btn" href="#" data-modal-close>Закрыть</a>
					</div>
				</form>
			</div>
		</div>
	</div>

   <script src="assets/js/modal.js"></script>
   <script src="assets/js/main.js"></script>
</body>
</html>