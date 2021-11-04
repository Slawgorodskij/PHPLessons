<?php
include_once 'engine/main.php';
include_once 'templates/header.php';
?>
<main class="main container">
    <?php
    include_once 'engine/renderUserCart.php';
    include_once 'engine/formUserCart.php';
    include_once 'engine/insertOrder.php'
    ?>
    <h1 class="title"><?php echo $titlePage; ?></h1>

    <?php
    include_once 'templates/headerShop.php'
    ?>

    <h2 class="title">Корзина</h2>
    <p class="title"><?php echo $orderInformation ?? ''; ?></p>
    <p class="title"><?php echo $insertOrderInformation ?? ''; ?></p>

    <?php
    if (!isset($_COOKIE['login'])) {
        header('location: entrancePage.php');
    } else {

        initializationUserCart();
        initializationOrderConfirmation();
    }
    ?>

</main>
<?php
include_once 'templates/footer.php'
?>