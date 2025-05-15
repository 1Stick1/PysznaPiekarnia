<?php
    require './functions/db.php';
    require './includes/registration.php';
    echo $_SESSION['user_id'];



    require './includes/login.php';

    $stmt = mysqli_prepare($conn, 'SELECT id, imie, email, haslo FROM uzytkownicy WHERE email = "romanlusak40@gmail.com"');
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id, $name, $email, $hash);
    mysqli_stmt_fetch($stmt);
    
  //  echo  $_SESSION['pass'] . "<br>" . $_SESSION['hash'] . "<br>" . $_SESSION['error'] . "<br>" . $_SESSION['name'] . "<br>" ;
    echo $_SESSION['user_name'];

// if (password_verify('65740', $_SESSION['hash'])) {
//     echo "Прошло (НЕ ДОЛЖНО)";
// } else {
//     echo "Не прошло (ОК)";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    

</body>
</html>