<?php
//Буду счастлив если подскажите почему не удаляет "login"

setcookie("login", " ", time() - 3600 * 24 * 8);

header('location: ../entrancePage.php');
