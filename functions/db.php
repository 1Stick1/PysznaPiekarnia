<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "piekarnia";
$conn = mysqli_connect($host, $user, $password, $dbname);
if ($conn->connect_error)
    die("Connect error: " . $conn->connect_error);
?>