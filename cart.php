<?php
session_start();

include 'function/dbfetch.php';
include 'function/cart.php';
if (isCartNotEmpty($_SESSION['cart']) != 1) {
    header("location:store.php");
}
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
    <title>Cart | Sanapati Food Store</title>
</head>

<!-- <body class="bg-primary"> -->

<body>
    <div class="d-flex justify-content-center">
        <div class="col-lg-8 p-5 justify-content-center">
            <!-- <div class="card"> -->

            <article class="card-body bg-dark">
                <h1 class="card-title text-center mt-4 text-light">Cart</h1>
                <h6 class="card-title text-center mb-5 text-light">Sanapati Food Store</h6>
                <hr style="border-top: 1px solid white;">
                <p class="text-primary text-center">Check your order below</p>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col" class="th-lg">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idx = 1;
                            $totalprice = 0;
                            foreach ($products as $product) {
                                if ($_SESSION['cart'][$product['id']] != 0) {
                                    $price = $product['price'] * $_SESSION['cart'][$product['id']];
                                    $totalprice = $totalprice + $price;
                                    echo '<tr>';
                                    echo '<th scope="row">' . $idx . '</th>';
                                    echo '<td>' . $product['name'] . '</td>';
                                    echo '<td>' . $_SESSION['cart'][$product['id']] . '</td>';
                                    echo '<td>Rp' . $price . ',00</td>';
                                    echo '<td><button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmRemove(' . $product['id'] . ',`' . $product['name'] . '`)">-1</button></td>';
                                    echo '</tr>';
                                    $idx = $idx + 1;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        function confirmRemove(id, name) {
                            var confirm = window.confirm("Confirm to remove one " + name + "?")
                            if (confirm == true) {
                                window.location.href = "function/deletefromcartbutton.php?id=" + id
                            } else {
                                return false
                            }
                        }
                    </script>
                </div>
                <div class="row px-5 py-3">
                    <div class="col-sm">
                        <p class="text-light text-sm-right text-center">Total price you should pay:</p>
                    </div>
                    <div class="col-sm">
                        <h2 class="card-title text-center text-light">Rp
                            <?= $totalprice ?>,00
                        </h2>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <form class="form-signin" method="post"
                        action="function/checkout.php?totalprice=<?= $totalprice ?>">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#confirm-checkout"
                            class="btn btn-primary btn-block btn-lg">Checkout!</button>

                </div>
                <div class="modal fade" id="confirm-checkout" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-body">
                                <div class="d-flex justify-content-center my-4">
                                    <h1 class="text-primary">🛒 ❔</h1>
                                </div>
                                <div class="d-flex justify-content-center my-3">
                                    <h5 class="text-light">
                                        Are you sure to checkout all products?
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-center my-2">
                                    <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">No, return
                                        to cart</button>
                                    <button type="submit" class="btn btn-primary " name="checkout" value="checkout">Yes,
                                        checkout them!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
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