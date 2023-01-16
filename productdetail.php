<?php
    session_start();

    include 'function/dbconnect.php';
    include 'function/cart.php';
    include 'template/header.php';
    

    if (!empty($_GET)){
      if (isset($_GET['id'])){
        $pdo = pdo_connect();
        $stmt = $pdo->prepare('SELECT * FROM product WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        header("location:store.php");
      }
    } else {
      header("location:store.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <link rel="icon" href="img/radioactive.svg" />
  <title><?=$product['name']?> | Sanapati Food Store</title>
</head>

<body>


  <header class="d-flex flex-wrap justify-content-center justify-content-md-between p-4 sticky-top bg-light shadow">
    <a href="#" class="d-flex align-items-center col-md-4 mb-md-0 text-dark text-decoration-none">
      <span class="fs-4 text-dark fw-bold">🥗 Sanapati Food Store</span>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="store.php" class="nav-link px-2 link-dark">Store</a></li>
      <li><a href="#" class="nav-link px-2 link-secondary">About</a></li>
    </ul>

    <div class="col-md-4 text-end">
    <?php
      generateHeader();
      ?>
      
    </div>
  </header>

  <div class="container p-5 my-5">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="ratio ratio-1x1">
          <img src="image/<?=$product['imagepath']?>" class="card-img-top" alt="<?=$product['name']?>">
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-6">
            <h1 class="pt-4"><?=$product['name']?></h1>
            <p style="text-align:justify;" class="text-align-justify"><?=$product['description']?></p>
            <h3>Rp<?=$product['price']?>,00</h3>
            <p style="color:green;">Qty left: <?=$product['qty']?></p>
            <?php
            if (!empty($_SESSION['loggedIn']) && $product['qty']!=0 && $product['qty'] != $_SESSION['cart'][$product['id']]){
              echo '<a href="function/addtocartbutton.php?id='.$product['id'].'&origin=productdetail.php?id='.$product['id']. '" class="btn btn-primary me-1">Add to cart</a>';
            }
            if (!empty($_SESSION['loggedIn']) && $_SESSION['role'] == 'admin'){
              echo '<a href="productedit.php?id='.$product['id'].'" class="btn btn-success">Edit</a>';
            }
            ?>
            <a href="store.php" class="btn btn-dark" >Return to Store</a>
      </div>
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

  <!-- Footer -->
  <footer class="footer py-5 bg-dark text-center">
    <span class="text-white">Made with <span style="color:red;">♥</span> by Fadel Azzahra</span>
    <br>
    <span class="text-white">Copyright 2023</span>
  </footer>
  <!-- End of Footer -->


</body>

</html>