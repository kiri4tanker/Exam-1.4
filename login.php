<?php require_once __DIR__ . "/database/database.php" ?>
<?php require_once __DIR__ . "/models/login.php" ?>
<?php require_once __DIR__ . "/models/logout.php" ?>
<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Авторизация</title>
   <link rel="stylesheet" href="asstes/css/main.css">
   <link rel="stylesheet" href="asstes/css/media.css">
</head>
<body>
   <header class="header">
      <div class="container">
         <div class="header__content">
            <a href="index.php" class="logo">
               <img src="assets/images/logo/logo.png" alt="LOGO" class="logo__img">
            </a>
            <a href="login.php" class="btn">Главная</a>
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
               <form action="" method="post" class="login">
                  <h3 class="login__name">Авторизация</h3>
                  <input type="text" name="login" placeholder="Введите логин" class="input" required>
                  <input type="password" name="password" placeholder="Введите пароль" class="input" required>
                  <input type="submit" name="submit" value="Войти" class="btn">
               </form>
            </div>
         </div>
      </section>
   </main>
   <footer class="footer">
      <div class="container">
         <div class="footer__content">
            <a href="index.php" class="logo">
               <img src="assets/images/logo/logo.png" alt="LOGO" class="logo__img">
            </a>
            <p class="copyright">© Терентьев Кирилл. Все права защищены 2022</p>
         </div>
      </div>
   </footer>
   <script src="assets/js/main.js"></script>
</body>
</html>