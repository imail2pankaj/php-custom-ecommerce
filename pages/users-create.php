<?php

$message = "";

if (isset($_POST['create'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $status = $_POST['status'];
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
    $gender = $_POST['gender'];
    $height = mysqli_real_escape_string($mysqli, $_POST['height']);
    $password = md5($_POST['password']);
    $user_type = $_POST['user_type'];

    if (empty($_POST['first_name'])) {
        $message .= '*Enter First Name<br>';
    }
    if (empty($_POST['last_name'])) {
        $message .= '*Enter Last Name<br>';
    }
    if (empty($_POST['email'])) {
        $message .= '*Enter Email<br>';
    }
    if (empty($_POST['dob'])) {
        $message .= '*Enter dob<br>';
    }
    if (empty($_POST['height'])) {
        $message .= '*Enter Height<br>';
    }
    if (empty($_POST['password'])) {
        $message .= '*Enter Password<br>';
    }

    $row = isEmailRegistered($mysqli, $email);
    if ($row == 1) {
        $message .= "This email is ready registered";
    }

    if ($message == "") {
        $query = "insert into users (first_name,last_name,status,email,dob,gender,height,password,user_type)
        values ('$first_name','$last_name','$status','$email','$dob','$gender','$height','$password','$user_type')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            $message = "You've Create User";
            header("location:users-list.php");
        } else {
            $message = "You've Not Create User";
        }
    }
}
