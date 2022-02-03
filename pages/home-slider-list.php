<?php
$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from home_slides where id = '$id'";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($result)) {
        $image = $row['slider_image'];
    }
    unlink('uploads/slides/' . $image);
    $query = mysqli_query($mysqli, "delete from home_slides where id = '$id'");
    if ($query) {
        $message = "Home slide deleted";
    } else {
        $message = "Error deleting Home slide";
    }
}

$popularProducts = popularProducts($mysqli);

// echo "<pre>"; print_r($popularProducts);exit;
$query = "select * from home_slides";
$result = mysqli_query($mysqli, $query);
