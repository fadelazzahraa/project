<?php
    session_start();
    include 'dbconnect.php';

    if (!empty($_POST)){
        $pdo = pdo_connect();
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $stmt = $pdo->prepare('UPDATE user SET name = ?, username = ? WHERE id = ?');
        $stmt->execute([$name, $username, $id]);

        // update name on session
        $_SESSION['name'] = $_POST['name'];
        header("location:../editprofile.php?msg=Profile updated!");
    }
?>