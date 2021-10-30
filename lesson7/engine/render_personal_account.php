<?php

function initializationPersonalAccount($name)
{
    $connect_db = mysqli_connect("localhost", "root", "", "lesson_seventh");
    $resultPersonal = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT firstname, lastname, email FROM users WHERE firstname = '$name'"));
    renderPersonalAccount($resultPersonal);
}


function renderPersonalAccount($PersonalData)
{
    echo "<div class='personal-account'>
            <div class='personal-account_item'>
              <div>
                <p class='title'>Ваши личные данные</p>
                <p>Имя: <span>$PersonalData[firstname]</span></p>
                <p>Фамилия: <span>$PersonalData[lastname]</span></p>
                <p>Адрес электронной почты: <span>$PersonalData[email]</span></p>
              </div>
              <div>
                <p class='title'>Ваши последние заказы</p>
              </div>
            </div>

            <div >
               <p class='title'>Ваши отзывы</p>
            </div>
         </div>";
}
