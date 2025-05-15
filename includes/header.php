<?php 
if (!isset($_SESSION['user_id'])) {
    include './includes/login.php'; 
    include './includes/registration.php';
} 
include './includes/user-menu.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="dark-background" id="dark-background"></div>

<header class="<?= $current_page ===  'index.php' ? '' : 'zamow' ?>">
    <div class="logo"><a href="./index.php"><img src="./img/logo.png" alt="logo"></a></div>
    <div class="menu">
        <a class="menu__link <?= $current_page === 'index.php' ? 'menu__link_active' : '' ?>" href="./index.php">Główna</a>
        <a class="menu__link <?= $current_page === 'zamow.php' ? 'menu__link_active' : '' ?>" href="./zamow.php">Zamów</a>
        <a class="menu__link <?= $current_page === 'o_nas.php' ? 'menu__link_active' : '' ?>" href="">O nas</a>
        <a class="menu__link <?= $current_page === 'kontakt.php' ? 'menu__link_active' : '' ?>" href="">Skontaktuj się z nami</a>
    </div>  
    <?php
        if (isset($_SESSION['user_id'])) {
            echo('
                <div class="login" id="user-menu__link">
                <span>'. $_SESSION['user_name'] .'</span>
                </div>
            ');
        }else{
            echo('
                <div class="login">
                    <span id="login" class="login__link">Zaloguj się</span>
                </div>
            ');
        }
    ?>
<script src="./script/popup.js"></script>
<script src="./script/popup-user.js"></script>
</header>

