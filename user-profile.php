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
        <div class="d-flex cont flex-row">
            <div class="bd col-lg-2 d-none d-sm-block">
                <div class="lists">
                    <div class="mt-5 heading d-flex justify-content-center ">
                        <h1 class="fs-3 fw-bold">User Profile</h1>
                    </div>
                    <div class="list-items">
                        <div class="mt-5 chng-paswrd d-flex flex-row justify-content-center align-items-center" style='border-right:3px solid #fa6e14; border-radius:1px;'>
                            <i class="fa fa-user me-2" aria-hidden="true"></i>
                            <a href="#"><p class='cp fs-5'>User info</p></a> 
                        </div>
                        <div class=" mb-0 mt-0 chng-paswrd d-flex flex-row justify-content-center align-items-center">
                            <i class="fa fa-unlock-alt me-2" aria-hidden="true"></i>
                            <a href="change-pass.php"><p class='cp fs-5'>Change Password</p></a>
                        </div>
                        <div class=" mt-0 my-posts text-center d-flex flex-row justify-content-center align-items-center">
                        <i class="fa fa-id-badge me-2" aria-hidden="true"></i>
                            <p class='cp fs-5'>My Posts</p>
                        </div>
                    </div>
                </div>
            
            </div>
            
            <div class="nbd bd col-lg-10 col-12">
                <form action="upload.php" method='POST' enctype="multipart/form-data">
                    <input type="file" style='display:none'  id='file' name="uploadfile" value="" />
                    <div class="profile-pic pui col-lg-12 d-flex flex-row justify-content-between align-items-center">
                        <div class='col-lg-4 col-6'>
                        <label for="file" class='fp fa-2x rounded'>
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            </label>                            
                            <img src=<?php echo $result['profile_path']?> alt="" id="prof-img" class="prof-img">
                        </div>
                            
                            <div class="col-lg-8 col-6">
                                <button type='submit' name='upload' class='cbp'>Upload Image </button>
                            </div>
                    </div>
                </form>
                
                <form action="submit-profile.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="mt-5 pud col-lg-12">
       
                        <div class='col-lg-10'>
                            <div class="left col-lg-12">
                               
                                    <div class="row mt-5">
                                        <div class="col col-lg-4">
                                            <label for="" class='m-1 custom-p'>First Name </label>
                                            <input type="text" class="form-control  ci" name='fname' value='<?php echo $result['fname'] ?>' aria-label="First name">
                                        </div>
                                        <div class="col col-lg-4">
                                        <label for="" class='m-1 custom-p'>Last Name </label>
                                            <input type="text" class="form-control  ci" name='lname' value='<?php echo $result['lname'] ?>' aria-label="Last name">
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col col-lg-4">
                                        <label for="" class='m-1 custom-p'>Email</label>
                                            <input type="email" class="form-control  ci" name='email' value='<?php echo $result['email'] ?>' aria-label="First name">
                                        </div>
                                        <div class="col col-lg-4">
                                        <label for="" class='m-1 custom-p'>Phone</label>
                                            <input type="text" class="form-control  ci" name='ph' value='<?php echo $result['ph'] ?>' aria-label="Last name">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-12 mt-5 d-flex flex-row justify-content-center">
                    
                                        <button type='submit' class='cb'>Save Changes </button>
                                    </div>
                </form>
                            </div>

                            
                            
                        </div>
                        
                        
                    </div>  
            </div>
        </div>
        
        
        
        
        
    </section>    







    <script>
        document.getElementById("myBtn").addEventListener("click", function() {
        document.getElementById("demo").innerHTML = "Hello World";
        });
        
        // var elem = document.getElementById('prof-img');
        // var elem2 = document.getElementById('change-prof');
        // elem.onmouseover=function(){hoverIn();};
        // elem2.onmouseover=function(){hoverIn();};
        // function hoverIn(){
        //     document.getElementById('change-prof').classList.add('show')
        // }
        // elem.onmouseout=function(){hoverOut();};
        // function hoverOut(){
        //     document.getElementById('change-prof').classList.remove('show')
        // }
        // // elem.onclick=()=>{handleClick()}
        // const handleClick=()=>{
        //     $(document).ready(function(){
        //         $.ajax({
        //         type:'post',
                
        //         data: {upload:'upload'},
        //         dataType:'json',
        //         success: function(result)
        //         {
        //             alert('complete')
        //         }
        //     });
        //     });
            
        // }
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>