<?php
include_once 'config/config.php';
session_start();

if (isset($_POST['addDataBase'])) {
    $insertOrderInformation = 'Заказ успешно оформлен';

    $userId = (int)$_COOKIE['loginId'];

    foreach ($_SESSION['selectedProduct'] as $key => $dataProduct) {
        $idProduct = (int)$dataProduct['idProduct'];
        $quantityProduct = (int)$dataProduct['quantity'];
        $idColor = (int) mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT id FROM product_colors WHERE colors = '$dataProduct[colorProduct]'"))['id'];
        $idSize = (int) mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT id FROM product_size WHERE sizes = '$dataProduct[sizeProduct]'"))['id'];

        mysqli_query($connect_db, "INSERT INTO orders_product (`user_id`, `product_id`, `color_id`, `size_id`, `total`) VALUES ($userId, $idProduct, $idColor,$idSize, $quantityProduct)");

        mysqli_query($connect_db, "update product_quantity set quantity = quantity - $quantityProduct where product_id = $idProduct and color_id = $idColor and size_id = $idSize");

        unset($_SESSION['selectedProduct'][$key]);
    }
    unset($_SESSION['arrProducts']);
}
