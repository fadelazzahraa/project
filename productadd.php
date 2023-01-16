<?php
    session_start();

    include 'function/dbconnect.php';
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
  <title>Add Product | Sanapati Food Store</title>
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
      <?php
      if (!isset($_GET['msg'])){
        echo '<p class="text-success text-center">Add product by fill form below</p>';
      } else {
        echo '<p class="text-success text-center">' . $_GET['msg'] .'</p>';
      }
      ?>
      <div class="col-lg-4 col-md-6">
        <form class="" method="post" action="function/addproduct.php" enctype="multipart/form-data">
          <input name="imgupload" id="imgupload" class="form-control form-control" type="file" accept="image/jpeg,image/png">
          <label class="text-center mb-3" style="font-size:13px;">Make sure to upload jpeg/png image with 1:1 ratio</label>
        </div>
      <div class="col-lg-8 col-md-6">
          <input name="name" class="form-control mb-2" placeholder="Name" type="text" required>
          <textarea name="description" class="form-control my-2" placeholder="Description" required></textarea>
          <input name="price" class="form-control my-2" placeholder="Price" type="number" required>
          <input name="qty" class="form-control mt-2 mb-4" placeholder="Qty" type="number" required>
          <button type="submit" class="btn btn-primary btn-block">Add product</button>
          <a href="store.php" class="btn btn-dark" >Return to Store</a>
        </form>
      </div>
    </div>
  </div>

  <!-- End of Jumbotron -->

  <!-- Footer -->
  <footer class="footer py-5 bg-dark text-center">
    <span class="text-white">Made with <span style="color:red;">♥</span> by Fadel Azzahra</span>
    <br>
    <span class="text-white">Copyright 2023</span>
  </footer>
  <!-- End of Footer -->


</body>

</html>