<?php

$message = "";
$userid = "";

$cartItems = cartItems();
$query = "select * from user_address where user_id = " . $_SESSION["userid"];
$result = mysqli_query($mysqli, $query);

$price = 0;
foreach ($cartItems as $cart) {
    if ($cart->product->selling_price) {
        $price = ($cart->quantity * $cart->product->selling_price) + $price;
    } else {

        $price = ($cart->quantity * $cart->product->product_price) + $price;
    }
}

if (isset($_POST['save'])) {
    $user_id = $_SESSION["userid"];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $query = "insert into user_address (user_id,name,phone,pincode,city,state,address)
    values ('$user_id','$name','$phone','$pincode','$city','$state','$address')";
    $data = mysqli_query($mysqli, $query);

    if ($data) {
        $message = "Address Added";
    } else {
        $message = "Address Not Added";
    }
}
