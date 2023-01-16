<?php
include 'cart.php';

if (isset($_GET)){
    session_start();
    $_SESSION['cart'] = addToCart($_SESSION['cart'], $_GET['id']);
    header("location:../".$_GET['origin']);
}
?>