<?php
$message = "";

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'view-order-details') {
    $query = "select orders.*,user_address.name,user_address.phone,user_address.address,user_address.pincode,user_address.city,user_address.state from orders join user_address on orders.address_id = user_address.id where orders.id = " . $_GET['id'];
    $result = mysqli_query($mysqli, $query);

    $row = mysqli_fetch_assoc($result);
    $data = "select product.product_name, product.product_image, order_items.order_id,
        order_items.product_price,product.created_at,order_items.product_price, order_items.quantity FROM order_items JOIN product ON product.id = order_items.product_id where order_items.order_id = " . $row['id'];
    $view = mysqli_query($mysqli, $data);
    $orderItem = [];
    while ($item = mysqli_fetch_assoc($view)) {
        array_push($orderItem, $item);
    }
    $row['orderItem'] = $orderItem;
    header("Content-type:application/json");
    echo json_encode($row);
    exit;
}


$query = "select orders.*,user_address.name,user_address.phone,user_address.address,user_address.city,user_address.state from orders join user_address on orders.address_id = user_address.id order by id desc";
$result = mysqli_query($mysqli, $query);

$data = "select product.product_name, product.product_image, order_items.order_id,
order_items.product_price,product.created_at,order_items.product_price, order_items.quantity FROM order_items JOIN product ON product.id = order_items.product_id ";
$view = mysqli_query($mysqli, $data);
