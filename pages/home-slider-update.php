<?php
$slider_image = "";
$slider_name = "";
$description = "";
if (isset($_GET['id'])) {
    $query = "select * from home_slides where id = " . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = $result->fetch_assoc();
        $slider_image = $row['slider_image'];
        $slider_name = $row['slider_name'];
        $description = $row['description'];
    }
}



$message = "";

if (isset($_POST['update-slide'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $slider_image = $_FILES['slider_image']['name'];
        $slider_name = $_POST['slider_name'];
        $description = $_POST['description'];

        $allowedExts = array("jpeg", "jpg", "png");
        $extension = strtolower(pathinfo($_FILES["slider_image"]['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExts)) {
            $message .= "Please select only image file<br>";
        }
        if (empty($_POST['slider_name'])) {
            $message .= 'Slide name is required<br/>';
        }

        
        $filename = $row["slider_image"];
        unlink('uploads/slides/' . $filename);
        

        if ($message == "") {
            $filename = strtotime(date("Y-m-d H:i:s")) . '-' . $_FILES["slider_image"]["name"];
            $slider_image =  'uploads/slides/' . $filename;
            if (move_uploaded_file($_FILES["slider_image"]["tmp_name"], $slider_image)) {
                if (isset($_FILES['slider_image']['name'])) {
                    $query = "update home_slides set slider_image='$filename',
                    slider_name='$slider_name',description='$description' where id='$id'";
                } else {
                    $query = "update home_slides set slider_name='$slider_name',description='$description'
                     where id='$id'";
                }
                $slider_image =  $filename;
            }
            $result = mysqli_query($mysqli, $query);

            if ($result) {
                $message = "Update Successfully";
            } else {
                $message = "Not Update";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
