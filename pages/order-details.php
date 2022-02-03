<?php

$message = "";
$user_id = $_SESSION['userid'];
$cartItems = cartItems();

$query = "select * from user_address where id = " . $_GET['address_id'];
$result = mysqli_query($mysqli, $query);

$price = 0;
foreach ($cartItems as $cart) {
    if ($cart->product->selling_price) {
        $price = ($cart->quantity * $cart->product->selling_price) + $price;
    } else {

        $price = ($cart->quantity * $cart->product->product_price) + $price;
    }
}

$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart);    
