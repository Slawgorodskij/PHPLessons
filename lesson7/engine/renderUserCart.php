<?php
session_start();


function initializationUserCart()
{

    if (isset($_SESSION['arrProducts']) && count($_SESSION['arrProducts']) > 0) {
        foreach ($_SESSION['arrProducts'] as $value) {

            $connect_db = mysqli_connect("localhost", "root", "", "lesson_seventh");
            $resultProduct = mysqli_fetch_assoc(mysqli_query($connect_db, 'SELECT products.id, products.name, products.price, photo.url_img FROM products JOIN photo ON photo.product_id = products.id WHERE products.id = ' . $value));

            $resultColor = mysqli_query($connect_db, 'SELECT DISTINCT product_colors.colors  FROM product_colors JOIN product_quantity ON product_quantity.color_id = product_colors.id WHERE product_quantity.quantity>0 AND product_quantity.product_id = ' . $value);

            $arrColor = arrayValue($resultColor);

            $resultSize = mysqli_query($connect_db, 'SELECT DISTINCT product_size.sizes  FROM product_size JOIN product_quantity ON product_quantity.size_id = product_size.id WHERE product_quantity.quantity>0 AND product_quantity.product_id = ' . $value);

            $arrSize = arrayValue($resultSize);

            renderUserCart($resultProduct, $arrColor, $arrSize);
        }
    } else {
        $text = 'Ваша корзина пуста';
        renderNonOrders($text);
    }
}

function arrayValue($value)
{
    $arrValue = array();
    while ($row = mysqli_fetch_assoc($value)) {
        $arrValue[] = $row;
    };
    return $arrValue;
}

function  renderUserCart($product, $color, $size)
{
    echo "<figure class='cart__product'>
            <div class='cart__photo'>
              <img class='cart__image' src=$product[url_img] alt=$product[name]>
            </div>
            <figcaption class='cart__text'>
            <a href='engine/deleteUserCart.php?idProduct=$product[id]'>
               <img class='modal__icon modals-icon' src='public/images/cross.svg' alt='cross'>
            </a>
               <form action='userCart.php' method='post'>
                  <p class='cart__title'>$product[name]</p>
                  <p class='cart__info'> Цена: 
                     <span class='cart__info_color product-price'>$ $product[price]</span>
                  </p>
                  <label class='cart__info'>Цвет:</label>
                  <select class='cart__info_pl-7' name='colorProduct'>";
    foreach ($color as $value) {
        echo  "      <option value='$value[colors]'>$value[colors]</option>";
    }
    echo "        </select>
                  <label class='cart__info'>Размер:</label>
                  <select class='cart__info_pl-7' name='sizeProduct'>";
    foreach ($size as $value) {
        echo  "      <option value='$value[sizes]'>$value[sizes]</option>";
    }
    echo "        </select>
                  <label class='cart__info'>Количество:</label>
                      <input class='cart__info_border' type='number' name='quantity' value='1'>
                  <input class='inactive' name='idProduct' value='$product[id]'>
                  <input type='submit' name='confirmChoice' value='Подтверждаю выбор'>
               </form>
        </figcaption>
     </figure>";
}

function initializationOrderConfirmation()
{
    if (isset($_SESSION['selectedProduct']) && count($_SESSION['selectedProduct']) > 0) {
        renderOrders($_SESSION['selectedProduct']);
    } else {
        $text = 'Заказов для проверки нет';
        renderNonOrders($text);
    }
}

function  renderNonOrders($text)
{
    echo "<div class='cart__product'>
            <h2 class='title'>$text</h2>
          </div>";
}

function  renderOrders($dataProduct)
{
    echo "<div >
            <h2 class='title'>$_COOKIE[login] проверьте заказ.</h2>
            <p class='cart__info'>Вы заказали:</p>
            <form  action='userCart.php' method='post'>";
    foreach ($dataProduct as $value) {
        $costing = $value['price'] * $value['quantity'];
        echo " <div class='cart__product'>
                  <p>$value[name]</p>
                  <p class='cart__info'>Цвет: <span class='cart__info_pl-7'>$value[colorProduct]</span></p>
                  <p class='cart__info'>Размер: <span class='cart__info_pl-7'>$value[sizeProduct]</span></p>
                  <p class='cart__info'>В количестве: <span class='cart__info_pl-7'>$value[quantity]</span></p>
                  <p class='cart__info'>Общей стоимостью <span class='cart__info_pl-7 cart__info_color'>$costing</span></p>
               </div>";
    }

    echo ' <input type="submit" name="addDataBase" value="Подтверждаю заказ">
          </form>
          </div>';
}
