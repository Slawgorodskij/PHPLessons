<?php
include_once 'config/config.php';

if ($_POST) {
    $user = mysqli_real_escape_string($connect_db, (string)htmlspecialchars(strip_tags($_POST['user_name'])));
    $messege = mysqli_real_escape_string($connect_db, (string)htmlspecialchars(strip_tags($_POST['body'])));
    $idProduct =  (int)$_POST['idProduct'];
    $createdAT = date("Y-m-d H:i:s");
    $insertDB = "INSERT INTO reviews_product (`user_name`, `product_id`, `body`, `created_at`) VALUES ('$user',$idProduct,'$messege','$createdAT')";
    $notification = ' ';

    if ($user === ' ' || strlen($user) < 1) :
        $notification = 'Отзыв не отправлен: ведите корректное имя';
    elseif ($messege === ' ' || strlen($messege) < 8) :
        $notification = 'Отзыв не отправлен: вы его не написали или сообщение очень короткое';
    else :
        mysqli_query($connect_db, $insertDB);
        $notification = 'Ваш отзыв успешно отправлен';
    endif;
}
