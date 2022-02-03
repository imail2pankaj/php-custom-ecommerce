<?php

$message = "";
if ($_SESSION['userid']) {
    if (isset($_POST['checkout'])) {
        $user_id = $_SESSION['userid'];
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
        $pincode = mysqli_real_escape_string($mysqli, $_POST['pincode']);
        $city = mysqli_real_escape_string($mysqli, $_POST['city']);
        $state = $_POST['state'];
        $address = mysqli_real_escape_string($mysqli, $_POST['address']);
        
        if (empty($_POST['name'])) {
            $message .= '*Enter Name<br>';
        }

        if (empty($_POST['pincode'])) {
            $message .= '*Enter Pincode<br>';
        }
        if (empty($_POST['city'])) {
            $message .= '*Enter City<br>';
        }
        if (empty($_POST['state'])) {
            $message .= '*Enter State<br>';
        }
        if (empty($_POST['address'])) {
            $message .= '*Enter Address<br>';
        }


        if ($message == "") {
            $query = "insert into user_address (user_id,name,phone,pincode,city,state,address)
        values ('$user_id','$name','$phone','$pincode','$city','$state','$address')";
            $result = mysqli_query($mysqli, $query);


            if ($result) {
                $message = "You've place order";
            } else {
                $message = "You've Not place order";
            }
        }
    }
}
$query = "select * from users inner join user_address  on users.id = user_address.user_id";
$result = mysqli_query($mysqli, $query);

