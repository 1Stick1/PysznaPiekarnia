<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require('../functions/db.php');
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, 'SELECT * FROM uzytkownicy WHERE email = ?');
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    
    
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) > 0){
        $_SESSION['error'] = 'Email exist';
        mysqli_stmt_close($stmt);
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }else{
        $_SESSION['error'] = ' ';
        $hash = password_hash($password, PASSWORD_DEFAULT);
    }
        $insert = mysqli_prepare($conn,"INSERT INTO uzytkownicy (imie, nazwisko, email, haslo, data_rejestracji) VALUES (?, ?, ?, ?, NOW())");
        mysqli_stmt_bind_param($insert,"ssss", $name, $last_name, $email, $hash);

        mysqli_stmt_execute($insert);
        mysqli_stmt_close($insert);

        $stmt = mysqli_prepare($conn,"SELECT id FROM uzytkownicy WHERE email = ?");
        mysqli_stmt_bind_param($stmt,"s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
}
?>
<div id="registration-form" style="height: 520px;" class="registration-form">
        <div id="registration-cross" class="cross"><span></span><span></span></div>
        <h2>Zarejestruj się</h2>
        <form id="registration_form" action="./includes/registration.php" method="POST">
            <input name="name" placeholder="Imię" type="text" required>
            <br>
            <input name="last_name" placeholder="Nazwisko" type="text" required>
            <br>
            <input name="email" placeholder="E-mail" type="email" required>
            <br>
            <input id="password" name="password" placeholder="Hasło" type="password" required>
            <br>
            <input id="password_confirmation" name="password_confirmation" placeholder="Potwierdzenie hasła" type="password" required>
                <p id="error" style="color: red; height:10px;"><?= isset($_SESSION['error']) ? $_SESSION['error'] : '' ?></p>
            <br>
            <button id="button" type="submit" >Zarejestruj się</button>
            <p>Już masz konto?? <span id="login2" class="registration-form__login">Zaloguj się...</span></p>
        </form>
    </div>
<script src="./script/registration.js"></script>
    