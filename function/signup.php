<?php
    include 'dbconnect.php';
    
    if (!empty($_POST)){
        $pdo = pdo_connect();
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if ($confirmpassword == $password){
            $stmt = $pdo->prepare('INSERT INTO user (name, username, password, role) VALUES (?, ?, ?, "user")');
            $stmt->execute([$name, $username, $password]);
            header('location:../signup.php?msg=Sign up success. You can log in with new user.');
        } else {
            header('location:../signup.php?msg=Registration failed. Make sure password correctly confirmed!');
        }
    }
?>