<?php
include 'dbconnect.php';
include 'cart.php';

if (!empty($_POST)){
    $pdo = pdo_connect();
    $stmt = $pdo->prepare('SELECT id, name, username, role FROM user WHERE username = ? AND password = ?');
    $stmt->execute([$_POST['username'], $_POST['password']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        header('location:../login.php?msg=Wrong username/password!');
    } else {
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        $stmt = $pdo->prepare('SELECT * FROM product');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['cart'] = initCart($products);
        
        header('location:../store.php');
    }
}
?>