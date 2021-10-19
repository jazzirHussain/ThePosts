<?php
session_start();
if(!isset($_SESSION["logged"])){
    header('location:login.php');
}
if(isset($_POST["upload"])){
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./global.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <section class='.container-fluid cont'>
        <?php require_once('nav.php');
        require_once('db.php');
        $conn = db_connect();
        $user_id = $_SESSION["logged"];
        $sql = "SELECT * FROM users WHERE user_id=$user_id";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        ?>
        <div class="d-flex cont flex-row ">
            <div class="bd col-lg-2 d-none d-sm-block">
                <div class="lists">
                    <div class="mt-5 heading d-flex justify-content-center ">
                        <h1 class="fs-3 fw-bold">User Profile</h1>
                    </div>
                    <div class="list-items">
                        <div class="mt-5 chng-paswrd d-flex flex-row justify-content-center align-items-center"'>
                            <i class="fa fa-user me-2" aria-hidden="true"></i>
                            <a href="user-profile.php"><p class='cp fs-5'>User info</p></a>
                        </div>
                        <div class=" mb-0 mt-0 chng-paswrd d-flex flex-row justify-content-center align-items-center" style='border-right:3px solid #fa6e14; border-radius:1px;'>
                            <i class="fa fa-unlock-alt me-2" aria-hidden="true"></i>
                            <p class='cp fs-5'>Change Password</p>
                        </div>
                        <div class=" mt-0 my-posts text-center d-flex flex-row justify-content-center align-items-center">
                        <i class="fa fa-id-badge me-2" aria-hidden="true"></i>
                            <p class='cp fs-5'>My Posts</p>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <div class="nbd bd col-lg-10 ">
                <form action="pass-change-action.php" method="POST" enctype="multipart/form-data">
                    <div class="mt-5 pud col-lg-12">
                        <div class='col-lg-10'>
                            <div class="left col-lg-12">
                                    <div class="row mt-5">
                                        <div class="col col-lg-4 col-12">
                                            <label for="" class='m-1 custom-p'>Current Password </label>
                                            <input type="password" class="form-control  ci" name='cpass' aria-label="cpass">
                                        </div>
                                        <div class="col col-lg-4 col-12">
                                        <label for="" class='m-1 custom-p'>New Password </label>
                                            <input type="password" class="form-control  ci" name='npass' aria-label="npass">
                                        </div>
                                        <div class="col col-lg-4 col-12">
                                        <label for="" class='m-1 custom-p'>Confirm Password </label>
                                            <input type="password" class="form-control  ci" name='cnpass' aria-label="cnpass">
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12 mt-5 d-flex flex-row justify-content-center">
                    
                                        <button type='submit' class='cb'>Change Password </button>
                                    </div>
                                    
                </form>
                            </div>

                            
                            
                        </div>
                        
                        
                    </div>  
            </div>
        </div>
        
        
        
        
        
    </section>    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>