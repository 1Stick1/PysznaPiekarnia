<?php 
session_start();
header("Location: " . $_SERVER['HTTP_REFERER']);
$_SESSION['cart'] = [];
?>