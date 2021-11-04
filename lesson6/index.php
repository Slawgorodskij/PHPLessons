<?php
include_once 'engine/main.php';
include_once 'templates/header.php';
?>
<main class="main container">
  <?php
  include_once 'engine/homeWorkTask.php'
  ?>
  <h1 class="title"><?php echo $titlePage ?></h1>

  <h3>1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега "select".</h3>


  <h4 class="title">Калькулятор</h4>
  <form action="index.php" method="post" class="calculator">
    <div class="calculator__input">
      <input class="calculator__input_mb-15" type="number" name="numOne">
      <input type="number" name="numTwo">
    </div>
    <div class="calculator__button">
      <select class="calculator__button_mb-15" name="operation">
        <option value="amount">+</option>
        <option value="difference">-</option>
        <option value="multiplication">*</option>
        <option value="dividing">/</option>
      </select>
      <input type="submit" value="Ввод">
    </div>

  </form>
  <p class="result">Результат: <?php echo dataProcessing() ?? 'Введите числа'; ?></p>


  <h3>
    2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.
  </h3>

  <h4 class="title">Калькулятор</h4>
  <form action="index.php" method="post" class="calculator calculator_wd-400">
    <div class="calculator__input calculator__input_mr-10">
      <input class="calculator__input_mb-15" type="number" name="numOne">
      <input type="number" name="numTwo">
    </div>
    <div class="calculator__button_two">
      <input type="submit" name="operation" value="Сложение">
      <input type="submit" name="operation" value="Вычитание">
      <input type="submit" name="operation" value="Умножение">
      <input type="submit" name="operation" value="Деление">
    </div>

  </form>
  <p class="result">Результат: <?php echo dataProcessingTwo() ?? 'Введите числа'; ?></p>



  <h3>
    3. Добавить функционал отзывов в имеющийся у вас проект.
  </h3>
  <h3>
    4. Создать страницу каталога товаров:
    товары хранятся в БД (структура прилагается);
    страница формируется автоматически;
    по клику на товар открывается карточка товара с подробным описанием.
    подумать, как лучше всего хранить изображения товаров.
  </h3>

  <p>Задания выполнены в одном макете</p>

  <h2 class="title">Каталог товаров</h2>

  <div class="product-items grid">
    <?php
    initializationPage();
    ?>
  </div>

</main>
<?php
include_once 'templates/footer.php'
?>