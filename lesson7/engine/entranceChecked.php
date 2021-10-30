<?php
include_once 'config/config.php';

// vladimir Petrovich

if ($_POST) {

    $email = mysqli_real_escape_string($connect_db, (string)htmlspecialchars(strip_tags(trim($_POST['email']))));
    $pass = password_hash((string)htmlspecialchars(strip_tags(trim($_POST['pass']))), null);
    $choiceOption = $_POST['submit'];
    $createdAT = date("Y-m-d H:i:s");
    $notification = ' ';


    if ($choiceOption === 'Регистрация') {
        $firstname = mysqli_real_escape_string($connect_db, (string)htmlspecialchars(strip_tags(trim($_POST['firstname']))));
        $lastname = mysqli_real_escape_string($connect_db, (string)htmlspecialchars(strip_tags(trim($_POST['lastname']))));

        if ($firstname === ' ' || strlen($firstname) < 1) :
            $notification = 'Неуспешно: ведите корректное имя';
        elseif ($lastname === ' ') :
            $notification = 'Неуспешно: заполните поле "фамилия"';
        elseif ($email === ' ') :
            $notification = 'Неуспешно: заполните поле "email", он будет в будущем вашим логином';
        elseif ($pass === ' ' || strlen($pass) < 7) :
            $notification = 'Неуспешно: вы ввели мало знаков';
        else :
            mysqli_query($connect_db, "INSERT INTO users (`firstname`, `lastname`, `email`, `pass`, `created_at`) VALUES ('$firstname','$lastname',' $email', '$pass', '$createdAT')");
            $notification = 'Вы успешно зарегистрированы и можете посетить магазин';
        endif;
    }

    if ($choiceOption === 'Вход') {

        $sqlData = "SELECT id, firstname, pass FROM users WHERE email = '$email'";
        $dataEntrance = mysqli_fetch_assoc(mysqli_query($connect_db, $sqlData));

        if (password_verify($_POST['pass'], $dataEntrance['pass'])) {
            if ($_POST['remember']) {
                setcookie("login", $dataEntrance['firstname'], time() + 3600 * 24 * 7);
                setcookie("loginId", $dataEntrance['id'], time() + 3600 * 24 * 7);
            };
            header('location: catalog.php');
        } else {
            $notification = 'Вы не верно ввели логин или пароль';
        }
    }
}
