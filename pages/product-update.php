<?php
$product_name = "";
$catogary_id = "";
$product_desc = "";
$product_price = "";

if (isset($_GET['id'])) {
    $query = "select * from product where id = " . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $catogary_id = $row['catogary_id'];
        $product_desc = $row['product_desc'];
        $product_price = $row['product_price'];
    }
}

$message = "";

if (isset($_POST['update-product'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product_name = $_POST['product_name'];
        $product_image = $_FILES['product_image']['name'];
        $catogary_id = $_POST['catogary_id'];
        $product_desc = $_POST['product_desc'];
        $product_price = $_POST['product_price'];

        if (empty($_POST['product_name'])) {
            $message .= 'Product name is required<br/>';
        }
        $allowedExts = array("jpeg", "jpg", "png");
        $extension = strtolower(pathinfo($_FILES["product_image"]['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExts)) {
            $message .= "Please select only image file<br>";
        }
        if (empty($_POST['product_desc'])) {
            $message .= 'Product Description is required<br/>';
        }
        if (empty($_POST['product_price'])) {
            $message .= 'Product price is required<br/>';
        }


        if ($message == "") {
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], 'uploads/products/' . $_FILES["product_image"]['name'])) {
                if (isset($_FILES['product_image']['name'])) {
                    $query = "update product set product_name='$product_name',
                    product_image='$product_image',catogary_id='$catogary_id',product_desc='$product_desc',
                    product_price='$product_price' where id='$id'";
                } else {
                    $query = "update product set product_name='$product_name',catogary_id='$catogary_id',
                    product_desc='$product_desc',product_price='$product_price' where id='$id'";
                }
            }
            $result = mysqli_query($mysqli, $query);

            if ($result) {
                $message = "Update Successfully";
            } else {
                $message = "Not Update";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
