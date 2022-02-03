<?php

$message = $failuremessage = "";
if (isset($_GET['message'])) {
    $message= $_GET['message'];
} else if (isset($_GET['failuremessage'])) {
    $failuremessage = $_GET['failuremessage'];
}
