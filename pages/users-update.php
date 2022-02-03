<?php
$first_name = "";
$last_name = "";
$status = "";
$height = "";
$email = "";
$dob = "";
$gender = "";

if (isset($_GET['id'])) {
    $query = "select * from users where id = " . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $status = $row['status'];
        $heigt = $row['height'];
        $email = $row['email'];
        $dob = $row['dob'];
        $gender = $row['gender'];
    }
}

$message = "";

if (isset($_POST['update'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $status = $_POST['status'];
        $height = $_POST['height'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $password = md5($_POST['password']);

        if (empty($_POST['first_name'])) {
            $message .= 'First name is required<br/>';
        }
        if (empty($_POST['last_name'])) {
            $message .= 'Last name is required<br/>';
        }
        if (empty($_POST['email'])) {
            $message .= 'Email is required<br/>';
        }

        if ($message == "") {
            if(isset($_POST['password'])){
                $query = "update users set first_name='$first_name',last_name='$last_name',
                email='$email',status='$status',height='$height',dob='$dob',gender='$gender',password='$password' where id='$id'";
            }else{
                $query = "update users set first_name='$first_name',last_name='$last_name',
                email='$email',status='$status',height='$height',dob='$dob',gender='$gender' where id='$id'";
            }
            $result = mysqli_query($mysqli,$query);

            if ($result) {
                $message = "Update Successfully";
            } else {
                $message = "Not Update";
            }
        }
    }
}
