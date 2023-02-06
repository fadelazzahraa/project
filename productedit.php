<?php
session_start();

include 'function/dbconnect.php';
include 'function/cart.php';
include 'template/header.php';
include 'template/footer.php';


if (!empty($_GET)) {
  if (isset($_GET['id'])) {
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


  <link rel="icon" href="image/favicon.ico" type="image/x-icon">
  <title>
    <?= $product['name'] ?> | Sanapati Food Store
  </title>
</head>

<body>


  <?php
  generateHeader('store');
  ?>

  <div class="container p-5 my-5">
    <div class="row">
      <?php
      if (!isset($_GET['msg'])) {
        echo '<p class="text-success text-center">Edit product below</p>';
      } else {
        echo '<p class="text-success text-center">' . $_GET['msg'] . '</p>';
      }
      ?>
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="ratio ratio-1x1">
            <img src="image/<?= $product['imagepath'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
          </div>
        </div>
        <form class="" method="post" action="function/editproduct.php?id=<?= $product['id'] ?>"
          enctype="multipart/form-data">
          <input name="imgupload" id="imgupload" class="form-control form-control mt-2" type="file"
            accept="image/jpeg,image/png">
          <label class="text-center mb-3" style="font-size:13px;">Make sure to upload jpeg/png image with 1:1
            ratio</label>
      </div>
      <div class="col-lg-8 col-md-6">
        <input name="name" class="form-control mb-2" placeholder="Name" value="<?= $product['name'] ?>" type="text"
          required>
        <textarea name="description" class="form-control my-2" placeholder="Description"
          required><?= $product['description'] ?></textarea>
        <input name="price" class="form-control my-2" placeholder="Price" value="<?= $product['price'] ?>" type="number"
          required>
        <input name="qty" class="form-control mt-2 mb-4" placeholder="Qty" value="<?= $product['qty'] ?>" type="number"
          required>
        <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal"
          data-bs-target="#confirm-edit">Edit product</button>
        <button type="button" class="btn btn-danger btn-block" data-bs-toggle="modal"
          data-bs-target="#confirm-delete">Delete product</button>

        <a href="store.php" class="btn btn-dark">Return to Store</a>
        <!-- Modal -->
        <div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="confirmModal"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
              <div class="modal-body">
                <div class="d-flex justify-content-center my-2">
                  <h1 class="text-light">🥗 ✏ ❓</h1>
                </div>
                <div class="d-flex justify-content-center my-0">
                  <h5 class="text-light">
                    Are you sure to edit this product?
                  </h5>
                </div>
                <div class="d-flex justify-content-center my-2">
                  <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">No, cancel it</button>
                  <button type="submit" class="btn btn-success mx-1">Yes, sure!</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
              <div class="modal-body">
                <div class="d-flex justify-content-center my-2">
                  <h1 class="text-danger">🥗 🗑 ❓</h1>
                </div>
                <div class="d-flex justify-content-center my-0">
                  <h5 class="text-light">
                    Are you sure to delete this product?
                  </h5>
                </div>
                <div class="d-flex justify-content-center my-2">
                  <button type="button" class="btn btn-danger mx-1" data-bs-dismiss="modal">No, cancel it</button>
                  <a href="function/deleteproduct.php?id=<?= $product['id'] ?>" class="btn btn-outline-danger ">Yes,
                    delete and
                    return
                    to
                    Store</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modal -->
        </form>

      </div>
    </div>

  </div>

  <!-- End of Jumbotron -->

  <?php
  if (isCartNotEmpty($_SESSION['cart'])) {

    echo '<div class="position-fixed position-absolute bottom-0 end-0 m-3">';
    echo '<div class="card text-end" style="width: 10rem;">';
    echo '<a href="cart.php" class="btn btn-primary">🛒 Show cart (' . countCartItem($_SESSION['cart']) . ')</a>';
    echo '</div>';
    echo '</div>';
  }
  ?>

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