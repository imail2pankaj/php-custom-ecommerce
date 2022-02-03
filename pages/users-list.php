<?php
$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($mysqli, "delete from users where id = '$id'");

    if ($query) {
        $message = "Record deleted";
    } else {
        $message = "Error deleting record";
        mysqli_close($mysqli);
    }
}

$query = "select * from users where user_type='2'";
$result = mysqli_query($mysqli, $query);
