<?php
session_start();

include 'function/dbconnect.php';
$pdo = pdo_connect();

$stmt = $pdo->prepare('SELECT name, username FROM user WHERE id = ?');
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Edit Profile | Sanapati Food Store</title>
</head>

<body>


    <div class="d-flex justify-content-center">
        <div class="col-lg-5 p-5 justify-content-center ">
            <article class="card-body">
                <h1 class="card-title text-center mt-4">Edit profile</h1>
                <h6 class="card-title text-center mb-5">Sanapati Food Store</h6>
                <hr>
                <?php
                if (empty($_GET)) {
                    echo '<p class="text-success text-center">Edit your profile below</p>';
                } else {
                    echo '<p class="text-success text-center">' . $_GET['msg'] . '</p>';
                }
                ?>
                <form class="form-signin" method="post" action="function/editprofile.php">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="name" class="form-control" placeholder="Name" type="text"
                                value="<?= $user['name'] ?>">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Username" type="text"
                                value="<?= $user['username'] ?>">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal"
                            data-bs-target="#confirm-edit">Edit profile</button>

                    </div> <!-- form-group// -->
                    <hr>
                    <p class="text-center"><a href="changepassword.php" class="btn">Change password</a></p>
                    <p class="text-center"><a href="index.php" class="btn">Go back to Home</a></p>
                    <div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="confirmModal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-center my-2">
                                        <h1 class="text-light">👤 ✏ ❓</h1>
                                    </div>
                                    <div class="d-flex justify-content-center my-0">
                                        <h5 class="text-light">
                                            Are you sure to edit profile?
                                        </h5>
                                    </div>
                                    <div class="d-flex justify-content-center my-2">
                                        <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">No,
                                            cancel it</button>
                                        <button type="submit" class="btn btn-success mx-1">Yes, sure!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </article>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
</body>

</html>