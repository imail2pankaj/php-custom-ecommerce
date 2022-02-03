<?php
$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select product_image from product where id = '$id'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $image = $row['product_image'];
    }
    unlink('uploads/products/' . $image);
    $query = mysqli_query($mysqli, "delete from product where id = '$id'");
    if ($query) {
        $message = "product deleted";
    } else {
        $message = "Error deleting product";
    }
}   

$query = "select catogary.catogary_name,product_name,product_image,
product.id,product_price,selling_price,status,product.created_at FROM catogary
INNER JOIN product ON product.catogary_id=catogary.id";
// $query = "select * from product";
$result = mysqli_query($mysqli, $query);
