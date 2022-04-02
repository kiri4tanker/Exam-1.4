<?php require_once __DIR__ . "/database/database.php" ?>
<?php require_once __DIR__ . "/models/register.php" ?>
<?php require_once __DIR__ . "/models/logout.php" ?>
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
            <a href="login.php" class="btn">Главная</a>
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
               <form action="" method="post" class="register">
                  <h3 class="register__name">Регистрация</h3>
                  <input type="text" name="name" placeholder="Введите ФИО" class="input" required>
                  <input type="text" name="login" placeholder="Введите логин" class="input" required>
                  <input type="email" name="email" placeholder="Введите email" class="input" required>
                  <input type="password" name="password" placeholder="Введите пароль" class="input" required>
                  <input type="password" name="password_confirm" placeholder="Повторите пароль" class="input" required>
                  <div class="checkbox">
                     <input class="checkbox__input" type="checkbox" name="checkbox" id="checkbox" required></input>
                     <label class="checkbox__box" for="checkbox"></label>
                     <label for="checkbox" class="checkbox__text">Согласие на обработку персональных данных</label>
                  </div>
                  <input type="submit" value="Создать аккаунт" class="btn">
                  <div class="inline">
                     <p class="register__text">Уже есть аккаунт?</p>
                     <a href="login.php" class="link">Войти</a>
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
   <script src="assets/js/main.js"></script>
</body>
</html>