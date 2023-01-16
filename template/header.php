<?php
    function generateHeader(){
        if (empty($_SESSION['loggedIn'])){
        echo '<a href="login.php">';
        echo '<button type="button" class="btn btn-outline-primary me-2">Login</button>';
        echo '</a>';
        echo '<a href="signup.php">';
        echo '<button type="button" class="btn btn-primary">Sign up</button>';
        echo ' </a>';
        } else {
        echo '<a href="editprofile.php">';
        echo '<button type="button" class="btn me-2">👤 ' . $_SESSION['name'] . '</button>';
        echo '</a>';
        if ($_SESSION['role'] == 'admin'){
            echo '<a href="productadd.php">';
            echo '<button type="button" class="btn btn-outline-success me-2">Add product</button>';
            echo '</a>';
        }
        echo '<a href="function/logout.php">';
        echo '<button type="button" class="btn btn-outline-danger">Logout</button>';
        echo '</a>';
        }
    }
?>