<?php
$message = "";
if (isset($_GET['search'])) {
    $row = $_GET['search'];
    $query = "select catogary.catogary_name,product_name,product_image,
    product_price,selling_price,product.id,status FROM catogary
    INNER JOIN product ON product.catogary_id=catogary.id where product_name 
    LIKE '%" . $row . "%'";
    $result = mysqli_query($mysqli, $query);
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
