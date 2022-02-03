<?php


if (isset($_GET['id'])) {
    $query = "select catogary.catogary_name,product_name,product_image,product_desc,
    product.id,product_price,selling_price,product.created_at FROM product
    INNER JOIN catogary ON product.catogary_id=catogary.id where product.id = " . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $product_image = $row['product_image'];
        $selling_price = $row['selling_price'];
        $catogary_name = $row['catogary_name'];
        $product_desc = $row['product_desc'];
        $product_price = $row['product_price'];
    }
    
}
