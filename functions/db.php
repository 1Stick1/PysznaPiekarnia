<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "piekarnia";

$conn = new mysqli($host, $user, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
