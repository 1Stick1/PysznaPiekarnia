<?php 
if (session_status() === PHP_SESSION_NONE)
    session_start();

function show_zamowienie(){
    require'./functions/db.php';
    $stmt = mysqli_prepare($conn, "SELECT data_zamowienia, suma FROM zamowienia WHERE id_uzytkownik = ?");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user_id']);
    mysqli_execute($stmt);

    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $data, $suma);
    while(mysqli_stmt_fetch($stmt)){
    echo "
        <div class='zamowienie'>
            <p>Zamowienie</p>
            <p>Suma: $suma $</p>
            <p>Data zamowienia: $data</p>
        </div>
        ";
    }
}
?>

