<?php
session_start();
$cpass = $_POST['cpass'];
$npass = $_POST['npass'];
$cnpass = $_POST['cnpass'];
$user_id = $_SESSION["logged"];
require_once('db.php');
$conn = db_connect();
if($npass=$cnpass){
    $sql = "SELECT pswrd FROM users WHERE user_id=$user_id";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    if($res['pswrd']==$cpass){
        $sql = "UPDATE users SET pswrd='$npass' WHERE user_id=$user_id";
        mysqli_query($conn,$sql);
        header('location:change-pass.js');
    }else{
        echo 'wrong passwrod';
    }
}


?>