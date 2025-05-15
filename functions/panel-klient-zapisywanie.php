<?php
    if(session_status() === PHP_SESSION_NONE)
        session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require'./db.php';
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        $stmt = mysqli_prepare($conn, 'UPDATE uzytkownicy SET imie = ?, nazwisko = ?, email = ? WHERE id = ?');
        mysqli_stmt_bind_param($stmt, 'sssi', $name, $last_name, $email, $_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        $_SESSION['user_name'] = $name;
        header("Location: " . $_SERVER['HTTP_REFERER']);
}   
?>