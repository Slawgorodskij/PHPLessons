<?php
include_once 'engine/main.php';
include_once 'templates/header.php';
?>
<main class="main container">
    <?php
    include_once 'engine/renderCatalog.php'
    ?>
    <h1 class="title"><?php echo $titlePage; ?></h1>

    <?php
    include_once 'templates/headerShop.php';
    if (!isset($_COOKIE['login'])) {
        header('location: entrancePage.php');
    } else {
        renderModals();
    }
    ?>

    <h2 class="title">Каталог товаров</h2>

    <div class="product-items grid">
        <?php
        initializationPage();
        ?>
    </div>

</main>
<?php
include_once 'templates/footer.php'
?>