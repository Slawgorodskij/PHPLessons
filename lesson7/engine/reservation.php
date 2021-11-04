<?php
include_once 'formUserCart.php';
session_start();

if ($_GET) {

    if (isset($_SESSION['arrProducts'])) {
        if (comparison($_SESSION['arrProducts'], $_GET['idProduct']) !== 1) {
            $_SESSION['arrProducts'][] = $_GET['idProduct'];
        }
    }

    if (empty($_SESSION['arrProducts'])) {
        $_SESSION['arrProducts'][] = $_GET['idProduct'];
    }
}


header('location: ../catalog.php');
