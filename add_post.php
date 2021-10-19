<?php
session_start();
require_once('db.php');
$conn = db_connect();
$post_desc = $_POST["desc"];
$user_id = $_SESSION["logged"];
$sql = "INSERT INTO posts(post_desc,likes,user_id,post_time) VALUES('$post_desc',0,$user_id,CURRENT_TIMESTAMP())";
$result = mysqli_query($conn,$sql);
if($result){
    header('location:index.php');
}

?>