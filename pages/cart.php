<?php
$message = "";
if (!isset($_COOKIE['cart'])) {
    header("location:sign-in.php");
}
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'add-cart') {
    $id = $_GET['id'];

    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
    $isProductExists = false;
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]->id == $id) {
            $cart[$i]->quantity += 1;
            $isProductExists = true;
        }
    }
    if (!$isProductExists) {
        $query = "select * from product where id = '$id'";
        $result = mysqli_query($mysqli, $query);
        array_push($cart, array(
            "id" => $id,
            "quantity" => 1,
            "product" => mysqli_fetch_assoc($result)
        ));
    }
    setcookie("cart", json_encode($cart));
    header("location:cart.php");
}
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'remove-cart') {
    $id = $_GET['id'];

    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]->id == $id) {
            array_splice($cart, $i, 1);
        }
    }
    setcookie("cart", json_encode($cart));
    header("location:cart.php");
}
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'update-cart') {
    $id = $_GET['id'];

    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]->id == $id) {
            $cart[$i]->quantity = $_GET['quantity'];
        }
    }
    setcookie("cart", json_encode($cart));
    header("location:cart.php");
}


$cartItems = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cartItems = json_decode($cartItems);