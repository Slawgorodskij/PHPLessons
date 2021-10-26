<?php
include_once 'engine/calculator.php';


// 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.

function dataProcessing()
{
    $resultOperation = 'Введите числа';

    if ($_POST) {
        if ($_POST['numOne'] === '' ||  $_POST['numTwo'] === '') {
            $resultOperation = 'Введите числа';
        } elseif ($_POST['numTwo'] === '0' && $_POST['operation'] === 'dividing') {
            $resultOperation = 'Делить на ноль нельзя';
        } else {
            $numOne = (int) $_POST['numOne'];
            $numTwo = (int) $_POST['numTwo'];
            $operation = $_POST['operation'];
            $resultOperation = mathOperation($numOne, $numTwo, $operation);
        }
    }
    return $resultOperation;
}


// 2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.

function dataProcessingTwo()
{
    $resultOperationTwo = 'Введите числа';

    if ($_POST) {
        $operation = translateOperation($_POST['operation']);
        if ($_POST['numOne'] === '' ||  $_POST['numTwo'] === '') {
            $resultOperationTwo = 'Введите числа';
        } elseif ($_POST['numTwo'] === '0' && $operation === 'dividing') {
            $resultOperationTwo = 'Делить на ноль нельзя';
        } else {
            $numOne = (int) $_POST['numOne'];
            $numTwo = (int) $_POST['numTwo'];
            $resultOperationTwo = mathOperation($numOne, $numTwo, $operation);
        }
    }
    return $resultOperationTwo;
}


function translateOperation($nameOperation)
{
    switch ($nameOperation) {
        case 'Сложение':
            return 'amount';
        case 'Вычитание':
            return 'difference';
        case 'Умножение':
            return 'multiplication';
        case 'Деление':
            return 'dividing';
    }
}

// 3. Добавить функционал отзывов в имеющийся у вас проект.
// 4. Создать страницу каталога товаров:
// товары хранятся в БД (структура прилагается);
// страница формируется автоматически;
// по клику на товар открывается карточка товара с подробным описанием.
// подумать, как лучше всего хранить изображения товаров.

function initializationPage()
{
    $sqlPage = 'SELECT products.id, products.name, products.description, products.price, photo.url_img FROM products JOIN photo ON photo.product_id = products.id';

    $arrayDataPage = arrayFromDataBase($sqlPage);
    renderProduct($arrayDataPage);
}

function renderProduct($dataBase)
{
    foreach ($dataBase as $value) {
        echo "<figure class='product' data-id='$value[id]'>
            <div class='product__photo'>
              <a href='twoPage.php?idProduct=$value[id]'> 
                 <img class='product__image' src='$value[url_img]' alt='$value[name]'>
              </a>
            </div>
            <figcaption class='product__text product-text'>
               <h2 class='product-text__title'>$value[name]</h2>
               <p class='product-text__description'>$value[description]</p>
               <h3 class='product-text__price'>$value[price]</h3>
            </figcaption>
         </figure>";
    }
}


function initializationElementPhoto($dataProduct)
{
    $sqlImages = 'SELECT url_img FROM additional_photo WHERE product_id =' . $dataProduct;

    $arrayImagesURL = arrayFromDataBase($sqlImages);
    renderElementPhoto($arrayImagesURL);
}

function renderElementPhoto($dataBase)
{
    foreach ($dataBase as $value) {
        echo "<div class='small-photo_item'>
                <img class='product__image small-photo_img' src='$value[url_img]' alt='photo'>
             </div>";
    }
}


function initializationElementInformation($dataProduct)
{
    $sqlInformation = 'SELECT name, description, price FROM products WHERE id =' . $dataProduct;

    $sqlColorSize = 'SELECT product_colors.colors, product_size.sizes FROM product_quantity JOIN product_size ON product_size.id = product_quantity.size_id JOIN product_colors ON product_colors.id = product_quantity.color_id WHERE product_quantity.quantity>0 AND product_quantity.product_id=' . $dataProduct;

    $sqlColor = 'SELECT colors FROM product_colors';

    $arrayInformation = arrayFromDataBase($sqlInformation);
    $arrayColorSize = arrayFromDataBase($sqlColorSize);
    $arrayColor = arrayFromDataBase($sqlColor);
    renderElementInformation($arrayInformation, $arrayColorSize, $arrayColor);
}

function renderElementInformation($information, $colorSize, $color)
{
    foreach ($information as $value) {
        echo "<h2 class = 'product-information__name'>$value[name]</h2>
              <p class = 'product-information__description'>$value[description]</p>";
    }
    echo '<div class = \'product-information__existence\'> <p>В наличии изделия следующих цветов и размеров:</p>';
    for ($i = 0; $i < count($color); $i++) {
        $colorStandard = $color[$i]['colors'];
        echo '<p> Цвет: ' .  $colorStandard . ', размеры ';
        foreach ($colorSize as $value) {
            if ($colorStandard  === $value['colors']) {
                echo $value['sizes'] . ' ';
            }
        }
        echo '</p>';
    }
    echo '</div>';
    foreach ($information as $value) {
        echo "<p class = 'product-information__price'>$ $value[price]</p>";
    }
}

function initializationElementReviews($dataProduct)
{
    $sqlReviews = 'SELECT user_name, body, created_at FROM reviews_product WHERE product_id =' . $dataProduct;

    $arrayReviews = arrayFromDataBase($sqlReviews);
    renderElementReviews($arrayReviews);
}

function renderElementReviews($reviews)
{
    foreach ($reviews as $value) {
        echo "<div class='product-reviews__wrapper'>
                <p class='product-reviews__text'>$value[body]</p>
                <p class='product-reviews__user'>$value[user_name]</p>
                <p class='product-reviews__data'>$value[created_at]</p>
              </div>";
    }
}

function arrayFromDataBase($sqlRequest)
{
    $connect_db = mysqli_connect("localhost", "root", "", "lesson_sixth");
    $resultPage = mysqli_query($connect_db, $sqlRequest);
    $arrayDataPage = array();
    while ($row = mysqli_fetch_assoc($resultPage)) {
        $arrayDataPage[] = $row;
    };
    return $arrayDataPage;
}

//Работа с формой
function renderInput($idProduct)
{
    echo "<input class='inactive' type='number' name='idProduct' value='$idProduct'>";
}
