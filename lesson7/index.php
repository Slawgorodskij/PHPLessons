<?php
include_once 'engine/main.php';
include_once 'templates/header.php';
?>
<main class="main container">

  <h1 class="title"><?php echo $titlePage ?></h1>

  <h3>1. Создать модуль корзины, в которую можно как добавлять товары, так и удалять их из неё.
  </h3>
  <h3>
    2. Создать модуль личного кабинета, на который будет перенаправляться пользователь после логина. Вывести там имя, логин и приветствие.
  </h3>
  <h3>
    3. *Создать модуль регистрации пользователя.
  </h3>

  <p>Задания выполнены в одном макете</p>

  <a class="link-btn" href="catalog.php">Предлагаю посетить интернет магазин</a>

</main>
<?php
include_once 'templates/footer.php'
?>