<?php


$message = "";
$user_id = $_SESSION['userid'];
$cartItems = cartItems();

$price = 0;
foreach ($cartItems as $cart) {
    if ($cart->product->selling_price) {
        $price = ($cart->quantity * $cart->product->selling_price) + $price;
    } else {
        $price = ($cart->quantity * $cart->product->product_price) + $price;
    }
}

$order_id = "";
$address_id = $_POST['address_id'];


$query = "insert into orders (user_id,address_id,totalprice) 
values($user_id,$address_id,$price)";
$result = mysqli_query($mysqli, $query);

$id = mysqli_insert_id($mysqli);
$order_id = orderPrefix($id);
$query = "update orders set order_id = '$order_id' where id = $id";
$result = mysqli_query($mysqli, $query);

foreach ($cartItems as $cart) {
    if ($cart->product->selling_price) {
        $price = ($cart->product->selling_price);
    } else {
        $price = ($cart->product->product_price);
    }
    $quantity = $cart->quantity;
    $product_id = $cart->product->id;
    $query = "insert into order_items (product_id,order_id,product_price,quantity) 
    values ($product_id,$id,$price,$quantity)";
    $result = mysqli_query($mysqli, $query);
}
setcookie('cart', "[]");

try {
    if (isset($_POST['stripeToken'])) {
        \Stripe\Stripe::setVerifySslCerts(false);

        $token = $_POST['stripeToken'];
        $data = \Stripe\Charge::create(array(
            "amount" => $price,
            "currency" => "USD",
            "description" => "$order_id",
            "source" => $token
        ));
        $customer = \Stripe\Customer::create(
            array(
                "email" => $_SESSION['email'],
                "description" => "Example description"
            )
        );
        $transaction_id = $data->id;
        // echo "<pre>";
        // print_r($customer);
        // echo "<pre>";print_r($data);
        $query = "update orders set transaction_id = '$transaction_id',order_status='3' where orders.id = $id";
        $result = mysqli_query($mysqli, $query);
        header("location:success.php?message=Your Order Placed successfully");
        exit;
    }
} catch (Exception $e) {

    $query = "update orders set order_status='4' where orders.id = $id";
    $result = mysqli_query($mysqli, $query);
    header("location:success.php?failuremessage=Could not Place Order");
    exit;
}
