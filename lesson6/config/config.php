<?php
$connect_db = mysqli_connect("localhost", "root", "", "lesson_sixth");


if ($connect_db == false) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
