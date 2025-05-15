<?php
    if(session_status() === PHP_SESSION_NONE)
        session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require'./db.php';
        
        $password = $_POST['password'];
        $new_password = $_POST['new-password'];
        
        $stmt = mysqli_prepare($conn, "SELECT haslo FROM uzytkownicy WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['user_id']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);
        
        mysqli_stmt_bind_result($stmt, $hash);
        mysqli_stmt_fetch($stmt);
        if(password_verify($password, $hash)){
            $new_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn, "UPDATE uzytkownicy SET haslo = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'si', $new_hash, $_SESSION['user_id']);
            mysqli_stmt_execute($stmt);
            $_SESSION['error'] = "";
            $_SESSION['message'] = "Hasło zmienione";
            header("Location: ../panel-klienta.php");
        }else{
            $_SESSION['error'] = "Incorect password";
            header("Location: ../panel-klienta.php");
        }
    }

?>