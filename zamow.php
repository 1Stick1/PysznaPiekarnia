<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require './functions/db.php';
require './functions/show_products.php';
require './functions/show_product.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sansita+Swashed:wght@300..900&display=swap" rel="stylesheet">

    <title>Piekarnia</title>
</head>
<body>
    <?php include'./includes/header.php'; ?>


<div class="container">
    <div class="best-products">
        <h2>Nailepsze produkty</h2>
        <div class="best-products__products">
            <?php show_product("Ciastko francuskie z jabłkami", $conn); ?>
            <?php show_product("Duńskie ciastko z owocami", $conn); ?>
            <?php show_product("Chleb wieloziarnisty", $conn); ?>
            <?php show_product("Chleb wiejski", $conn); ?>
            <?php show_product("Chleb z nadzieniem", $conn); ?>
            <?php show_product("Kajzerka wieloziarnista", $conn); ?>
        </div>
    </div>

    <div class="discover-more">
        <h2>Odkryj więcej</h2>
        <div class="discover-more__list">
            <div id="list-cake" class="discover-more__list-cake active">Ciasto</div>
            <div id="list-muffins" class="discover-more__list-muffins">Babeczki</div>
            <div id="list-croissant" class="discover-more__list-croissant">Rogalik</div>
            <div id="list-bread" class="discover-more__list-bread">Chleb</div>
        </div>
        <hr>
        <div class="discover-more__products">
            <div id="cake" class="discover-more__products-container product-active">
                <?php show_products("Ciasto", $conn); ?>
            </div>
            <div id="muffins" class="discover-more__products-container">
                <?php show_products("Babeczka", $conn); ?>
            </div>
            <div id="croissant" class="discover-more__products-container">
                <?php show_products("Rogalik", $conn); ?>
            </div>
            <div id="bread" class="discover-more__products-container">
                <?php show_products("Chleb", $conn); ?>
            </div>
        </div>
    </div>
</div>

<?php include './includes/footer.php'; ?>
<script src="./script/products.js"></script>

</body>
</html>