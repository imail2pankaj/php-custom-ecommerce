<?php

$message = "";

if (isset($_POST['add-catogary'])) {
    $catogary_name = mysqli_real_escape_string($mysqli, $_POST['catogary_name']);

    if (empty($_POST['catogary_name'])) {
        $message .= '*Enter Catogary Name<br>';
    }

    if ($message == "") {
        $query = "insert into catogary (catogary_name) values ('$catogary_name')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            $message = "Catogary added";
            header("location:catogary-list.php");
        } else {
            $message = "Catogary not added";
        }
    }
}
