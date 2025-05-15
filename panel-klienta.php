<?php
if (session_status() === PHP_SESSION_NONE) 
    session_start();

if(!isset($_SESSION['user_id']))
    header("Location: ./index.php");

require './functions/db.php';
require './functions/panel-klient-change-pswd.php';

$stmt = mysqli_prepare($conn, "SELECT * FROM uzytkownicy WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user_id']);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $id, $name, $last_name, $email, $hash, $date);
mysqli_stmt_fetch($stmt);

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
<div class="panel-klienta container">
<h1>Panel Klienta</h1>
<div class="information">
    <div class="information__name">Imie: <b><?php echo $name; ?></b></div>
    <div class="information__last-name">Nazwisko: <b><?php echo $last_name; ?></b></div>
    <div class="information__email">Email: <b><?php echo $email; ?></b></div>
    <div class="information__date">Data stworzenia konta: <b><?php echo $date; ?></b></div>
    <span id="form-link">Edytuj dane</span>
    <span class="style-none"> | </span>
    <span id="change-pswd-link">Zmień hasło</span>
</div>

<div id="form" class="form">
    <h3>Edytuj dane</h3>
    <div id="form-cross" class="cross"><span></span><span></span></div>
    <form action="./functions/panel-klient-zapisywanie.php" method="POST">
        <label for="">Imie: </label>
        <input name="name" type="text" value="<?php echo $name; ?>">
        <br>
        <label for="">Nazwisko: </label>
        <input name="last_name" type="text" value="<?php echo $last_name; ?>">
        <br>
        <label for="">email: </label>
        <input name="email" type="email" value="<?php echo $email; ?>">
        <br>
        <button type="submit">Zapisz zmiany </button>
    </form>
</div>

<div id="pswd" class="change-pswd">
    <h3>Zmień hasło</h3>
    <div id="pswd-cross" class="cross"><span></span><span></span></div>
    <form action="./functions/panel-klient-change-pswd.php" method="POST">
        <label for="">Aktualne hasło: </label>
        <input name="password" type="password">
        <br>
        <label for="">Nowe hasło: </label>
        <input id="new-password" name="new-password" type="password">
        <br>
        <label for="">Podtwierdzenie hasła: </label>
        <input id="password_confirmation" name="password_confirmation" type="password">
        <br>
        <span id="error" style="color: red;"><?= isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></span>
        <span style="color: green;"><?= isset($_SESSION['message']) ? $_SESSION['message'] : '' ?></span>
        <br>
        <button id="button" type="submit" disabled>Zmień hasło</button>
    </form>
</div>
</div>


<script src="./script/popup-panel-klienta.js"></script>
<?php include './includes/footer.php'; ?>
</body>
</html>