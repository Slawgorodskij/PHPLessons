<?php
include_once 'engine/main.php';
include_once 'templates/header.php';

?>
<main class="main container">
    <?php
    include_once 'engine/render_personal_account.php';
    ?>
    <h1 class="title"><?php echo $titlePage ?></h1>

    <?php
    include_once 'templates/headerShop.php'
    ?>

    <h2 class="title">Личный кабинет</h2>

    <?php

    if (!isset($_COOKIE['login'])) {
        header('location: entrancePage.php');
    } else {
        initializationPersonalAccount($_COOKIE['login']);
    }
    ?>


</main>
<?php
include_once 'templates/footer.php'
?>