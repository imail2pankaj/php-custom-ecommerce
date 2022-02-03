<?php
$catogary_name = "";

if (isset($_GET['id'])) {
    $query = "select * from catogary where id = " . $_GET['id'];
    $result = mysqli_query($mysqli, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = $result->fetch_assoc();
        $catogary_name = $row['catogary_name'];
    }
}

$message = "";

if (isset($_POST['update-catogary'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $catogary_name = $_POST['catogary_name'];
        

        if (empty($_POST['catogary_name'])) {
            $message .= 'Catogary name is required<br/>';
        }
        

        if ($message == "") {
            $query = "update catogary set catogary_name='$catogary_name' where id='$id'";
            
            $result = mysqli_query($mysqli,$query);

            if ($result) {
                $message = "Update Successfully";
            } else {
                $message = "Not Update";
            }
        }
    }
}
