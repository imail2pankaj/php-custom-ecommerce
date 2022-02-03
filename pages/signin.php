<?php

$message = "";
if (isset($_GET['redirect'])) {
    $_SESSION['redirect'] = $_GET['redirect'];
}
if (isset($_POST['signin'])) {
    if (empty($_POST['email'])) {
        $message .= 'Email is required<br/>';
    }
    if (empty($_POST['password'])) {
        $message .= 'Password is invalid<br/>';
    }
    if ($message == "") {
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $password = md5($_POST['password']);
        $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
        $query = "select * from users where email='$email' AND  password='$password'";
        $result = mysqli_query($mysqli, $query);

        $count = mysqli_num_rows($result);
        if ($count == 1) {

            $row = $result->fetch_assoc();

            if ($row['status'] == 'active') {
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['userid'] = $row['id'];
                $_SESSION['user_type'] = $row['user_type'];
                
                // print_r($row);exit;
                if (isset($_SESSION['redirect'])) {
                    $redirect = $_SESSION['redirect'];
                    unset($_SESSION['redirect']);
                    header("location:" . $redirect);
                } else {
                    header("location:index.php");
                }
            } else {
                $message = "Your account is inactive";
            }
        } else {
            $message = "Invalid Email or Password.";
        }
    }
}
