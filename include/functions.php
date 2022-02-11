<?php
function is_loggedin()
{
    if (isset($_SESSION['signin'])) {
        header("location:index.php");
    }
}
function formattedDateTime($date)
{
    return date("d M Y h:i A", strtotime($date));
}
function isEmailRegistered($mysqli, $email)
{
    $query = "select email from users where email='$email'";
    $result = mysqli_query($mysqli, $query);
    return mysqli_num_rows($result);
}
function popularProducts($mysqli)
{
    $products = [];
    $query = "select catogary.catogary_name,product_name,product_image,product_price,product.catogary_id,
    product.created_at,selling_price,product.id FROM catogary
    INNER JOIN product ON product.catogary_id=catogary.id where product.status = 1 ORDER BY RAND() limit 8 ";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($products, $row);
    }
    return $products;
}
function cartCounter()
{
    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
    $quantity = 0;
    for ($i = 0; $i < count($cart); $i++) {
        $quantity = $quantity + $cart[$i]->quantity;
    }
    return $quantity;
}
function cartItems()
{
    $cartItems = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cartItems = json_decode($cartItems);
    return $cartItems;
}
function orderPrefix($id)
{
    $total = 5 - strlen($id);
    return "OR" . str_repeat("0", $total) . $id;
}
function orderStatus($orderstatus)
{
    if ($orderstatus == 0) {
        return "Pending";
    } else if ($orderstatus == 1) {
        return "Accepted";
    } else if ($orderstatus == 2) {
        return "Rejected";
    } else if ($orderstatus == 3) {
        return "Paid";
    } else if ($orderstatus == 4) {
        return "Failed";
    } else if ($orderstatus == 5) {
        return "Confirmed";
    } else if ($orderstatus == 6) {
        return "Shipped";
    } else if ($orderstatus == 7) {
        return "Completed";
    } else if ($orderstatus == 8) {
        return "Cancelled";
    } else if ($orderstatus == 9) {
        return "Returned";
    } else if ($orderstatus == 10) {
        return "Refunded";
    }
}

function wishlistItems()
{
    $wishlistItems = isset($_COOKIE["wishlist"]) ? $_COOKIE["wishlist"] : "[]";
    $wishlistItems = json_decode($wishlistItems);
    return $wishlistItems;
}

function getProductOrderReview($mysqli, $product_id, $order_id)
{
    $query = "select * from product_review where product_id = $product_id and order_id= $order_id and user_id = " . $_SESSION['userid'];
    $producreview = mysqli_query($mysqli, $query);
    return mysqli_fetch_assoc($producreview);
}