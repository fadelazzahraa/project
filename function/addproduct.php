<?php
include 'dbconnect.php';
include 'cart.php';

if (!empty($_POST)) {
    session_start();
    $pdo = pdo_connect();

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $newimagepath = "";

    if (is_string($name) && is_string($description) && is_numeric($price) && is_numeric($qty)) {
        if ($price < 0 || $qty < 0) {
            header("location:../productadd.php?msg=Add product failed. Make sure you input price and qty with non-negative number!");
        } else {

            // upload image
            if ($_FILES['imgupload']['name'] != "") {
                $file_name = $_FILES['imgupload']['name'];
                $file_templocation = $_FILES['imgupload']['tmp_name'];
                $file_filetype = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["imgupload"]["tmp_name"]);
                if ($check == false) {
                    header("location:../productadd.php?msg=Add product failed. Make sure you upload allowed image file!");
                } else {
                    // get all product 
                    $stmt = $pdo->prepare('SELECT * FROM product');
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $file_newname = $products[sizeof($products) - 1]['id'] + 1 . '.' . $file_filetype;
                    move_uploaded_file($file_templocation, "../image/" . $file_newname);

                    $newimagepath = $file_newname;

                    // add data
                    $stmt = $pdo->prepare('INSERT INTO product (name, description, price, qty, imagepath) VALUES (?, ?, ?, ?, ?)');
                    $stmt->execute([$name, $description, $price, $qty, $newimagepath]);

                    // reset cart
                    $stmt = $pdo->prepare('SELECT * FROM product');
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $_SESSION['cart'] = initCart($products);

                    header("location:../productadd.php?msg=success");
                }
            } else {
                header("location:../productadd.php?msg=Add product failed. Make sure you upload an image!");
            }
        }
    } else {
        header("location:../productadd.php?msg=Add product failed. Make sure you input correct data in correct format!");
    }


}

?>