<?php
    include 'dbconnect.php';
    include 'cart.php';
    
    if (!empty($_POST)){
        session_start();
        $pdo = pdo_connect();
        
        $id = $_GET['id'];
        $stmt = $pdo->prepare('SELECT imagepath FROM product WHERE id = ?');
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $imagepath = $product['imagepath'];
        $newimagepath = $product['imagepath'];
        
        if (is_string($name) && is_string($description) && is_numeric($price) && is_numeric($qty)){
            if ($price < 0 || $qty < 0){
                header("location:../productedit.php?id=".$id."&msg=Edit product failed. Make sure you input price and qty with non-negative number!");
            } else {
                
                // upload image
                if ($_FILES['imgupload']['name'] != ""){
                    $file_name = $_FILES['imgupload']['name'];
                    $file_templocation = $_FILES['imgupload']['tmp_name'];
                    $file_filetype = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["imgupload"]["tmp_name"]);
                    if($check == false) {
                        header("location:../productedit.php?id=".$id."&msg=Edit product failed. Make sure you upload allowed image file!");
                        exit();
                    } else {
                        unlink("../image/". $imagepath);
                        $file_newname = $_GET['id'].".".$file_filetype;
                        move_uploaded_file($file_templocation, "../image/".$file_newname);
            
                        // newimagepath wont change if no file uploaded
                        $newimagepath = $file_newname;
                    }
                }

                // update data
                $stmt = $pdo->prepare('UPDATE product SET name = ?, description = ?, price = ?, qty = ?, imagepath = ? WHERE id = ?');
                $stmt->execute([$name, $description, $price, $qty, $newimagepath, $id]);

                // reset cart
                $stmt = $pdo->prepare('SELECT * FROM product');
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['cart'] = initCart($products);
                header("location:../productedit.php?id=".$id."&msg=Product successfully edited!");
            }
        } else {
            header("location:../productedit.php?id=".$id."&msg=Edit product failed. Make sure you input correct data in correct format!");
        }
        
        
    }

?>