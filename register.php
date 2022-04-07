<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Регистрация</title>
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
               <a href="login.php" class="btn">Войти</a>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Регистрация на сайте</h1>
            </div>
            <div class="section__content">
               <!-- Оповещение -->
               <div class="alert alert_closed">
						<div class="alert__content">
							<span class="alert__text"></span>
							<button class="btn-close">&times;</button>
						</div>
					</div>
               <!-- Форма регистрации -->
               <form action="" id="register-form" method="post" class="form">
                  <h3 class="register__name">Регистрация</h3>
                  <input name="name" id="name" type="text" class="input" placeholder="Введите ФИО">
						<input name="login" id="login" type="text" class="input" placeholder="Введите логин">
						<input name="email" id="email" type="email" class="input" placeholder="Введите почту">
						<input name="password" id="password" type="password" class="input" placeholder="Введите пароль">
						<input name="password-repeat" id="password-repeat" type="password" class="input" placeholder="Повторите пароль">
                  <div class="checkbox">
                     <input class="checkbox__input" type="checkbox" name="privacy" id="privacy"></input>
                     <label for="privacy" class="checkbox__text text_muted">Согласие на обработку персональных данных</label>
                  </div>
                  <div class="inline inline__between">
                     <button class="btn">Создать аккаунт</button>
                     <div class="inline">
                        <span class="register__text text_muted">Уже есть аккаунт?</span>
                        <a href="login.php" class="link">Войти</a>
                     </div>
                  </div>
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