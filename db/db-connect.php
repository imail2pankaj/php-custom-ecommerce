<?php 
session_start();
include './db/config.php';

$GLOBALS['mysqli']= new mysqli($server_name,$username,$password,$db_name);

if($mysqli->connect_errno) {
    echo "Database not Connected" . $mysqli->connect_error;
    exit();
}
include './include/functions.php';