<?php
$message = "";
if (isset($_POST['add'])) {
    $slider_image = $_FILES['slider_image'];
    $slider_name = $_POST['slider_name'];
    $description = $_POST['description'];
    $allowedExts = array("jpeg", "jpg", "png");
    $extension = strtolower(pathinfo($_FILES["slider_image"]["name"], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowedExts)) {
        $message .= "Please select only image file<br>";
    }

    if ($message == "") {

        $filename = strtotime(date("Y-m-d H:i:s")) . '-' . $_FILES["slider_image"]["name"];
        $slider_image =  'uploads/slides/' . $filename;
        if (move_uploaded_file($_FILES["slider_image"]["tmp_name"], $slider_image)) {
            $query = "insert into home_slides (slider_image,slider_name,description) values('$filename','$slider_name','$description')";
            $result = mysqli_query($mysqli, $query);

            if ($result) {
                $message = "Slide added";
                header("location:home-slider-list.php");
            } else {
                $message = "Slide not added";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
