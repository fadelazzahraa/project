<?php
    include 'user.php';

    if (isset($_GET)){
        deleteUser($_GET['id']);
        header("location:../manageuser.php");
    }
?>