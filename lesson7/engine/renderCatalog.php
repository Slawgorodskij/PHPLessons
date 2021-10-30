<?php

function renderModals()
{
    if (!isset($_COOKIE['values'])) {
        echo "<div class='modals greeting inactive'>
                <div class='modals__item'>
                   <img class='modal__icon modals-icon' src='public/images/cross.svg' alt='cross'>
                   <p>Здравствуйте $_COOKIE[login] </p>
               </div>
              </div>";
        setcookie('values', 'true', time() + 3600 * 12);
    }
}

function initializationPage()
{
    $sqlPage = 'SELECT products.id, products.name, products.description, products.price, photo.url_img FROM products JOIN photo ON photo.product_id = products.id';

    $arrayDataPage = arrayFromDataBase($sqlPage);
    renderProduct($arrayDataPage);
}

function renderProduct($dataBase)
{
    foreach ($dataBase as $value) {
        echo "<figure class='product'>
            <div class='product__photo'>
              <a href='pageProduct.php?idProduct=$value[id]'> 
                 <img class='product__image' src='$value[url_img]' alt='$value[name]'>
              </a>
            </div>
            <figcaption class='product__text product-text'>
               <h2 class='product-text__title'>$value[name]</h2>
               <p class='product-text__description'>$value[description]</p>
               <div class='product__wrapper'>
                  <h3 class='product-text__price'>$ $value[price]</h3>
                  <a href='engine/reservation.php?idProduct=$value[id]'> 
                    <img class='product__cart' src='public/images/shopping-cart.png' alt='cart'>
                  </a>
               </div>
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
    $connect_db = mysqli_connect("localhost", "root", "", "lesson_seventh");
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
