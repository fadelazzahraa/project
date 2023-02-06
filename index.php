<?php
session_start();
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
  <title>Sanapati Food Store</title>
</head>

<body>


  <?php
  generateHeader('home');
  ?>

  <div class="container py-3">
    <div class="row pt-5 pb-5">
      <div class="p-5">
        <div class="row justify-content-center pb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
            class="bi bi-emoji-laughing" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path
              d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z" />
          </svg>

          <h2 class="display-5 fw-bold text-center">Hello!</h2>
          <p class="fs-4 text-center">Welcome to Sanapati Food Store website! Go find out what you need right now!</p>
          <a href="function/actionbutton.php" style="text-decoration:none">
            <div class="d-grid col-6 mx-auto">
              <button class="btn btn-lg btn-primary shadow-lg" type="button"><i class="bi bi-search"></i> Go
                shopping!</button>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
  <!-- End of Jumbotron -->

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