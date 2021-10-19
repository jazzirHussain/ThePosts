<?php
session_start();
if(isset($_POST["like"])){
    require_once('db.php');
    $conn = db_connect();
    $post_id = (int)$_POST["post_id"];
    $user_id = (int)$_SESSION["logged"];
    $sql= "SELECT * FROM likes WHERE user_id=$user_id AND post_id=$post_id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $sql = "DELETE FROM likes WHERE user_id=$user_id AND post_id=$post_id";
        mysqli_query($conn,$sql);
        $sql ="UPDATE posts SET likes=likes-1 WHERE post_id=$post_id";
        mysqli_query($conn,$sql);
        header('location:index.php');
    }else{
        $sql = "INSERT INTO likes(user_id,post_id) VALUES($user_id,$post_id)";
        mysqli_query($conn,$sql);
        $sql ="UPDATE posts SET likes=likes+1 WHERE post_id=$post_id";
        mysqli_query($conn,$sql);
        header('location:index.php');
    }
    
}

?>