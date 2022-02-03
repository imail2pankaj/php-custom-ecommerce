<?php
$message = "";
if (isset($_POST['add-product'])) {
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_image = $_FILES['product_image'];
    $catogary_id = mysqli_real_escape_string($mysqli, $_POST['catogary_id']);
    $product_desc = mysqli_real_escape_string($mysqli, $_POST['product_desc']);
    $product_price = mysqli_real_escape_string($mysqli, $_POST['product_price']);
    $selling_price = mysqli_real_escape_string($mysqli, $_POST['selling_price']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);
    if (empty($_POST['product_name'])) {
        $message .= '*Enter Product Name<br>';
    }
    $allowedExts = array("jpeg", "jpg", "png");
    $extension = strtolower(pathinfo($_FILES["product_image"]["name"], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExts)) {
        $message .= "Please select only image file<br>";
    }
    if (empty($_POST['product_desc'])) {
        $message .= '*Enter Product Description<br>';
    }
    if (empty($_POST['product_price'])) {
        $message .= '*Enter Product Price <br>';
    }

    if ($message == "") {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], 'uploads/products/' . $_FILES["product_image"]["name"])) {
            $product_image = $_FILES["product_image"]["name"];
            $query = "insert into product (product_name,product_image,catogary_id,product_desc,product_price,selling_price,status) 
        values ('$product_name','$product_image','$catogary_id','$product_desc','$product_price','$selling_price','$status')";
            $result = mysqli_query($mysqli, $query);

            if ($result) {
                $message = "product added";
                header("location:product-list.php");
            } else {
                $message = "product not added";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
