<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AppModel.php';

	$userModel = new UserModel();
	$appModel = new AppModel();
   
	$solvedApps = $appModel->getApproved();
	$solvedAppsNotEmpty = !empty($solvedApps);
?>
<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Сделаем лучше вместе!</title>
   <link rel="stylesheet" href="assets/css/main.css">
   <link rel="stylesheet" href="assets/css/media.css">
</head>
<body>
   <header class="header">
      <div class="container">
         <div class="header__content">
            <a href="index.php" class="logo">
               <img src="assets/images/logo/logo.svg" alt="LOGO">
            </a>
            <div class="inline">
               <?php if($userModel->islogged()): ?>
						<?php if($userModel->isAdmin()): ?>
							<a href="admin.php" class="btn"><?= $userModel->get('name'); ?></a>
						<?php else: ?>
							<a href="profile.php" class="btn"><?= $userModel->get('name'); ?></a>
						<?php endif; ?>
					<?php else: ?>
                  <a href="login.php" class="btn">Войти</a>
                  <a href="register.php" class="btn">Создать аккаунт</a>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Городской портал - Сделаем лучше вместе!</h1>
            </div>
            <div class="section__content">
               <!-- Счётчик решенных заявок -->
               <div class="app-counter">
						<span class="app-counter__text text_muted">Заявок решено:</span>
						<strong class="app-counter__value text_muted">0</strong>
					</div>
               <!-- Решенные заявки -->
               <?php if ($solvedAppsNotEmpty): ?>
               <div class="applications">
                  <?php foreach($solvedApps as $app): ?>
								<?php
									$photo = 'data:image/png;base64,' . base64_encode($app['photo']);
									$photoAfter = 'data:image/png;base64,' . base64_encode($app['photo_after']);
								?>
                     <div class="application">
                        <div class="application__photos">
                           <img src="<?= $photo ?>" alt="<?= $app['name'] . ' до' ?>" class="application__img application__img_after">
                           <img src="<?= $photoAfter ?>" alt="<?= $app['name'] . ' после' ?>" class="application__img application__img_before">
                        </div>
                        <p class="application__name"><?= $app['name'] ?></p>
                        <div class="inline">
                           <p class="application__date"><?= $app['created'] ?></p>
                           <p class="application__category text-limit text_muted" title="<?= $appModel->getCat($app['cat_id']) ?>">Категория: <?= $appModel->getCat($app['cat_id']) ?></p>
                        </div>
                     </div>
                  <?php endforeach; ?>
                  </div>
					</div>
					<?php else: ?>
						<p class="text_center">Пока что решенных заявок нет!</p>
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
   
   <script src="assets/js/counter.js"></script>
   <script src="assets/js/main.js"></script>
</body>
</html>