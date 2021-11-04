<!DOCTYPE html>
<?php
$title = 'PHP урок № 1';
$titlePage = 'Примеры рассмотренные на уроке';
$footer = 'Изготовлено в домашних условиях Славгородским В.В.'
?>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <title><?php echo $title ?></title>
</head>

<body>
  <header class="header">
    <div class="header__wrapper container">
      <div class="header__logo">GB</div>
      <div class="header__text"> Тяжело в учении легко в бою</div>
    </div>
  </header>

  <main class="main container">
    <h1 class="title"><?php echo $titlePage ?></h1>
    <h2 class="title">Первая программа</h2>
    <?php
    echo 'Hello, World';
    ?>
    <h2 class="title">Использование переменной</h2>
    <?php
    $name = 'GeekBrains user';
    echo "Hello, $name!";
    ?>
    <h2 class="title">Простейшие операции</h2>
    <p>...со строками</p>
    <?php
    $a = 'Hello,';
    $b = 'world';
    $c = $a . $b;
    echo $c;
    ?>
    <p>...математические</p>
    <?php
    $a = 4;
    $b = 5;
    echo $a + $b . '<br>';
    echo $a * $b . '<br>';
    echo $a - $b . '<br>';
    echo $a / $b . '<br>';
    echo $a % $b . '<br>';
    echo $a ** $b . '<br>';
    ?>

    <h2 class="title">Домашняя работа</h2>
    <p>Задание №1</p>
    <p>На операционной системе установил "Open Server 5.4.0".
      Эта сборка содержит веб-сервер, базы данных, интерпретатор PHP
    </p>
    <div class="block-photo">
      <figure class="photo">
        <img class="photo__images" src="image/photo.png" alt="">
        <figcaption class="photo__text">Фотография установленных программ</figcaption>
      </figure>

      <figure class="photo">
        <img class="photo__images" src="image/photo2.png" alt="">
        <figcaption class="photo__text">Фотография браузера с открытой страницей</figcaption>
      </figure>
    </div>


    <p>Задание №№2, 4</p>
    <p>Выполнил в верху по тексту</p>
    <p>Задание №3</p>
    <?php
    $a = 5;
    $b = '05';
    ?>
    <p>var_dump($a == $b) при $a = 5 и $b = '05' выведет <?php echo var_dump($a == $b) ?> в связи с осуществлением сравнения по значениям переменных строка будет преобразована в целочисленное значение, соответственно выражение будет идентично 5 = 5 </p>
    <p>var_dump((int)'012345') выведет <?php echo var_dump((int)'012345') ?> в связи с приведением в int строка будет преобразована в целочисленное (десятичное) значение, соответственно 0 будет "отброшен". </p>
    <p>var_dump((float)123.0 === (int)123.0) выведет <?php echo var_dump((float)123.0 === (int)123.0) ?> в связи с тем что при сравнении значения будут равны, но типы равны не будут, поэтому небудет равенства. </p>
    <p>var_dump((int)0 === (int)'hello, world') выведет <?php echo var_dump((int)0 === (int)'hello, world') ?> в связи с тем что типы равны в обоих случаях "int", значения также будут равны 0 это 0; строка 'hello, world' при приведении к типу "int" не может быть приведена к целочисленному значению, поэтому даст 0, а 0 = 0. </p>

    <p>Задание №5</p>
    <p>*Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось: a = 2 b = . Дополнительные переменные использовать нельзя.</p>
    <?php
    $one = 1;
    $two = 2;
    echo "Переменная 'one' равна $one <br>";
    echo "Переменная 'two' равна $two <br>";
    list($one, $two) = [$two, $one];
    echo 'После применения функции' . ' ' . 'list($one, $two) = [$two, $one];' . '<br>';
    echo "Переменная 'one' равна $one <br>";
    echo "Переменная 'two' равна $two <br>";
    ?>
    // второй вариант
    <?php
    $three = 3;
    $four = 4;
    echo "Переменная 'three' равна $three <br>";
    echo "Переменная 'four' равна $four <br>";
    $three = $three - $four;
    $four = $three + $four;
    $three = $four - $three;
    echo "Переменная 'three' равна $three <br>";
    echo "Переменная 'four' равна $four <br>";
    ?>
  </main>

  <footer class="footer"><?php echo $footer ?></footer>
</body>

</html>
