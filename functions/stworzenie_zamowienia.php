<?php
    if(session_status() === PHP_SESSION_NONE)
        session_start();

    require'./db.php';
    $sum = 0;
    $stmt = mysqli_prepare($conn, "SELECT cena FROM pozycjezamowienia WHERE id_uzytkownika = ? AND id_zamowienie IS NULL;");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user_id']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $price);
    while (mysqli_stmt_fetch($stmt)) {
        $sum += $price;
    }
    mysqli_stmt_close($stmt);


    $stmt = mysqli_prepare($conn, "INSERT INTO zamowienia VALUES(null, ?, NOW(), ?)");
    mysqli_stmt_bind_param($stmt, 'id', $_SESSION['user_id'], $sum);
    mysqli_stmt_execute($stmt);

    $last_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);

    $stmt = mysqli_prepare($conn, "UPDATE pozycjezamowienia SET id_zamowienie = ? WHERE id_uzytkownika = ? AND id_zamowienie IS NULL;");
    mysqli_stmt_bind_param($stmt, 'ii', $last_id, $_SESSION['user_id']);
    mysqli_stmt_execute($stmt); 
    header("Location: ../zamowienia.php");
    
?>