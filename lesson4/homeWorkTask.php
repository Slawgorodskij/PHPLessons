<?php

//2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
$nameTagTask2 = 'a';
$nameClassTask2 = 'list-images__photo';
$nameTagTask3 = 'div';
$nameClassTask3 = 'list-images__photo list-js';

function createArrayImage($nameTag, $nameClass)
{
    $images = scandir('images/main');
    foreach ($images as $photo) {
        if (is_file('images/main/' . $photo)) {
            renderListImage($nameTag, $nameClass, $photo);
        }
    }
}

function renderListImage($nameTag, $nameClass, $photo)
{
    $hyperlink = '';
    $target = '';
    if ($nameTag === 'a') {
        $hyperlink = "href='images/main/{$photo}'";
        $target = "target='_blank'";
    }

    echo "<$nameTag $hyperlink class='list-images__item' $target> 
            <img src='images/main/{$photo}' class= '{$nameClass}' alt='photo'>
            </$nameTag>";
}
