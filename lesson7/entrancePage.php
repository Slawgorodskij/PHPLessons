<?php
include_once 'engine/main.php';
include_once 'templates/header.php';
include_once 'engine/entranceChecked.php';
?>
<main class="main container ">

    <h1 class="title"><?php echo $titlePage; ?></h1>

    <?php
    include_once 'templates/headerShop.php'
    ?>
    <p class="title"><?php echo $notification ?? '' ?></p>
    <h3 class="title">Здравствуйте, мы вам рады!</h3>
    <div class="entrance">
        <div class="first-entry">
            <h4>Первый раз?</h4>
            <p>Нажмите кнопку регистрации</p>
            <button class="btn btn-registration">Регистрация</button>
        </div>
        <div class="boundary"></div>
        <div class="another-entry">
            <h4>Вы зарегистрированы?</h4>
            <p>Нажмите кнопку войти</p>
            <button class="btn btn-entrance">Войти</button>
        </div>
    </div>

    <div class="modals registration inactive">
        <div class="modals__item">
            <img class="modal__icon modals-icon" src="public/images/cross.svg" alt="cross">
            <form class="modals__form" action="entrancePage.php" method="post">
                <label> Ваше имя</label>
                <input class="modals__form_input" type="text" name="firstname" placeholder="Введите имя">
                <label> Ваша фамилия</label>
                <input class="modals__form_input" type="text" name="lastname" placeholder="Введите фамилию">
                <label> Ваш email (в будущем "логин")</label>
                <input class="modals__form_input" type="email" name="email" placeholder="Введите email">
                <label>Пароль (не менее 8 символов)</label>
                <input class="modals__form_input" type="password" name="pass">
                <input class="modals__form_submit" type="submit" name="submit" value="Регистрация">
            </form>
        </div>
    </div>


    <div class="modals entrance-modals inactive">
        <div class="modals__item">
            <img class="modal__icon modals-icon" src="public/images/cross.svg" alt="cross">
            <form class="modals__form" action="entrancePage.php" method="post">
                <label> Ваш логин (email)</label>
                <input class="modals__form_input" type="email" name="email" placeholder="Введите email">
                <label>Ваш пароль (не менее 8 символов)</label>
                <input class="modals__form_input" type="password" name="pass">
                <label>Запомнить вас?</label>
                <input class="modals__form_input" type="checkbox" checked name="remember">
                <input class="modals__form_submit" type="submit" name="submit" value="Вход">
            </form>
        </div>
    </div>


</main>
<?php
include_once 'templates/footer.php'
?>