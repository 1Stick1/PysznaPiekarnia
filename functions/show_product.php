<?php
require'./functions/db.php';

function show_product($product_name, $conn){
    $stmt = mysqli_prepare($conn, "SELECT * FROM produkty WHERE nazwa = ?");
    mysqli_stmt_bind_param($stmt, 's', $product_name);
    mysqli_stmt_execute($stmt);


    mysqli_stmt_bind_result($stmt, $id, $name, $type, $text, $price, $image);
mysqli_stmt_fetch($stmt);
        echo('
            <div class="product">
                <div class="first-layer"><img src="'.$image.'" alt="'.$name.'"></div>
                <div class="second-layer">
                    <div class="price">$'.$price.'</div>
                </div>
                <div class="third-layer">
                    <p class="name">'.$name.'</p>
                    <form  action="./functions/dodac-do-kosza.php" method="POST">
                        <input type="hidden" name="id" value="'.$id.'">
                        <button class="button" type="submit">Dodać</button>
                    </form>
                </div>
            </div>
        ');
    }

?>

