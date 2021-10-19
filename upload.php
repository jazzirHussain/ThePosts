<?php
    session_start();
    require_once('db.php');
    $conn = db_connect();
    $user_id = $_SESSION["logged"];
    if(isset($_FILES["uploadfile"])){
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "image/".$filename;
        $sql = "UPDATE users SET profile_path='./image/$filename' WHERE user_id=$user_id";
        mysqli_query($conn, $sql);
        move_uploaded_file($tempname, $folder);
        mysqli_close($conn);
        header('location:user-profile.php');
    }
    

?>