<?php

    function generateHeader($active){
        echo '
            <header class="pb-5">
                <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top shadow-lg py-3">
                <div class="container-fluid">
                    <a class="navbar-brand mx-3" href="#">🥗 Sanapati Food Store</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mx-2 me-auto">
                        <li class="nav-item"><a href="'.($active == 'home'  ? '#' : 'index.php' ).'" class="nav-link px-2 link-'.($active == 'home'  ? 'dark' : 'secondary').'">Home</a></li>
                        <li class="nav-item"><a href="'.($active == 'store' ? '#' : 'store.php').'" class="nav-link px-2 link-'.($active == 'store' ? 'dark' : 'secondary').'">Store</a></li>
                        <li class="nav-item"><a href="'.($active == 'about' ? '#' : 'https://instagram.com/fadelazzahraa').'" class="nav-link px-2 link-'.($active == 'about' ? 'dark' : 'secondary').'">About</a></li>
                    </ul>
                    <div class="d-flex mx-3 mx-md-2" role="search">';
        generateTailHeader();
        echo '</div>
                    </div>
                </div>
                </nav>
            </header>
        ';
    }

    function generateTailHeader(){
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