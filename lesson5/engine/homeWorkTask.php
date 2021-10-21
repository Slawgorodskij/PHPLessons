<?php
include_once 'config/config.php';
// Создать галерею изображений, состоящую из двух страниц.
// 1-я: просмотр всех фотографий (уменьшенных копий).
// 2-я: просмотр конкретной фотографии (изображение оригинального размера) по её ID в базе данных.
// В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
// На странице просмотра фотографии полного размера под картинкой должно быть указано число её просмотров.
// На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность – число кликов по фотографии.

$sqlOnePage = 'SELECT media.filename, images_mini.url_img_mini, images_big.url_img_big, images_big.size FROM media JOIN images_mini ON images_mini.media_id = media.id JOIN images_big ON images_big.media_id = media.id ORDER BY images_big.view_count DESC';

$sqlTwoPage = 'SELECT media.filename, images_mini.url_img_mini, images_big.url_img_big, images_big.size FROM media JOIN images_mini ON images_mini.media_id = media.id JOIN images_big ON images_big.media_id = media.id ORDER BY RAND() LIMIT 3';

$resultOnePage = mysqli_query($connect_db, $sqlOnePage);
$resultTwoPage = mysqli_query($connect_db, $sqlTwoPage);

$arrayDataOnePage = array();
while ($row = mysqli_fetch_assoc($resultOnePage)) {
    $arrayDataOnePage[] = $row;
};

$arrayDataTwoPage = array();
while ($row = mysqli_fetch_assoc($resultTwoPage)) {
    $arrayDataTwoPage[] = $row;
};

function createArrayImage($arrayData)
{
    foreach ($arrayData as $key => $value) {
        renderListImage($value);
    }
}

function renderListImage($dataBase)
{
    echo  " <figure class='list-images__item'>
                <a href='twoPage.php?photo=$dataBase[url_img_big]'> 
                   <img src='$dataBase[url_img_mini]' class='list-images__photo' alt='photo'>
                </a>
                <figcaption class='list-images__name'>$dataBase[filename] 
                    <span class='list-images__text'>
                    (размер оригинала: $dataBase[size])</span>
                </figcaption>
            </figure>";
}

function updateNumberViews($fileName, $connect_db)
{
    mysqli_query($connect_db, "UPDATE images_big SET view_count = view_count + 1  WHERE url_img_big = '$fileName';");
}

function showNumberViews($fileName, $connect_db)
{
    $countView = mysqli_query($connect_db, "SELECT view_count  FROM images_big  WHERE url_img_big = '$fileName';");
    $row = mysqli_fetch_assoc($countView);
    echo "<p>Эту картинку просмотрели: $row[view_count] раз(а) </p>";
}
