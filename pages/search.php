<?php

use LDAP\Result;

$message = "";
if (isset($_GET['search'])) {
    $row = $_GET['search'];
    $query = "select catogary.catogary_name,product_name,product_image,
    product_price,selling_price,product.id,status FROM catogary
    INNER JOIN product ON product.catogary_id=catogary.id where product_name 
    LIKE '%" . $row . "%' order by product.catogary_id ";
    $result = mysqli_query($mysqli, $query);
    $query = "select catogary.catogary_name,product_name,product_image,
    product_price,selling_price,product.id,status FROM catogary
    INNER JOIN product ON product.catogary_id=catogary.id where catogary_name 
    LIKE '%" . $row . "%' order by product.catogary_id ";
    $result = mysqli_query($mysqli, $query);
    // print_r($result);
}
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'add-cart') {
    $id = $_GET['id'];

    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
    
    setcookie("cart", json_encode($cart));
    header("location:cart.php");
}



if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'search') {
    $id = $_GET['id'];

    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
    
    setcookie("cart", json_encode($cart));
    header("location:cart.php");
}
$query = "select catogary_name from catogary";
$catogary = mysqli_query($mysqli,$query);