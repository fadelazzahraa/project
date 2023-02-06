<?php
session_start();

include 'function/dbfetch.php';
include 'function/cart.php';
include 'template/header.php';
include 'template/footer.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="icon" href="image/favicon.ico" type="image/x-icon">
  <title>Store | Sanapati Food Store</title>
  <style>
    .crop-text-2 {
      -webkit-line-clamp: 2;
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-box-orient: vertical;
    }
  </style>
</head>

<body>

  <?php
  generateHeader('store');
  ?>

  <div class="container p-5 my-5">
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-5">


      <?php
      foreach ($products as $product) {
        echo '<div class="col">';
        echo '<div class="card" style="width: 18rem;">';
        echo '<div class="ratio ratio-1x1">';
        echo '<img src="image/' . $product['imagepath'] . '" class="card-img-top" alt="' . $product['name'] . '">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">' . $product['name'] . '</h4>';
        echo '<p class="card-text text-truncate">' . $product['description'] . '</p>';
        echo '<h5 class="card-text text-dark">Rp' . $product['price'] . ',00</h5>';
        echo '<p class="card-text text-' . ($product['qty'] > 3 ? "success" : ($product['qty'] == 0 ? "danger" : "warning")) . ' mt-2 mb-3">Qty left: ' . $product['qty'] . '</p>';
        echo '<a href="productdetail.php?id=' . $product['id'] . '" class="btn btn-dark me-2">Detail</a>';
        if (!empty($_SESSION['loggedIn']) && $product['qty'] != 0 && $product['qty'] != $_SESSION['cart'][$product['id']]) {
          echo '<a href="function/addtocartbutton.php?id=' . $product['id'] . '&origin=store.php" class="btn btn-primary me-2">Add to cart</a>';
        }
        if (!empty($_SESSION['loggedIn']) && $_SESSION['role'] == 'admin') {
          echo '<a href="productedit.php?id=' . $product['id'] . '" class="btn btn-success">Edit</a>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
      ?>

    </div>
  </div>


  <!-- End of Jumbotron -->
  <?php
  if (!empty($_SESSION['loggedIn']) && isCartNotEmpty($_SESSION['cart'])) {

    echo '<div class="position-fixed position-absolute bottom-0 end-0 m-3">';
    echo '<div class="card text-end" style="width: 10rem;">';
    echo '<a href="cart.php" class="btn btn-primary">🛒 Show cart (' . countCartItem($_SESSION['cart']) . ')</a>';
    echo '</div>';
    echo '</div>';
  }
  ?>
  <br>
  <!-- Footer -->
  <?php
  generateFooter();
  ?>
  <!-- End of Footer -->

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <!-- End of Script -->
</body>

</html>