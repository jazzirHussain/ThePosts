<?php
    session_start();
    if(!isset($_SESSION["logged"])){
        header('location:login.php');
    }
    if(isset($_GET["logout"])){
        $_SESSION["logged"]=false;
        header('location:login.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./global.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section class='.container-fluid'>
        <?php require_once('nav.php');
        require_once('db.php');
        $conn = db_connect();
        $user_id = $_SESSION["logged"];
        $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id=users.user_id ORDER BY post_time DESC";
        $result = mysqli_query($conn,$sql);
        
        ?>
        <div>
        <div class="container mt-4 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="feed p-2">
                        <form action="add_post.php" method='post'>
                            <div class="d-flex flex-column p-2 bg-white border">
                                <div class="feed-text px-2 col-lg-12">
                                <div class="mb-3 col-lg-12">
                                    <textarea name='desc' class="custom-text" style='border:none;' id="exampleFormControlTextarea1" rows="3" placeholder="Whats on your mind..."></textarea>
                                </div>
                                </div>
                                <div class="feed-icon px-2 d-flex flex-row justify-content-end">
                                        <button type='submit' class='custom-btn'><i class="fa fa-paper-plane m-2"></i></button>
                        
                                        <button class="custom-btn">
                                            <i class="fa fa-picture-o m-2"></i>
                                        </button> 
            
                                    
                                </div>
                            </div>
                        </form>
                        <?php 
                        
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $sql= "SELECT * FROM likes WHERE user_id=$user_id AND post_id=$post_id";
                                $like = mysqli_query($conn,$sql);
                                date_default_timezone_set('Asia/Kolkata');
                                $post_time = strtotime($row['post_time']);
                                echo ('
                                <div class="bg-white border mt-2">
                                    <div>
                                        <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                                            <div class="d-flex flex-row align-items-center feed-text px-2 "><img class="me-2 prof-img-small rounded-circle" src="'.$row["profile_path"].'"width="45">
                                                <div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">' . $row['fname'] . ' ' . $row['lname'] .'</span><span class="text-black-50 time">'. $row['post_time'] .'</span></div>
                                            </div>
                                            <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                                        </div>
                                    </div>
                                    <div class="p-2 px-3"><span>' . $row['post_desc'] . '</span></div>
                                    <div class="d-flex justify-content-end socials pe-3"><form method="post" action="like.php"><input type="hidden" name="post_id" value="'.$row['post_id'].'"/>');
                                    if(mysqli_num_rows($like)>0){
                                        echo ('<button type="submit" name="like" class="custom-btn text-end"><i class="fa fa-heart"></i></button></form><p class="custom-p">'. $row['likes'] .' Likes</p></div></div>');
                                    }else{
                                        echo ('<button type="submit" name="like" class="custom-btn text-end"><i class="fa fa-heart-o"></i></button></form><p class="custom-p">'. $row['likes'] .' Likes</p></div></div>');
                                    }
                                    
                                
                                
                             }   
                        }?> 
                        
                        
                    </div>
                </div>
                </div>
            </div>

        </div>
    </section>    








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>