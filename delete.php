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
               <button type="submit" class="btn">Выйти</button>
            </div>
         </div>
      </div>
   </header>
   <main class="main">
      <section class="section">
         <div class="container">
            <div class="section__heading">
               <h1 class="section__title">Создание категории</h1>
            </div>
            <div class="section__content">
               <!-- Форма создания удаления заявки -->
               <form action="" method="post" class="form form_center">
                  <h2 class="form__name">Удаление</h2>
                  <p class="form__text">Вы уверены, что хотите удалить заявку?</p>
                  <button type="submit" class="btn">Удалить</button>
                     <div class="inline">
                        <span class="form__text text_muted">Если вы передумали, то</span>
                        <a href="user.php.php" class="link">Вернуться</a>
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