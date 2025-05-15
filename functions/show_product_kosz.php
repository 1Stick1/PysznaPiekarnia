<?php 
if (session_status() === PHP_SESSION_NONE)
    session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
function add_produkt(){
require'./functions/db.php';
$keys = array_keys($_SESSION['cart']);
$_SESSION['sum_products'] = 0;
foreach($keys as $key){
    $stmt = mysqli_prepare($conn, "SELECT * FROM produkty WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $key);
    mysqli_stmt_execute($stmt);
    $sum = 0;

    
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id, $name, $type, $description, $price, $image);
    mysqli_stmt_fetch($stmt);
    $quantity = $_SESSION['cart'][$id]['ilosc'];
    $_SESSION['sum_products'] += $price * $quantity;

   // echo "ID: $id <br> imie: $name <br> typ: $type <br> cena: $price <br> ilosc: $quantity <br> zdiecie: $image <br><br>";

        echo('
                    <div class="product">
                <div class="first-layer"><img src="./'.$image.'" alt="'.$name.'"></div>
                
                <div class="third-layer">
                    <p class="name">'.$name.'</p>
                </div>
                <div class="second-layer">
                    <div class="price">$'.$price.'</div>
                    <p class="quantity">Ilosć: '.$quantity.'</p>
                </div>
                    
            </div>
        
        ');

    }
}
?>