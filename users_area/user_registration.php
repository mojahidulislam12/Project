<?php
include('../include/connect.php');
include('../functions/common_function.php');






?>

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
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_username" class="form-label">Username</label>
                     <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your name..." autocomplete="off" required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_email" class="form-label">Email</label>
                     <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email..." required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_image" class="form-label">User Image</label>
                     <input type="file" name="user_image" id="user_image" class="form-control" required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_password" class="form-label">Password</label>
                     <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password..." required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="conf_user_password" class="form-label">Password</label>
                     <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password..." required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_address" class="form-label">Address</label>
                     <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address..." required = "required">
                </div>
                <div class="form-outline mb-1 w-50 m-auto">
                     <label for="user_contact" class="form-label">Contact Number</label>
                     <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your contact number..." required = "required">

                </div>
                <div class="form-outlin mb-3 w-50 m-auto">
                <input type="submit" name="user_register" class="btn btn-success" value="Register">
                <p class="small fw-bold mt-1 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text-danger">    Login</a></p>
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
if(isset($_POST['user_register'])){
    $user_name=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    $select_query="Select * from `user_table` where username='$user_name' or user_email='$user_email'";
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('User name and email already exist')</script>";
    }else{

       
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)VALUES(' $user_name','$user_email','$user_password',' $user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con, $insert_query);
    
    }

    $slect_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con, $slect_cart_items);
    $rows_count=mysqli_num_rows( $result_cart);
    if( $rows_count>0){
        $_SESSION['username']=$user_name;
        echo "<script>alert('You have items in your cart')</script>"; 
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }

}



?>