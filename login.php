<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Авторизация</title>
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
               <a href="index.php" class="btn">Главная</a>
               <a href="register.php" class="btn">Создать аккаунт</a>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Вход в личный кабинет</h1>
            </div>
            <div class="section__content">
               <!-- Оповещение -->
               <div class="alert alert_closed">
						<div class="alert__content">
							<span class="alert__text"></span>
							<button class="btn-close">&times;</button>
						</div>
					</div>
               <!-- Форма авторизации -->
               <form action="" method="post" class="form">
                  <h2 class="login__name">Авторизация</h2>
                  <input name="login" id="login" type="text" class="input" placeholder="Введите логин">
                  <input name="password" id="password" type="password" class="input" placeholder="Введите пароль">
                  <button class="btn">Войти</button>
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
   
   <script src="assets/js/validate.js"></script>
   <script src="assets/js/main.js"></script>
</body>
</html>