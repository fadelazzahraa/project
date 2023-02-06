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
    <title>Cart | Sanapati Food Store</title>
</head>

<!-- <body class="bg-primary"> -->

<body>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#checkout-success').modal('show');
        });
    </script>

    <div class="modal fade" id="checkout-success">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-body">
                    <div class="d-flex justify-content-center my-4">
                        <h1 class="text-danger">🛒 ✔</h1>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <h3 class="text-light">
                            Checkout success!
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-lg-8 p-5 justify-content-center">
            <!-- <div class="card"> -->

            <article class="card-body bg-dark">
                <h1 class="card-title text-center mt-4 text-light">Cart</h1>
                <h6 class="card-title text-center mb-5 text-light">Sanapati Food Store</h6>
                <hr style="border-top: 1px solid white;">
                <h2 class="text-primary text-center">Transaction success!</h2>
                <p class="text-light text-center">Total price you have paid:</p>
                <h1 class="card-title text-center text-light py-2">
                    Rp
                    <?= $_GET['totalprice'] ?>,00
                </h1>
                <p class="text-light text-center">Thank you for your shopping!</p>
                <hr style="border-top: 1px solid white;">
                <p class="text-center"><a href="store.php" class="btn">Go back to Store</a></p>
            </article>


            <!-- </div> -->
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