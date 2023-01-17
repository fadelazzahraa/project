<?php
    include 'user.php';
    if (isset($_GET)){
        switchRoleUser($_GET['id']);
        header("location:../manageuser.php");
    }
?>