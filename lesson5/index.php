<?php
include_once 'engine/main.php';
include_once 'templates/header.php'
?>

<h2 class="title">Главная страница</h2>

<div class="list-images">
  <?php
  createArrayImage($arrayDataOnePage)
  ?>
</div>

<?php
include_once 'templates/footer.php'
?>