<!DOCTYPE html>
<?php
include 'main.php';
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
      <div class="header__menu">Меню
        <svg class="header__menu-icons" viewBox="0 0 32 23" width="32" height="23">
          <path d="M0 23V20.31H32V23H0ZM0 12.76V10.07H32V12.76H0ZM0 2.69V0H32V2.69H0Z" />
        </svg>
      </div>
    </div>
  </header>
  <div class="modal-menu inactive">
    <img class="modal-menu__icon" src="images/cross.svg" alt="cross">
    <?php
    task_6($menu)
    ?>
  </div>
  <main class="main container">
    <h1 class="title"><?php echo $titlePage ?></h1>

    <h3>1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.</h3>
    <p>
      <span> $i = 0;</span>
      <span>while ($i <= 100) {</span>
          <span> if ($i % 3 === 0) {</span>
          <span> echo $i . ',' . ' ';</span>
          <span>}</span>
          <span>return $i++;</span>
          <span>}</span>
    </p>

    <?php
    task_1(0, 100)
    ?>

    <h3>2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
      <span>0 – это ноль.</span>
      <span>1 – нечётное число.</span>
      <span>2 – чётное число.</span>
      <span>3 – нечётное число.</span>
      <span>…</span>
      <span>10 – чётное число.</span>
    </h3>
    <p>
      <span>$i = 0;</span>
      <span>do {</span>
      <span>if ($i === 0) :</span>
      <span>echo $i . ' - это ноль.';</span>
      <span>elseif ($i % 2 === 0) :</span>
      <span>echo $i . ' - это четное число.';</span>
      <span>else :</span>
      <span>echo $i . ' - это нечетное число.';</span>
      <span>endif;</span>
      <span>$i++;</span>
      <span>} while ($i <= 10);</span>
    </p>

    <?php
    task_2(0, 10)
    ?>

    <h3>3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области.
      Вывести в цикле значения массива, чтобы результат был таким:
      Московская область:
      Москва, Зеленоград, Клин.
      Ленинградская область:
      Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
      Рязанская область…(названия городов можно найти на maps.yandex.ru).</h3>
    <p>
      <span>foreach ($arr as $key => $value) {</span>
      <span>echo "$key:";</span>
      <span>foreach ($value as $valueSity) {</span>
      <span>echo " $valueSity\n";</span>
      <span>};</span>
      <span>}</span>
    </p>

    <?php
    task_3($regionsRussia)
    ?>

    <h3>4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
      Написать функцию транслитерации строк. </h3>
    <p>
      <span>echo strtr($rusWord, $alphabet);</span>
    </p>

    <?php
    echo changeWords($rusWords);
    ?>

    <h3>5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.</h3>
    <p>Правильность работы проверим на предложении "Казнить нельзя помиловать."</p>
    <p>Первый вариант:</p>
    <p>
      <span>$wordSentence = explode(' ', $sentence);</span>
      <span> $newSentence = implode('_', $wordSentence);</span>
    </p>

    <?php
    echo changeSentence_1($sentenceUser);
    ?>

    <p>Второй вариант:</p>
    <p>
      <span>preg_replace('/\s/', '_', $sentence);</span>
    </p>

    <?php
    echo changeSentence($sentenceUser);
    ?>

    <p>6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.</p>
    <p>Создаю массив с данными для меню</p>
    <p>
      <span>$menu = [</span>
      <span>"Главная" => "index.php",</span>
      <span>"Предыдущий опыт" => [</span>
      <span>"1 урок" => "../lesson1/index.php",</span>
      <span>"2 урок" => "../lesson2/index.php", ],</span>
      <span>"Помощь" => "https://www.php.net/manual/ru/", ];</span>

    </p>
    <p>Функции обхода массива и отрисовки HTML кода</p>
    <p>
      <span>function task_6($menu)</span>
      <span>{</span>
      <span>echo "<ul>";</span>
      <span>foreach ($menu as $key => $value) {</span>
      <span>if (is_array($value)) {</span>
      <span>echo "$key <ul>";</span>
      <span>foreach ($value as $keyTwo => $valueTwo) {</span>
      <span>echo renderLi($keyTwo, $valueTwo);</span>
      <span>};</span>
      <span>echo '</ul>';</span>
      <span>} else {</span>
      <span>echo renderLi($key, $value);</span>
      <span>};</span>
      <span>};</span>
      <span>echo "</ul>";</span>
      <span>};</span>
      <span>function renderLi($name, $link)</span>
      <span>};</span>
      <span> return "<li><a href='{$link}' target='_blank'> {$name}</a></li>";</span>
      <span>};</span>
    </p>

    <p>
      Проверка кода в 'header', кнопка 'меню'
    </p>

    <h3>7. *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. Выглядеть это должно так: for(…){ здесь пусто}. </h3>
    <p>
      <span>for ($i = 0; $i < 10; print $i++)</span>
    </p>

    <?php
    task_7();
    ?>

    <h3>8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».</h3>
    <p>
      <span>function task_8($city)</span>
      <span>{</span>
      <span>foreach ($city as $key) {</span>
      <span>foreach ($key as $valueSity) {</span>
      <span> $letters = preg_split('//u', $valueSity, -1, PREG_SPLIT_NO_EMPTY);</span>
      <span>if ($letters[0] === 'К') {</span>
      <span>echo " $valueSity\n";</span>
      <span>};</span>
      <span>};</span>
      <span>};</span>
      <span>};</span>
    </p>

    <?php
    echo task_8($regionsRussia);
    ?>

    <h3>9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).</h3>
    <p>
      <span>$userText = 'Не послать ли нам письмо';</span>
      <span>function task_9($text)</span>
      <span>{</span>
      <span>$textTranslete = changeWords($text);</span>
      <span>$finichText = changeSentence($textTranslete);</span>
      <span>return $finichText;</span>
      <span>}</span>
    </p>

    <?php
    echo task_9($userText);
    ?>

  </main>

  <footer class="footer"><?php echo $footer ?> <br> <?php echo $dateYear ?></footer>

  <script>
    document.querySelector('.header__menu').addEventListener('click', () => {
      document.querySelector('.modal-menu').classList.remove('inactive')
    })
    document.querySelector('.modal-menu__icon').addEventListener('click', () => {
      document.querySelector('.modal-menu').classList.add('inactive')
    })
  </script>
</body>

</html>