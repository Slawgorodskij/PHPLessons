<?php
$connect_db = mysqli_connect("localhost", "root", "", "lesson_seventh");

if (!$connect_db) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
