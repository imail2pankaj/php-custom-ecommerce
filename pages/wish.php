<?php
if (!isset($_SESSION['userid'])) {
    header("location:sign-in.php");
} else {
    $user_id = $_SESSION['userid'];
    $product_id = $_GET['id'];

    $query = "insert into wishlist (user_id,product_id) values ($user_id ,$product_id)";
    $res = mysqli_query($mysqli, $query);
    if ($res) {
        $message = "product added to Wishlist";
    } else {
        $message = "not added";
    }
}
