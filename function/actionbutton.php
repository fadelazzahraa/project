<?php
    session_start();
    if ($_SESSION['loggedIn'] == true){
        header("location:../store.php");
    } else {
        header("location:../login.php?msg=You need to login before do shopping");
    }
    
?>