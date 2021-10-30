<?php

session_start();

foreach ($_SESSION['arrProducts'] as $key => $value) {
    if ($value == $_GET['idProduct']) {
        unset($_SESSION['arrProducts'][$key]);
    }
}

header('location: ../userCart.php');
