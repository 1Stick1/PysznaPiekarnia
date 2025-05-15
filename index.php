<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require './functions/db.php';
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
<?php include'./includes/header.php';?>

<div class="block1">
    <div class="block1__container">
        <div class="block1__text">
            <p>Pyszna piekarnia</p>
            <h1>Słodkie smakołyki, idealne jedzenie</h1>
        </div>
        <div class="block1__buttons">
            <a href="./zamow.php" class="block1__button button">Zamów teraz</a>
            
        </div>
    </div>
</div>

<div class="discount">
    <div class="discount__container">
        <div class="discount__text">
            <h2>20% zniżki na Twoje pierwssze zamówienie</h2>
            <p>Kup swoje pierwsze ciasteczko i otrzymaj 20% zniżki!!</p>
        </div>
        <a href="" class="discount__button button">Dowiedz się więcej</a>
    </div>
</div>

<div class="about-us">
    <div class="about-us__container">
            <div class="about-us__text">
                <h2>O nas</h2>
                <p>Jesteśmy rodzinną piekarnią, która od lat wypieka chleb z sercem — naturalnie, świeżo i z pasją do tradycji.</p>
            </div>
        <a href="" class="about-us__button button">Dowiedz się więcej</a>
    </div>
</div>

<?php include './includes/footer.php'; ?>
</body>
</html>