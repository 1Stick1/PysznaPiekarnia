<?php 
if (session_status() === PHP_SESSION_NONE)
    session_start();
$quantity = 1;


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if($_SERVER["REQUEST_METHOD"] === 'POST' ){
    require'./db.php';
    $id = $_POST['id'];
    $stmt = mysqli_prepare($conn, "SELECT cena FROM produkty WHERE id = ?");
    
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $price);
    mysqli_stmt_fetch($stmt);
    
    mysqli_stmt_close($stmt);
    
    if(isset($_SESSION['cart'][$id])){
        $quantity = $_SESSION['cart'][$id]['ilosc'] += 1;
        $price = $quantity * $price;
        $stmt = mysqli_prepare($conn, "UPDATE pozycjezamowienia SET ilosc = ?, cena = ? WHERE id_produkt = ?");
        mysqli_stmt_bind_param($stmt, 'idi', $quantity, $price, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    }else{
        $_SESSION['cart'][$id] = [
            'ilosc' => 1
        ];
        $stmt =  mysqli_prepare($conn, "INSERT INTO pozycjezamowienia VALUES(null, ?, null, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'iiid', $_SESSION['user_id'], $id, $_SESSION['cart'][$id]['ilosc'], $price);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }
    header("Location: ../zamowienia.php");

}
?>
