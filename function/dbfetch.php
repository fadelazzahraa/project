<?php
    include 'dbconnect.php';

    $pdo = pdo_connect();
    $stmt = $pdo->prepare('SELECT * FROM product');
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>