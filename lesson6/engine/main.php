<?php
$title = 'PHP урок № 6';
$titlePage = 'Домашнее задание шестого урока';
$footer = 'Изготовлено в домашних условиях Славгородским В.В. &copy;';
$dateYear = date('Y');
$menu = [
    "Главная" => "index.php",
    "Предыдущий опыт" =>
    [
        "1 урок" => "../lesson1/index.php",
        "2 урок" => "../lesson2/index.php",
        "3 урок" => "../lesson3/index.php",
        "4 урок" => "../lesson4/index.php",
        "5 урок" => "../lesson5/index.php",
    ],
    "Помощь" => "https://www.php.net/manual/ru/",
];

function renderMenu($menu)
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
