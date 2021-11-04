<!DOCTYPE html>
<?php
//include_once '../engine/main.php';
?>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/style/style.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <header class="header">
        <div class="header__wrapper container">
            <div class="header__logo">GB</div>
            <div class="header__text"> Тяжело в учении легко в бою</div>
            <div class="header__menu">Меню
                <svg class="header__menu-icons" viewBox="0 0 32 23" width="32" height="23">
                    <path d="M0 23V20.31H32V23H0ZM0 12.76V10.07H32V12.76H0ZM0 2.69V0H32V2.69H0Z" />
                </svg>
            </div>
        </div>
    </header>
    <div class="modal-menu inactive">
        <img class="modal-menu__icon modal__icon" src="public/images/cross.svg" alt="cross">
        <?php
        renderMenu($menu)
        ?>
    </div>