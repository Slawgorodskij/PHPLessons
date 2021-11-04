<?php
$title = 'PHP урок № 3';
$titlePage = 'Домашнее задание третьего урока';
$footer = 'Изготовлено в домашних условиях Славгородским В.В.';
$dateYear = date('Y');

//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

function task_1($startNumber, $finishNumber)
{
    $i = $startNumber;
    while ($i <= $finishNumber) {
        if ($i % 3 === 0) {
            echo $i . ',' . ' ';
        }
        $i++;
    }
}

//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
// 0 – это ноль.
// 1 – нечётное число.
// 2 – чётное число.
// 3 – нечётное число.
// …
// 10 – чётное число.

function task_2($startNumber, $finishNumber)
{
    $i = $startNumber;
    do {
        if ($i === 0) :
            echo $i . ' - это ноль. <br>';
        elseif ($i % 2 === 0) :
            echo $i . ' - это четное число. <br>';
        else :
            echo $i . ' - это нечетное число. <br>';
        endif;
        $i++;
    } while ($i <= $finishNumber);
}

// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области.
//       Вывести в цикле значения массива, чтобы результат был таким:
//       Московская область:
//       Москва, Зеленоград, Клин.
//       Ленинградская область:
//       Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
//       Рязанская область…(названия городов можно найти на maps.yandex.ru).

$regionsRussia = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин', 'Красногорск',
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт',
    ],
    'Рязанская область' => [
        'Рязань', 'Касимов', 'Сасово', 'Скопин',
    ],
    'Кемеровская область' => [
        'Кемерово', 'Новокузнецк', 'Мариинск', 'Тайга',
    ],
];

//первый вариант:
function task_3a($arr)
{
    foreach ($arr as $key => $value) {
        echo "<p> $key: <br>";
        foreach ($value as $valueSity) {
            echo " $valueSity\n";
        };
        echo '</p>';
    }
}

// Второй вариант:
function task_3($arr)
{
    foreach ($arr as $key => $value) {
        echo "<p> $key: <br>";
        for ($i = 0; $i < count($value); $i++) {
            if ($i !== count($value) - 1) {
                echo " $value[$i],\n";
            } else {
                echo " $value[$i]. </p>";
            };
        };
    };
};
// 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//       Написать функцию транслитерации строк.

$rusWords = 'сделать дело и пойти прогуляться.';

function changeWords($rusWord)
{
    $alphabet = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'ye',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'sh',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '\'',
        'ы' => 'y',
        'ь' => '\'',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];

    $modifiedText = strtr($rusWord, $alphabet);

    return $modifiedText;
}

// 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

$sentenceUser = 'Казнить нельзя помиловать.';

//первый вариант:
function changeSentence_1($sentence)
{
    $wordSentence = explode(' ', $sentence);
    $newSentence = implode('_', $wordSentence);
    return $newSentence;
}

// Второй вариант:
function changeSentence($sentence)
{
    return preg_replace('/\s/', '_', $sentence);
}

// 6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
$menu = [
    "Главная" => "index.php",
    "Предыдущий опыт" =>
    [
        "1 урок" => "../lesson1/index.php",
        "2 урок" => "../lesson2/index.php",
    ],
    "Помощь" => "https://www.php.net/manual/ru/",
];

function task_6($menu)
{
    echo "<ul>";
    foreach ($menu as $key => $value) {
        if (is_array($value)) {
            echo "$key <ul>";
            foreach ($value as $keyTwo => $valueTwo) {
                echo renderLi($keyTwo, $valueTwo);
            }
            echo '</ul>';
        } else {
            echo renderLi($key, $value);
        }
    }
    echo "</ul>";
}
function renderLi($name, $link)
{
    return "<li><a href='{$link}' target='_blank'> {$name}</a></li>";
}

// 7. *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. Выглядеть это должно так:
//     for(…){// здесь пусто}

function task_7()
{
    for ($i = 0; $i < 10; print $i++);
}

// 8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

function task_8($city)
{
    foreach ($city as $key) {
        foreach ($key as $valueSity) {
            $letters = preg_split('//u', $valueSity, -1, PREG_SPLIT_NO_EMPTY);
            if ($letters[0] === 'К') {
                echo " $valueSity\n";
            };
        };
    };
};


// 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

$userText = 'Не послать ли нам письмо.';

function task_9($text)
{
    $textTranslete = changeWords($text);
    $finichText = changeSentence($textTranslete);

    return $finichText;
}
