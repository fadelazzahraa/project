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
    <title>Sign up Page | Sanapati Food Store</title>
</head>

<body>


    <div class="d-flex justify-content-center">
        <div class="col-lg-5 p-5 justify-content-center ">
            <article class="card-body">
                <h1 class="card-title text-center mt-4">Sign up</h1>
                <h6 class="card-title text-center mb-5">Sanapati Food Store</h6>
                <hr>
                <?php
                if (empty($_GET)) {
                    echo '<p class="text-success text-center">Submit form below</p>';
                } else {
                    echo '<p class="text-success text-center">' . $_GET['msg'] . '</p>';
                }
                ?>
                <form class="form-signin" method="post" action="function/signup.php">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="name" class="form-control" placeholder="Name" type="text" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="username" class="form-control" placeholder="Username" type="text" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Password" type="password">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="confirmpassword" class="form-control" placeholder="Confirm password"
                                type="password">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </div> <!-- form-group// -->
                    <hr>
                    <p class="text-center"><a href="login.php" class="btn">Already have account? Login</a></p>
                    <p class="text-center"><a href="index.php" class="btn">Go back to home</a></p>
                </form>
            </article>
        </div>
    </div>

</body>

</html>