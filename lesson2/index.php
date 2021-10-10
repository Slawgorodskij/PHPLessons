<!DOCTYPE html>
<?php
$title = 'PHP урок № 2';
$titlePage = 'Домашнее задание второго урока';
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
    <p>1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
      если $a и $b положительные, вывести их разность;
      если $а и $b отрицательные, вывести их произведение;
      если $а и $b разных знаков, вывести их сумму;
      Ноль можно считать положительным числом.</p>
    <?php
    $a = 4;
    $b = 2;
    echo "При a = $a b = $b <br>";
    if ($a >= 0 && $b >= 0) {
      echo 'выведется разность чисел равная' . ' ' .  $a - $b;
    } else if ($a < 0 && $b < 0) {
      echo 'выведется произведение чисел равное' . ' ' . $a * $b;
    } else {
      echo 'выведется сумма чисел равная' . ' ' . $a + $b;
    }
    ?>

    <p>2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.</p>

    <?php
    $a = 4;

    switch ($a) {
      case '0':
        echo ' от заданного числа 0 до 15 будут выведены следующие числа: ';
        outputNumbers(0);
        break;
      case '1':
        echo ' от заданного числа 1 до 15 будут выведены следующие числа: ';
        outputNumbers(1);
        break;
      case '2':
        echo ' от заданного числа 2 до 15 будут выведены следующие числа: ';
        outputNumbers(2);
        break;
      case '3':
        echo ' от заданного числа 3 до 15 будут выведены следующие числа: ';
        outputNumbers(3);
        break;
      case '4':
        echo ' от заданного числа 4 до 15 будут выведены следующие числа: ';
        outputNumbers(4);
        break;
      case '5':
        echo ' от заданного числа 5 до 15 будут выведены следующие числа: ';
        outputNumbers(5);
        break;
      case '6':
        echo ' от заданного числа 6 до 15 будут выведены следующие числа: ';
        outputNumbers(6);
        break;
      case '7':
        echo ' от заданного числа 7 до 15 будут выведены следующие числа: ';
        outputNumbers(7);
        break;
      case '8':
        echo ' от заданного числа 8 до 15 будут выведены следующие числа: ';
        outputNumbers(8);
        break;
      case '9':
        echo ' от заданного числа 9 до 15 будут выведены следующие числа: ';
        outputNumbers(9);
        break;
      case '10':
        echo ' от заданного числа 10 до 15 будут выведены следующие числа: ';
        outputNumbers(10);
        break;
      case '11':
        echo ' от заданного числа 11 до 15 будут выведены следующие числа: ';
        outputNumbers(11);
        break;
      case '12':
        echo ' от заданного числа 12 до 15 будут выведены следующие числа: ';
        outputNumbers(12);
        break;
      case '13':
        echo ' от заданного числа 13 до 15 будут выведены следующие числа: ';
        outputNumbers(13);
        break;
      case '14':
        echo ' от заданного числа 14 до 15 будут выведены следующие числа: ';
        outputNumbers(14);
        break;
      case '15':
        echo ' от заданного числа 15 до 15 будут выведены следующие числа: ';
        outputNumbers(15);
        break;
      default:
        echo 'Введенное число не входит в массив от 0 до 15';
        break;
    }

    function outputNumbers($a)
    {
      for ($i = $a + 1; $i <= 15; $i++) {
        echo $i . ',' . ' ';
      }
    }
    ?>

    <p>3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.</p>

    <p> <span>function sumNumbers($x, $y)</span>
      <span>{</span>
      <span>return $x + $y;</span>
      <span>}</span>
    </p>
    <p> <span>function differenceNum($x, $y)</span>
      <span>{</span>
      <span>return $x - $y;</span>
      <span>}</span>
    </p>
    <p> <span>function multiplicationNum($x, $y)</span>
      <span>{</span>
      <span>return $x * $y;</span>
      <span>}</span>
    </p>
    <p> <span>function dividingNum($x, $y)</span>
      <span> {</span>
      <span>return $x / $y;</span>
      <span> }</span>
    </p>


    <?php
    function sumNumbers($x, $y)
    {
      return $x + $y;
    }
    function differenceNum($x, $y)
    {
      return $x - $y;
    }
    function multiplicationNum($x, $y)
    {
      return $x * $y;
    }
    function dividingNum($x, $y)
    {
      return $x / $y;
    }

    echo 'Сумма х = 3, у = 5 равна' . ' ' .  sumNumbers(3, 5) . '<br>';
    echo 'Разность х = 10, у = 7 равна' . ' ' . differenceNum(10, 7) . '<br>';
    echo 'Произведение х = 5, у = 2 равно' . ' ' . multiplicationNum(5, 2) . '<br>';
    echo 'Частное х = 16, у = 4 равно' . ' ' . dividingNum(16, 4) . '<br>';
    ?>

    <p> Решение с использованием стрелочных функций</p>
    <p>$sumNumbers = fn ($x, $y) => $x + $y;</p>
    <p>$differenceNum = fn ($x, $y) => $x - $y;</p>
    <p>$multiplicationNum = fn ($x, $y) => $x * $y;</p>
    <p>$dividingNum = fn ($x, $y) => $x / $y;' </p>

    <?php
    $sumNumbers = fn ($x, $y) => $x + $y;
    $differenceNum = fn ($x, $y) => $x - $y;
    $multiplicationNum = fn ($x, $y) => $x * $y;
    $dividingNum = fn ($x, $y) => $x / $y;

    echo 'Сумма х = 3, у = 5 равна' . ' ' . $sumNumbers(3, 5) . '<br>';
    echo 'Разность х = 10, у = 7 равна' . ' ' . $differenceNum(10, 7) . '<br>';
    echo 'Произведение х = 5, у = 2 равно' . ' ' . $multiplicationNum(5, 2) . '<br>';
    echo 'Частное х = 16, у = 4 равно' . ' ' . $dividingNum(16, 4) . '<br>';
    ?>

    <p>4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).</p>
    <p> <span>function mathOperation($arg1, $arg2, $operation)</span>
      <span>{</span>
      <span>switch ($operation) {</span>
      <span> case 'amount':</span>
      <span> return sumNumbers($arg1, $arg2);</span>
      <span> break;</span>
      <span> case 'difference':</span>
      <span> return differenceNum($arg1, $arg2);</span>
      <span> break;</span>
      <span> case 'multiplication':</span>
      <span> return multiplicationNum($arg1, $arg2);</span>
      <span> break;</span>
      <span> case 'dividing':</span>
      <span> return dividingNum($arg1, $arg2);</span>
      <span> break;</span>
      <span> default:</span>
      <span> echo 'Что-то пошло не так...';</span>
      <span> break;</span>
      <span> }</span>
      <span> };</span>
    </p>

    <?php
    function mathOperation($arg1, $arg2, $operation)
    {
      switch ($operation) {
        case 'amount':
          return sumNumbers($arg1, $arg2);
          break;
        case 'difference':
          return differenceNum($arg1, $arg2);
          break;
        case 'multiplication':
          return multiplicationNum($arg1, $arg2);
          break;
        case 'dividing':
          return  dividingNum($arg1, $arg2);
          break;
        default:
          echo 'Что-то пошло не так...';
          break;
      }
    };

    echo mathOperation(3, 5, 'amount') . '<br>';
    echo mathOperation(10, 7, 'difference') . '<br>';
    echo mathOperation(5, 2, 'multiplication') . '<br>';
    echo mathOperation(16, 4, 'dividing') . '<br>';
    echo mathOperation(16, 4, 'dividin') . '<br>';
    ?>


    <p>5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.</p>
    <?php
    $dateYear = date('Y');
    ?>

    <p>6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.</p>
    <p> <span>function power($val, $pow)</span>
      <span>{</span>
      <span>static $result = 1;</span>
      <span> if (0 < $pow) { </span>
          <span>$result *= $val;</span>
          <span> power($val, $pow - 1);</span>
          <span>}</span>
          <span>return $result;</span>
          <span>}</span>
    </p>

    <?php
    function power($val, $pow)
    {
      static $result = 1;
      if (0 < $pow) {
        $result *= $val;
        power($val, $pow - 1);
      }
      return $result;
    }

    echo  '8 в степени 3 равно' . ' ' . power(8, 3);
    ?>

    <p>7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
      22 часа 15 минут
      21 час 43 минуты</p>


    <?php
    $dateHour = +date('H');
    $dateMinute = +date('i');

    function wordHour($checkedHour)
    {
      if (5 <= $checkedHour && $checkedHour <= 19) {
        return 'часов';
      }
      $checkedNameHour = $checkedHour % 10;

      if ($checkedNameHour === 0) :
        return 'часов';
      elseif ($checkedNameHour === 1) :
        return 'час';
      else :
        return 'часа';
      endif;
    }

    function wordMinute($checkedMinute)
    {
      if (5 <= $checkedMinute && $checkedMinute <= 19) {
        return 'минут';
      }
      $checkedNameHour = $checkedMinute % 10;

      if ($checkedNameHour === 0) :
        return 'минут';
      elseif ($checkedNameHour === 1) :
        return 'минута';
      else :
        return 'минуты';
      endif;
    }


    echo $dateHour . ' ' . wordHour($dateHour) . ' ';
    echo $dateMinute . ' ' . wordMinute($dateMinute);
    ?>




  </main>

  <footer class="footer"><?php echo $footer ?> <br> <?php echo $dateYear ?></footer>
</body>

</html>