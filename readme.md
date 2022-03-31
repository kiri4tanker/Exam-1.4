## Задание
* Адаптация
   * смартфоны с разрешением ```720x1440px```;
   * компьютеры с шириной экрана от ```1200px```.
* На сайте должны быть реализованы следующие страницы:
   * Главная страница, предоставляющая возможности авторизации и регистрации пользователей.
   * Личные кабинеты администратора и авторизованных пользователей 
* Логотип должен быть реализован в соответствии с требованиями:
   * В логотипе должны быть использованы основные цвета сайта;
   * Логотип представляет собой изображение;
* Портал должен поддерживать возможности 3 типов пользователей:
   * Гость (не авторизованный пользователь)
      * Вход в личный кабинет по логину и паролю
      * Регистрация
      * Просмотр главной страницы
   * Авторизованный пользователь
      * Регистрация, авторизация, выход;
      * Создание заявки на решение проблемы;
      * Просмотр своих заявок;
      * Удаление своей заявки.
   * Администратор
      * Смена статуса заявки на ```«Решена»``` или ```«Отклонена»```.
      * Управление категориями заявок (например, ```«ремонт дорог»```, ```«уборка мусора»``` и др.)
* Авторизация
   * При вводе неправильной пары логин-пароль пользователю отображается сообщение об ошибке.
   * При успешной авторизации пользователь должен перенаправляться в личный кабинет с возможностью просмотра своих заявок.
* Регистрация пользователя
   * Вся валидация должна работать без перезагрузки страницы, все поля обязательные для заполнения:
      * ФИО - только кириллические буквы, дефис и пробелы – :question: проверка на стороне клиента;
      * Логин – только латиница, уникальный - :question: проверка на стороне сервера;
      * Email - валидный формат email-адрес - :question: проверка на стороне клиента;
      * Пароль;
      * Повтор пароля – введенное значение должно совпадать с паролем;
      * Согласие на обработку персональных данных - должно быть отмечено.
      > В случае несоответствия любым требованиям выводится анимированное сообщение об ошибке, поля с ошибками выделяются, данные на сервер не отправляются.
      > Создайте учетную запись администратора с логином ```admin``` и паролем ```adminWSR```.
* Создание заявки:
   * Название;
   * Описание;
   * Категория;
   * Фото, демонстрирующее проблему в одном из форматов (```jpg```, ```jpeg```, ```png```, ```bmp```) максимальный размер ```10Мб```;
   > При невыполнении хотя бы одного из требований, заявка не сохраняется на сервере, выводится сообщения об ошибке.
   > Временная метка добавления заявки создается автоматически при добавлении заявки в базу данных.
   > При добавлении заявки она должна автоматически получить статус ```«Новая»```.
* Удаление заявки
   * При удалении заявки пользователю должно быть выведено сообщение с просьбой подтвердить желаемое действие. 
   > Пользователь может удалить только свою заявку, статус которой не был изменен администратором на ```«решено»``` или ```«отклонена»```.
* Просмотр своих заявок
   * На странице просмотра своих заявок необходимо отобразить список  своих заявок со следующими полями:
      * Временная метка
      * Название заявки
      * Описание заявки
      * Категория заявки
      * Статус заявки (```Новая```, ```Решена```, ```Отклонена```).
      > По умолчанию отображаются все заявки в порядке добавления заявок (недавно добавленные отображаются в начале таблицы).
      > Вам необходимо добавить возможности фильтрации заявок по статусу, например, отображение только заявок со статусом ```«Новая»```.
* Главная страница
   * На главной странице выводится не более 4 последних решенных проблем (фото решенной проблемы) со следующими полями:
      * Временная метка
      * Название
      * Категория заявки
      * Фотография
   > Изначально видна фотография ```«после»```. При наведении указателя мыши на фото ```«после»```, вместо него анимировано должна отображаться фотография ```«до»```. Стиль анимации: ```«масштабирование»```. После вывода указателя мыши с изображения появляется начальное изображение ```«после»``` с тем же стилем анимации.
* Добавьте на главную страницу счетчик:
   * Количество решенных заявок.
   * Информация о количестве решенных задачах обновляется автоматически, без перезагрузки страницы не реже чем 1 раз в 5 секунд.
   * В случае изменения значения счетчика должно звучать оповещение ```Notif.mp3```. 
   * Значение счетчика должно обновляться с анимацией.
* Смена статуса заявки
   * Заявке со статусом «Новая» можно сменить статус на ```«Решена»``` с обязательным прикреплением (добавлением) фотографии – доказательства решения проблемы (фотография ```«ПОСЛЕ»```).
   * Заявке со статусом «Новая» можно сменить статус на ```«Отклонена»``` с обязательным указанием причины отказа.
   * Смена статуса с ```«Решена»``` или ```«Отклонена»``` невозможна.
* Управление категориями заявок
   * Администратор может добавить или удалить категорию заявок.
   * При удалении категории должны быть удалены все заявки данной категории.
   > Заявки этой категории не отображаются.

