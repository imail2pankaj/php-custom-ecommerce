<?php

$message = "";
$catogary_id = isset($_GET['category_id']) ? $_GET['category_id'] : [];
if (isset($_GET['search'])) {
    $row = $_GET['search'];
    $catQuery = (count($catogary_id) ? " AND product.catogary_id IN (" . implode(",", $catogary_id) . ")" : "");
    $query = "select catogary.catogary_name,product_name,product_image,
    product_price,selling_price,product.id,status FROM catogary
    INNER JOIN product ON product.catogary_id=catogary.id where (product_name 
    LIKE '%" . $row . "%' OR catogary_name 
    LIKE '%" . $row . "%') " . $catQuery . " order by product.catogary_id ";
    $result = mysqli_query($mysqli, $query);
    // print_r($_GET);
}

$query = "select * from catogary";
$catogary = mysqli_query($mysqli, $query);
