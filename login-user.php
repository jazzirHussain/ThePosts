<?php
session_start();
require_once('db.php');
$conn = db_connect();
$email = $_POST['email'];
$paswrd = $_POST['paswrd'];
$sql="SELECT pswrd,email,user_id FROM users WHERE email='$email'";
$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
if($result['email']==$email && $result['pswrd']==$paswrd){
    $_SESSION["logged"]=$result['user_id'];
    header('location:index.php');
}else{
    echo("failed");
}


?>