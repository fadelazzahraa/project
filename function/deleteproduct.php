<?php
    include 'dbconnect.php';
    include 'cart.php';

    if (!empty($_GET)){
        session_start();
        $pdo = pdo_connect();
        $id = $_GET['id'];
        
        // fetch data to get imagepath
        $stmt = $pdo->prepare('SELECT imagepath FROM product WHERE id = ?');
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // delete image
        unlink("../image/". $product['imagepath']);
        // delete data from db
        $stmt = $pdo->prepare('DELETE FROM product WHERE id = ?');
        $stmt->execute([$id]);

        // reset cart
        $stmt = $pdo->prepare('SELECT * FROM product');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['cart'] = initCart($products);

        header("location:../store.php");
    }

?>