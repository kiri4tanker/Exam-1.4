<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();
	
	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if (!$userModel->isAdmin()) return $userModel->redirect('profile.php');

	$appModel = new AppModel();

	$apps = $appModel->getAll();
	$appsNotEmpty = !empty($apps);

	$isError = $_GET['error'] ?? '';
?>
<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Административная панель</title>
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
               <a href="appCategory.php" class="btn">Управление категориями</a>
					<a href="actions/logout.php" class="btn">Выйти</a>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <!-- Админ-панель -->
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Добро пожаловать, <?= $userModel->get('name') ?></h1>
            </div>
            <div class="section__content">
            <?php if($isError): ?>
						<div class="alert">
							<div class="alert__content">
								<span class="alert__text">Размер файла слишком большой!</span>
								<button class="btn-close">&times;</button>
							</div>
						</div>
					<?php endif; ?>
				<?php if($appsNotEmpty): ?>
            <div class="profile">
               <div class="profile__heading">
                  <h2 class="profile__title">Все заявки</h2>
               </div>
               <div class="profile__content">
                  <!-- Таблица заявок -->
                  <div class="table-media">
                     <table class="table">
                        <!-- Название колонок -->
                        <tr class="row row_title">
                           <td class="column">Название</td>
                           <td class="column">Статус</td>
                           <td class="column">Категория</td>
                           <td class="column">Временная метка</td>
                           <td class="column">Описание</td>
                           <td class="column" colspan="2">Изменение</td>
                        </tr>
                        <!-- Колонки -->
                        <?php foreach($apps as $app): ?>
                           <?php
                              $notNew = $appModel->getField('status', $app['id']) != 'Новая';
                              $isApproved = $appModel->getField('status', $app['id']) == 'Решена';
                              $isCancel = $appModel->getField('status', $app['id']) == 'Отклонена';

                              $color = '';

                              if ($isApproved) {
                                 $color = 'text-accent';
                              } elseif ($isCancel) {
                                 $color = 'text-danger';
                              }
                           ?>
                           <tr class="row">
                              <td class="column"><?= $app['name'] ?></td>
                              <td class="column">
                                 <p class="<?= $color ?>"><?= $app['status'] ?></p>
                                 <p><?= $isCancel ? 'Причина: ' . $app['reason'] : '' ?></p>
                              </td class="column">
                              <td class="column"><?= $appModel->getCat($app['cat_id']); ?></td>
                              <td class="column"><?= $app['created'] ?></td>
                              <td class="column"><?= $app['text'] ?></td>
                              <td class="column"><a href="#" data-modal-open="app-approve" data-app-id="<?= $app['id'] ?>" class="link <?= $notNew ? 'link_disabled' : '' ?>">Одобрить</a></td>
                              <td class="column"><a href="#" data-modal-open="app-cancel" data-app-id="<?= $app['id'] ?>" class="link <?= $notNew ? 'link_disabled' : '' ?>">Отклонить</a></td>
                           </tr>
                        <?php endforeach; ?>
                     </table>
                  </div>
                  <?php else: ?>
						   <p>Заявок от пользователей пока нет.</p>
					   <?php endif; ?>
               </div>
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
   <!-- Отклонить заявку модальное окно -->
	<div class="modal" id="app-cancel">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Отклонить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<form style="width: 100%;" action="actions/appCancel.php" method="post">
					<input type="hidden" name="app-cancel-id" id="app-cancel-id">
					<div class="inline__between">
						<textarea required class="input" name="reason" placeholder="Причина отказа"></textarea>
					</div>
					<div class="inline">
						<button class="btn">Отклонить</button>
						<a class="btn" href="#" data-modal-close>Закрыть</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Подтвердить решение заявки модальное окно -->
	<div class="modal" id="app-approve">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Заявка решена?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<form style="width: 100%;" enctype="multipart/form-data" action="actions/appApprove.php" method="post">
					<input type="hidden" name="app-approve-id" id="app-approve-id">
					<div class="inline__between">
					   <input required class="input" type="file" name="photoAfter" accept="image/jpg, image/jpeg, image/png, image/bmp" placeholder="Фотография заявки">
					</div>
					<div class="inline">
						<button class="btn">Решена</button>
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