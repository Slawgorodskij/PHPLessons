<?php

session_start();
$orderInformation = '';
if (isset($_POST['confirmChoice'])) {

    include 'config/config.php';
    $comparisonResult = 0;
    $color = $_POST['colorProduct'];
    $size = $_POST['sizeProduct'];
    $id = (int)$_POST['idProduct'];
    $quantity = (int)$_POST['quantity'];
    $nameProduct = mysqli_fetch_assoc(mysqli_query($connect_db, 'SELECT name, price FROM products WHERE id = ' . $id));
    $selectedProduct = array_merge($_POST, $nameProduct);

    if (isset($_SESSION['selectedProduct'])) {
        $comparisonResult = comparison($_SESSION['selectedProduct'], $selectedProduct);
    }

    $sqlOrder = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT product_quantity.quantity 
    FROM product_quantity
    join product_colors 
    on product_colors.colors = '$color' 
    and product_colors.id = product_quantity.color_id 
    join product_size on product_size.sizes = '$size'
    and product_size.id = product_quantity.size_id
    WHERE  product_quantity.product_id = $id"));


    if ($quantity > (int)$sqlOrder['quantity']) {
        $orderInformation = 'к сожалению выбранного количества товара в настоящее время нет на складе';
    } elseif ($comparisonResult === 1) {
        $orderInformation = 'заказ принят ранее';
    } else {
        $_SESSION['selectedProduct'][] = $selectedProduct;
        $orderInformation = 'заказ принят';
    }
}

function comparison($arrOne, $arrTwo)
{
    for ($i = 0; $i < count($arrOne); $i++) {
        if ($arrOne[$i] == $arrTwo) {
            return 1;
        }
    }
    return 0;
}


