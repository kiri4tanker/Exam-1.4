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
               <a href="user.php" class="btn">Личный кабинет</a>
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
               <form action="" method="post" class="form">
                  <h2 class="login__name">Создание</h2>
                  <input type="text" name="login" placeholder="Введите название" class="input" required>
                  <select class="input text_muted" name="category" required>
                     <option selected disabled >Категории на выбор</option>
                     <option value="Новая">Дорога</option>
                     <option value="Решена">Дом</option>
                     <option value="Отклонена">Ремонт</option>
                  </select>
                  <textarea name="description" id="description" class="input text_muted" placeholder="Описание" required></textarea>
                  <input type="file" name="file" placeholder="Добавить фото" class="text_muted" required>
                  <input type="submit" name="submit" value="Создать" class="btn">
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