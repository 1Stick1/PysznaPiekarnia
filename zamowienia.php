<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require'./functions/show_product_kosz.php';
require'./functions/show_zamowienie.php';
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
        <div class="zamowienia">
            <h1>Zamowienia</h1>
            <div class="zamowienia__content">
            <div class="zamowienia__produkty">
                <?php add_produkt(); ?>
                <div class="zamowienia__buttons">
                <form action="./functions/stworzenie_zamowienia.php">
                    <button class="zamowienia__button" type="submit">Zamowić: $<?php echo $_SESSION['sum_products']; ?></button>
                </form>
                <form action="./functions/reset.php"><button class="zamowienia__button">Zresetuj</button></form>
                </div>
            </div>
            <div class="zamowienia__list">
            <?php show_zamowienie(); ?>
            </div>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php'; ?>
</body>
</html>