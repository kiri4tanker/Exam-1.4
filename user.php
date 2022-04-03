<!doctype html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Личный кабинет</title>
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
               <h1 class="section__title">Личный кабинет</h1>
            </div>
            <div class="section__content">
               <div class="profile">
                  <div class="profile__heading">
                     <h2 class="profile__title">Мои заявки</h2>
                     <button class="btn">Создать заявку</button>
                  </div>
                  <div class="profile__content">
                     <!-- Фильтр -->
                     <div class="inline">
                        <form class="inline__between">
                           <select class="input" name="filter">
                              <option selected disabled >Сортировать по статусу</option>
                              <option value="Новая">Новая</option>
                              <option value="Решена">Решена</option>
                              <option value="Отклонена">Отклонена</option>
                           </select>
                           <button class="btn">Вывести</button>
                        </form>
					      </div>
                     <!-- Таблица с заявками -->
                     <table class="table">
                        <tr class="row row_title">
                           <td class="column">Временная метка</td>
                           <td class="column">Название</td>
                           <td class="column">Описание</td>
                           <td class="column">Категория</td>
                           <td class="column">Статус</td>
                           <td class="column">Изменение</td>
                        </tr>
                        <tr class="row">
                           <td class="column">Временная метка</td>
                           <td class="column">Название</td>
                           <td class="column">Описание</td>
                           <td class="column">Категория</td>
                           <td class="column">Статус</td>
                           <td class="column"><a href="" class="link">Удалить</a></td>
                        </tr>
                        <tr class="row">
                           <td class="column">Временная метка</td>
                           <td class="column">Название</td>
                           <td class="column">Описание</td>
                           <td class="column">Категория</td>
                           <td class="column">Статус</td>
                           <td class="column"><a href="" class="link">Удалить</a></td>
                        </tr>
                        <tr class="row">
                           <td class="column">Временная метка</td>
                           <td class="column">Название</td>
                           <td class="column">Описание</td>
                           <td class="column">Категория</td>
                           <td class="column">Статус</td>
                           <td class="column"><a href="" class="link">Удалить</a></td>
                        </tr>
                     </table>
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
   <script src="assets/js/main.js"></script>
</body>
</html>