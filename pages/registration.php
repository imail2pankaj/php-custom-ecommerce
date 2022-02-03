<?php

$message = "";
if (isset($_POST['reg'])) {
    $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $dob = $_POST['dob'];
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = md5($_POST['password']);

    if (empty($_POST['first_name'])) {
        $message .= 'First name is required<br/>';
    }
    if (empty($_POST['last_name'])) {
        $message .= 'Last name is required<br/>';
    }
    if (empty($_POST['dob'])) {
        $message .= 'date of birth is required<br/>';
    }

    if (empty($_POST['email'])) {
        $message .= 'Email is required<br/>';
    }

    if (empty($_POST['password']) && strlen($_POST['password']) < 6) {
        $message .= 'Password is invalid<br/>';
    }

    if (!isset($_POST['i_agree'])) {
        $message .= 'Please check terms and conditions.<br/>';
    }
    $query = "select email from users where email='$email'";
    $result = mysqli_query($mysqli, $query);

    $count = isEmailRegistered($mysqli, $email);
    if ($count == 1) {
        $message .= 'This email is already registered';
    }

    if ($message == "") {
        $created_at = date('Y-m-d h:i:s');
        $query = "insert into users (first_name,last_name,dob,email,password,created_at)
        values ('$first_name','$last_name','$dob','$email','$password','$created_at')";
        $user = mysqli_query($mysqli, $query);

        if ($user) {
            $message = "Your Registration success";
        } else {
            $message = "You are not registered";
        }
    }
}
