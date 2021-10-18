<!DOCTYPE html>
<?php
include_once 'main.php';
include_once 'homeWorkTask.php'
?>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="parts/style.css">
  <title><?php echo $title ?></title>
</head>

<body>
  <header class="header">
    <div class="header__wrapper container">
      <div class="header__logo">GB</div>
      <div class="header__text"> Тяжело в учении легко в бою</div>
      <div class="header__menu">Меню
        <svg class="header__menu-icons" viewBox="0 0 32 23" width="32" height="23">
          <path d="M0 23V20.31H32V23H0ZM0 12.76V10.07H32V12.76H0ZM0 2.69V0H32V2.69H0Z" />
        </svg>
      </div>
    </div>
  </header>
  <div class="modal-menu inactive">
    <img class="modal-menu__icon modal__icon" src="images/header/cross.svg" alt="cross">
    <?php
    renderMenu($menu)
    ?>
  </div>
  <main class="main container">
    <h1 class="title"><?php echo $titlePage ?></h1>

    <h3>1. Создать галерею фотографий. Она должна состоять из одной страницы, на которой пользователь видит все картинки в уменьшенном виде. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width.</h3>

    <div class="list-images">
      <a href="images/main/01.jpg" class="list-images__item" target="_blank">
        <img src="images/main/01.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/02.jpg" class="list-images__item" target="_blank">
        <img src="images/main/02.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/03.jpg" class="list-images__item" target="_blank">
        <img src="images/main/03.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/04.jpg" class="list-images__item" target="_blank">
        <img src="images/main/04.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/05.jpg" class="list-images__item" target="_blank">
        <img src="images/main/05.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/06.jpg" class="list-images__item" target="_blank">
        <img src="images/main/06.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/07.jpg" class="list-images__item" target="_blank">
        <img src="images/main/07.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/08.jpg" class="list-images__item" target="_blank">
        <img src="images/main/08.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/09.jpg" class="list-images__item" target="_blank">
        <img src="images/main/09.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/10.jpg" class="list-images__item" target="_blank">
        <img src="images/main/10.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/11.jpg" class="list-images__item" target="_blank">
        <img src="images/main/11.jpg" class="list-images__photo" alt="photo">
      </a>
      <a href="images/main/12.jpg" class="list-images__item" target="_blank">
        <img src="images/main/12.jpg" class="list-images__photo" alt="photo">
      </a>
    </div>

    <h3>2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.</h3>
    <div class="list-images">
      <?php
      createArrayImage($nameTagTask2, $nameClassTask2)
      ?>
    </div>

    <h3>3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне. </h3>
    <div class="list-images">
      <?php
      createArrayImage($nameTagTask3, $nameClassTask3)
      ?>
    </div>
    <div class="modals inactive">
      <div class="modals__item">
        <img class="modal__icon modals-icon" src="images/header/cross.svg" alt="cross">
      </div>
    </div>
  </main>

  <footer class="footer"><?php echo $footer ?> <br> <?php echo $dateYear ?></footer>

  <script src="parts/script.js"></script>
</body>

</html>