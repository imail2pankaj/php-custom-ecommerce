<?php
$message = "";
if (!isset($_COOKIE['wishlist'])) {
    header("location:sign-in.php");
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'add-wishlist') {
    $id = $_GET['id'];

    $wishlist = isset($_COOKIE["wishlist"]) ? $_COOKIE["wishlist"] : "[]";
    $wishlist = json_decode($wishlist);

    $user_id = $_SESSION['userid'];
    $product_id = $_GET['id'];

    array_push($wishlist, $product_id);
    $query = "insert into wishlist (user_id,product_id) values ($user_id ,$product_id)";
    $res = mysqli_query($mysqli, $query);
    if ($res) {
        $message = "product added to Wishlist";
    } else {
        $message = "not added";
    }
    setcookie("wishlist", json_encode($wishlist));
    header("location:wishlist.php");
    exit;
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'remove-wishlist') {
    $id = $_GET['id'];

    $wishlist = isset($_COOKIE["wishlist"]) ? $_COOKIE["wishlist"] : "[]";
    $wishlist = json_decode($wishlist);
    for ($i = 0; $i < count($wishlist); $i++) {
        if ($wishlist[$i] == $id) {
            array_splice($wishlist, $i, 1);
        }
    }

    $user_id = $_SESSION['userid'];
    $product_id = $_GET['id'];
    $wishlistItem_remove = "delete from wishlist WHERE product_id = " . $product_id . " and user_id=" . $user_id;
    $result = mysqli_query($mysqli, $wishlistItem_remove);
    // print_r($wishlist);exit;
    setcookie("wishlist", json_encode($wishlist));
    header("location:wishlist.php");
}
// echo "<pre>";
// print_r($_COOKIE);
$wishlistItems = isset($_COOKIE["wishlist"]) ? $_COOKIE["wishlist"] : "[]";
$wishlistItems = json_decode($wishlistItems);

$query = "select product.*,wishlist.product_id from wishlist join product on product.id = wishlist.product_id";
$show = mysqli_query($mysqli, $query);