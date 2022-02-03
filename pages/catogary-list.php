<?php
$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($mysqli, "delete from catogary where id = '$id'");

    if ($query) {
        $message = "Catogary deleted";
    } else {
        $message = "Error deleting Catogary";
        mysqli_close($mysqli);
    }
}
$query = "select * from catogary";
$result = mysqli_query($mysqli, $query);