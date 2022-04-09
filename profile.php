<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();
	$appModel = new AppModel();

	if (!$userModel->isLogged()) return $userModel->redirect('index.php');
	if ($userModel->isAdmin()) return $userModel->redirect('admin.php');	

	$status = $_GET['status'] ?? '';

	if (empty($status)) {
		$apps = $userModel->getApps();
	} else {
		$apps = $userModel->getAppsWithStatus($status);
	}

	$appsNotNull = !empty($apps);
?>
<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Личный кабинет</title>
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
               <a href="appAdd.php" class="btn">Создать заявку</a>
               <a href="actions/logout.php" class="btn">Выйти</a>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <!-- Личный кабинет пользователя -->
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Добро пожаловать, <?= $userModel->get('name'); ?></h1>
            </div>
            <div class="section__content">
               <div class="profile">
                  <div class="profile__heading">
                     <h2 class="profile__title">Мои заявки</h2>
                  </div>
                  <div class="profile__content">
                     <!-- Фильтр -->
                     <div class="inline">
                        <form class="inline__between">
                           <!-- Статусы -->
                           <select class="input" name="status">
                              <option value="">Все заявки</option>
                              <option <?= $status == 'Новая' ? 'selected' : '' ?> value="Новая">Новая</option>
								      <option <?= $status == 'Решена' ? 'selected' : '' ?> value="Решена">Решена</option>
								      <option <?= $status == 'Отклонена' ? 'selected' : '' ?> value="Отклонена">Отклонена</option>
                           </select>
                           <button class="btn">Вывести</button>
                        </form>
					      </div>
                     <!-- Таблица с заявками -->
                     <?php if ($appsNotNull): ?>
                     <table class="table">
                        <!-- Названия колонок -->
                        <tr class="row row_title">
                           <td class="column">Название</td>
                           <td class="column">Статус</td>
                           <td class="column">Категория</td>
                           <td class="column">Временная метка</td>
                           <td class="column">Описание</td>
                           <td class="column">Изменение</td>
                        </tr>
                        <!-- Колонка -->
                        <?php foreach($apps as $app): ?>
                           <?php
                              // Статусы 
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
                              <td class="column"><?= $appModel->getCat($app['cat_id']) ?></td>
                              <td class="column"><?= $app['created'] ?></td>
                              <td class="column"><?= $app['text'] ?></td>
                              <td class="column"><a href="#" data-modal-open="app-delete" data-app-id="<?= $app['id'] ?>" class="link link_danger <?= $notNew ? 'link_disabled' : '' ?>">Удалить</a></td>
                           </tr>
							   <?php endforeach; ?>
                     </table>
                  <?php else: ?>
						   <p>Заявок не найдено.</p>
					   <?php endif; ?>
                  </div>
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
   <!-- Удаление заявки модальное окно -->
	<div class="modal" id="app-delete">
		<div class="modal__overlay" data-modal-close></div>
		<div class="modal__window">
			<div class="modal__heading">
				<h3 class="modal__title">Удалить заявку?</h3>
				<button class="btn-close" data-modal-close>&times;</button>
			</div>
			<div class="modal__content">
				<p>Данное действие нельзя будет отменить.</p>
				<form style="width: 100%;" method="post" action="actions/appDelete.php">
					<input type="hidden" name="app-delete-id" id="app-delete-id">
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