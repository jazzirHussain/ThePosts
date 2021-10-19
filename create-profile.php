<?php
session_start();
require_once('db.php');
$conn = db_connect();
if(!$conn){
    echo("failed");
}
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$paswrd = $_POST['paswrd'];
$ph = $_POST['ph'];
$sql = "INSERT INTO users(email,pswrd,fname,lname,join_date,ph,profile_path) VALUES('$email','$paswrd','$fname','$lname',SYSDATE(),'$ph','./image/default.jpeg')";
$result = mysqli_query($conn,$sql);
if($result){
    $_SESSION['logged'] = true;
    header('location:login.php');
    
}else{
    echo("Eroor Try again!");
}
mysqli_close($conn)
?>