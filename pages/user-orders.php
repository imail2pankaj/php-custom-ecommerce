<?php
$message = "";
$user_id = $_SESSION['userid'];
$orders = [];
$query = "select orders.*,user_address.name,user_address.phone,user_address.address,user_address.pincode,user_address.city,user_address.state from orders join user_address on orders.address_id = user_address.id where user_address.user_id = " . $user_id;
$result = mysqli_query($mysqli, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $data = "select product.product_name,product.id, product.product_image, order_items.order_id,
    order_items.product_price,product.created_at,order_items.product_price, order_items.quantity FROM order_items JOIN product ON product.id = order_items.product_id where order_items.order_id = " . $row['id'];
    $view = mysqli_query($mysqli, $data);
    $orderItem = [];
    while ($item = mysqli_fetch_assoc($view)) {
        array_push($orderItem, $item);
    }
    $row['orderItem'] = $orderItem;
    array_push($orders, $row);
}
// echo "<pre>";print_r($orders);exit;
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'update-cancel-order') {
    $query = "update orders set order_status = 8 where orders.id =" . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'return-reason') {
    $query = "update orders set order_status = 9 where orders.id =" . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'return-reason') {
    $query = "update orders set return_order_desc='" . $_GET['return_reason'] . "' where orders.id =" . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
    exit;
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'send_review') {
    $user_id = $_SESSION['userid'];
    $product_id = $_GET['product_id'];
    $review = $_GET['description'];
    $order_id = $_GET['id'];
    $title = $_GET['title'];
    $rate = $_GET['rate'];
    $query = "insert into product_review (user_id,product_id,order_id,review_title,rating,reviews) values ('$user_id','$product_id','$order_id','$title','$rate','$review')";
    $result = mysqli_query($mysqli, $query);
    exit;
    // print_r($_SESSION);
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'update_review') {
    $review = $_GET['description'];
    $review_id = $_GET['review_id'];
    $title = $_GET['title'];
    $rate = $_GET['rate'];
    echo $query = "update product_review SET reviews='$review',review_title='$title',rating='$rate',id = $review_id";
    $result = mysqli_query($mysqli, $query);
    exit;
    // print_r($_SESSION);
}
