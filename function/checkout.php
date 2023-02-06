<?php
    include 'cart.php';
    include 'dbconnect.php';
    session_start();

    $pdo = pdo_connect();
    $checkoutcart = $_SESSION['cart'];

    foreach ($checkoutcart as $co){
        if ($co != 0){
            $key = array_search($co, $checkoutcart);
            unset($checkoutcart[$key]);
            $stmt = $pdo->prepare('SELECT qty FROM product WHERE id = ?');
            $stmt->execute([$key]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $productqty = $product['qty'] - $co;
            $stmt = $pdo->prepare('UPDATE product SET qty = ? WHERE id = ?');
            $stmt->execute([$productqty, $key]);
        }
    }

    $stmt = $pdo->prepare('SELECT * FROM product');
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['cart'] = initCart($products);

    header("location:../invoice.php?totalprice=". $_GET['totalprice']);
?>