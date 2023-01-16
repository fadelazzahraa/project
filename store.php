<?php
    session_start();

    include 'function/dbfetch.php';
    include 'function/cart.php';
    include 'template/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <link rel="icon" href="img/radioactive.svg" />
  <title>Store | Sanapati Food Store</title>
  <style>
    .crop-text-2 {
      -webkit-line-clamp: 2;
      overflow : hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-box-orient: vertical;
    }
  </style>
</head>

<body>


  <header class="d-flex flex-wrap justify-content-center justify-content-md-between p-4 sticky-top bg-light shadow">
    <a href="#" class="d-flex align-items-center col-md-4 mb-md-0 text-dark text-decoration-none">
      <span class="fs-4 text-dark fw-bold">🥗 Sanapati Food Store</span>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="#" class="nav-link px-2 link-dark">Store</a></li>
      <li><a href="#" class="nav-link px-2 link-secondary">About</a></li>
    </ul>

    <div class="col-md-4 text-end">
      <?php
      generateHeader();
      ?>
    </div>
  </header>

  <div class="container p-5 my-5">
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-5">
    
      
        <?php
        foreach ($products as $product) {
          echo '<div class="col">';
          echo '<div class="card" style="width: 18rem;">';
          echo '<div class="ratio ratio-1x1">';
          echo '<img src="image/'. $product['imagepath']. '" class="card-img-top" alt="'. $product['name'] . '">';
          echo '</div>';
          echo '<div class="card-body">';
          echo '<h4 class="card-title">'.$product['name'].'</h4>';
          echo '<p class="card-text text-truncate">' . $product['description'].'</p>';
          echo '<h5 class="card-text text-dark">Rp'. $product['price'].',00</h5>';
          echo '<p class="card-text text-success mt-2 mb-3">Qty left: '. $product['qty'].'</p>';
          echo '<a href="productdetail.php?id='.$product['id']. '" class="btn btn-dark me-2">Detail</a>';
          if (!empty($_SESSION['loggedIn']) && $product['qty']!=0 && $product['qty'] != $_SESSION['cart'][$product['id']]){
            echo '<a href="function/addtocartbutton.php?id='. $product['id'].'&origin=store.php" class="btn btn-primary me-2">Add to cart</a>';
          }
          if (!empty($_SESSION['loggedIn']) && $_SESSION['role'] == 'admin'){
            echo '<a href="productedit.php?id='.$product['id'].'" class="btn btn-success">Edit</a>';
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
  if (!empty($_SESSION['loggedIn']) && isCartNotEmpty($_SESSION['cart'])){
    
    echo '<div class="position-fixed position-absolute bottom-0 end-0 m-3">';
    echo '<div class="card text-end" style="width: 10rem;">';
    echo '<a href="cart.php" class="btn btn-primary">🛒 Show cart ('. countCartItem($_SESSION['cart']) .')</a>';
    echo '</div>';
    echo '</div>';
  }
  ?>
  <br>
  <!-- Footer -->
  <footer class="footer py-5 bg-dark text-center">
    <span class="text-white">Made with <span style="color:red;">♥</span> by Fadel Azzahra</span>
    <br>
    <span class="text-white">Copyright 2023</span>
  </footer>
  <!-- End of Footer -->


</body>

</html>