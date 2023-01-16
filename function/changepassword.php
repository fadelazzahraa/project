<?php
    session_start();

    include 'dbconnect.php';
    $pdo = pdo_connect();
   
    if (!empty($_POST)){
        $id = $_SESSION['id'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];
        $stmt = $pdo->prepare('SELECT username FROM user WHERE id = ? AND password = ?');
        $stmt->execute([$id, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user){
            if ($newpassword == $confirmpassword) {
                $stmt = $pdo->prepare('UPDATE user SET password = ? WHERE id = ?');
                $stmt->execute([$newpassword, $id]);
                header("location:../changepassword.php?msg=Password successfully changed!");
            } else {
                header("location:../changepassword.php?msg=Change password failed. Make sure new password correctly confirmed!");
            }
        } else {
            header("location:../changepassword.php?msg=Change password failed. Input correct old password!");
        }
    }
       
?>