<?php
$message = "";

$query = "select orders.*,user_address.name,user_address.phone,user_address.city from orders join user_address on orders.address_id = user_address.id order by id desc";
$result = mysqli_query($mysqli, $query);