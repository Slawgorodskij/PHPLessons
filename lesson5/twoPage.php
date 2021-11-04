<?php
include_once 'engine/main.php';
include_once 'templates/header.php'
?>
<a href="index.php">Возвращение на Главную страницу </a>
<h2 class="title">Вторая страница</h2>

<div>
    <img class="photo" src="<?= $_GET['photo'] ?>">
    <?php
    updateNumberViews($_GET['photo'], $connect_db);
    showNumberViews($_GET['photo'], $connect_db);
    ?>
</div>

<div class="list-images">
    <?php
    createArrayImage($arrayDataTwoPage)
    ?>
</div>


<?php
include_once 'templates/footer.php'
?>