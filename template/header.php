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
        echo '
        <div class="btn-group">
            <button type="button" class="btn btn-outline dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            👤 '.$_SESSION['name'].'
            </button>
            <ul class="dropdown-menu">
            ';
            if ($_SESSION['role'] == 'admin'){
                echo '
                <li><a class="dropdown-item" href="productadd.php">🖍 Add product</a></li>
                <li><a class="dropdown-item" href="manageuser.php">💼 Manage user</a></li>
                <li><hr class="dropdown-divider"></li>
                ';
            }
            echo '
                <li><a class="dropdown-item" href="editprofile.php">✏️ Edit profile</a></li>   
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="function/logout.php">🗝️ Logout</a></li>
                </ul>
            </div>
        ';


        }
    }
?>