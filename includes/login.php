<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require('../functions/db.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = mysqli_prepare($conn, 'SELECT id, imie, email, haslo FROM uzytkownicy WHERE email = ?');
    mysqli_stmt_bind_param($stmt,'s', $email);
    mysqli_stmt_execute($stmt);


    if(mysqli_stmt_num_rows($stmt) == 1){
        mysqli_stmt_bind_result($stmt, $id, $name, $email, $hash);
        mysqli_stmt_fetch($stmt);
        if(password_verify($password, $hash)){
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error-login'] = 'Wrong password';
            header("Location: " . $_SERVER['HTTP_REFERER']);
            mysqli_stmt_close($stmt);
            exit;
        }
    }else{
        $_SESSION['error-login'] = 'email does not exist';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        mysqli_stmt_close($stmt);
        exit;
    }
}
?>

<div id="login-form" class="login-form">
        <div id="login-cross" class="cross"><span></span><span></span></div>
        <h2>Zaloguj się</h2>
        <form method="POST" action="./includes/login.php">
            <input name="email" placeholder="E-mail" type="email">
            <br>
            <input name="password" placeholder="Hasło" type="password">
        <a class="login-form__password-reset" href="javascript:void(0)">Nie pamiętam hasła</a>
            <p style="color: red;"><?= isset($_SESSION['error-login']) ? $_SESSION['error-login'] : '' ?></p>
            <button>Zaloguj się</button>
        </form>
        <p>Jeszcze nie masz konta?? <span id="registration" class="login-form__registration">Zarejestruj się...</span></p>
    </div>