<?php session_start();
session_destroy();
header("location:sign-in.php");
echo "You're Logged out";
exit;
