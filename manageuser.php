<?php
    session_start();

    include 'function/user.php';
    $users = fetchAllUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Manage User | Sanapati Food Store</title>
</head>

<!-- <body class="bg-primary"> -->
<body>
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 p-5 justify-content-center">
        <!-- <div class="card"> -->

                <article class="card-body bg-dark">
                    <h1 class="card-title text-center mt-4 text-light">Manage user</h1>
                    <h6 class="card-title text-center mb-5 text-light">Sanapati Food Store</h6>
                    <hr style="border-top: 1px solid white;">
                    <p class="text-primary text-center">Manage user below</p>
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-dark">
                            <thead>
                                <tr>
                                    <th scope="col" class="th-lg">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <!-- <th scope="col">Password</th> -->
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                    $idx = 1;
                                    foreach ($users as $user){
                                        echo '
                                        <tr>
                                        <th scope="row">'.$idx .'</th>
                                        <td>'. $user['name'] .'</td>
                                        <td>'. $user['username'] .'</td>
                                        <!-- <td>'. $user['password'] .'</td> -->
                                        <td>'. $user['role'] .'</td>
                                        <td>';
                                        if ($user['id'] != $_SESSION['id']){
                                            if ($user['role'] != 'admin'){
                                                    echo '<a href="function/changeroleuser.php?id='. $user['id'] .'"><button type="button" class="btn btn-outline-success btn-sm" style="width:75px;">Promote</button></a>';
                                                    echo " ";
                                                } else {
                                                    echo '<a href="function/changeroleuser.php?id='. $user['id'] .'"><button type="button" class="btn btn-outline-warning btn-sm" style="width:75px;">Demote</button></a>';
                                                    echo " ";
                                                };
                                                echo '<a href="function/deleteuser.php?id='. $user['id'] . '"><button type="button" class="btn btn-outline-danger btn-sm" style="width:75px;">Delete</button></a>';
                                            } else {
                                                echo '<a href="editprofile.php?"><button type="button" class="btn btn-outline-primary btn-sm" style="width:75px;">Edit user</button></a>';
                                            };
                                            echo '</td>
                                            </tr>
                                            ';
                                            $idx = $idx + 1;
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <hr style="border-top: 1px solid white;">
                    <p class="text-center"><a href="index.php" class="btn">Go back to Home</a></p>
                </article>
                
                
                <!-- </div> -->
            </div>
        </div>

</body>

</html>