<?php
session_start();
require_once('db.php');
$conn = db_connect();
$user_id = $_SESSION["logged"];
if(!$conn){
    echo("failed");
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$ph = $_POST['ph'];

$sql2 = "UPDATE users SET email='$email',fname='$fname',lname='$lname',ph='$ph' WHERE user_id=$user_id";
$result = mysqli_query($conn,$sql2);
header('location:user-profile.php')
?>