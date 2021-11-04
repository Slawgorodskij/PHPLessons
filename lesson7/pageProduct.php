<?php
include_once 'engine/main.php';
include_once 'templates/header.php';
include_once 'engine/insertBD.php';
?>
<main class="main container">
    <?php
    include_once 'engine/renderCatalog.php'
    ?>
    <h1 class="title"><?php echo $titlePage ?></h1>

    <?php
    include_once 'templates/headerShop.php'
    ?>

    <h2 class="title">Страница товара</h2>
    <p class="title"><?php echo $notification ?? '' ?></p>
    <?php
    $idProduct = ($_GET['idProduct'] ?? $_POST['idProduct']);
    ?>

    <div class="wrapper">
        <div class="product-information">
            <div class="product-information__item">
                <div class="product-information__big-photo">

                </div>
                <div class="product-information__small-photo small-photo">
                    <?php
                    initializationElementPhoto($idProduct);
                    ?>
                </div>
            </div>
            <div class="roduct-information__item">
                <?php
                initializationElementInformation($idProduct);
                ?>
            </div>
        </div>
        <div class="product-reviews">
            <h4 class="title">Ваши отзывы о товаре</h4>
            <?php
            initializationElementReviews($idProduct);
            ?>
        </div>
        <div class="user-reviews__wrapper">
            <div class="user-reviews">Оставь свой отзыв</div>
        </div>

        <div class="modals modal-reviews inactive">
            <div class="modals__item">
                <img class="modal__icon modals-icon" src="public/images/cross.svg" alt="cross">
                <form action="twoPage.php" method="post" class="modals__form">
                    <label> Ваше имя</label>
                    <input class="modals__form_input" type="text" name="user_name" placeholder="Введите своё имя">

                    <label> Ваш отзыв</label>
                    <textarea class="modals__form_input" name="body" placeholder="Напишите свой отзыв"></textarea>
                    <?php
                    renderInput($idProduct)
                    ?>
                    <input class="modals__form_submit" type="submit" value="Опубликовать">
                </form>

            </div>
        </div>
    </div>

</main>
<?php
include_once 'templates/footer.php'
?>