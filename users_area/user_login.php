<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap link:https://getbootstrap.com/docs/5.1/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font awesom link:https://cdnjs.com/libraries/font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-1">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_username" class="form-label">Username</label>
                     <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your name..." autocomplete="off" required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_password" class="form-label">Password</label>
                     <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password..." required = "required">
                </div>
               
                
                <div class="form-outlin mb-3 w-50 m-auto">
                <input type="submit" name="user_login" class="btn btn-success" value="Login">
                <p class="small fw-bold mt-1 pt-1 mb-0">Don't have an account?<a href="user_registration.php" class="text-danger">Register</a></p>
            </div>


                    

                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php
$con=mysqli_connect('localhost','root','','groceary') ;

if(isset($_POST['user_login'])){
   $user_username=$_POST['user_username'] ;
   $user_password=$_POST['user_password'] ;
   
   $select_query="Select * from `user_table` where username='$user_username'";
   $result=mysqli_query($con,$select_query);
   $row_count=mysqli_num_rows($result);
   $row_data=mysqli_fetch_assoc($result);
   if($row_count>0){
        if(password_verify($user_password,$row_data['user_password'])){
            echo "<script>alert('Successful')</script>";
        }else{
            echo "<script>alert('Invalid')</script>"; 
        }
   }else{
    echo "<script>alert('Invalid')</script>";
   }

}
?>