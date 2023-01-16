<?php
include 'cart.php';

if (isset($_GET)){
    session_start();
    $_SESSION['cart'] = deleteFromCart($_SESSION['cart'], $_GET['id']);
    header("location:../cart.php");
}
?>