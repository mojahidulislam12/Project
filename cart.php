<?php include('include/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green grocery</title>
    <!-- Bootstrap link:https://getbootstrap.com/docs/5.1/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font awesom link:https://cdnjs.com/libraries/font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/shopping-trolley-full-of-food-fruit-products-grocery-goods-grocery-shopping-cart-buying-food-in-supermarket-illustration-for-banner-vector.jpg" class="logo " alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>

<!-- call cart -->
<?php
cart();
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav ne-auto">
    <li class="nav-item">
      <a class="nav-link" href="">Welcome Guest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./users_area/user_login.php">Login</a>
    </li>
  </ul>
</nav>


<!-- <div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">A greengrocer is a retail trader in fruit and vegetables;</p>
</div> -->
<div class="container p-4">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            
            
           

            <?php 
             
             $get_ip_address = getIPAddress(); 
             $total_price=0;
             $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
             $result=mysqli_query($con,$cart_query);
             $result_count=mysqli_num_rows($result);
             if($result_count>0){
              echo "<thead>
              <tr>
                  <th>Product title</th>
                  <th>Product image</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Remove</th>
                  <th colspan='2'>Operations</th>
              </tr>
          </thead>";             
          
             while($row=mysqli_fetch_array($result)){
               $product_id=$row['product_id'];
               $slect_products="Select * from `products5` where product_id= '$product_id'";
               $resul_products=mysqli_query($con,$slect_products);
               while($row_product_price=mysqli_fetch_array($resul_products)){
                 $product_price=array($row_product_price['product_price']);
                 $price_table=$row_product_price['product_price'];
                 $product_title=$row_product_price['product_title'];
                 $product_image1=$row_product_price['product_image1'];
                 $product_values=array_sum($product_price);
                 $total_price+=$product_values;
                
                 

            ?>
            
             
          <tbody>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./images/<?php echo $product_image1 ?> " alt="" class="cart_image"></td>
                    <td><input type="text" name="quantity" class="form-input w-60"></td>
                    <?php 
                    $get_ip_address = getIPAddress(); 
                    if(isset($_POST['update'])){
                      $quantity=$_POST['quantity'];
                      $update="update `cart_details` set quantity= $quantity where ip_address='$get_ip_address'";
                      $products_quantity=mysqli_query($con,$update);
                      $total_price=$total_price*$quantity;
                    }
                    ?>
                    <td><?php echo $price_table ?>tk</td>
                    <td><input type="checkbox" name="remove_item[]" value="<?php echo  $product_id; ?>" ></td>
                    <td>
                        <!-- <button ">Update</button> -->
                        <input type="submit" name="update" id="" value="Update" class="bg-success px-3 text-white py-2 border-0">
                        <input type="submit" name="remove" id="" value="Remove" class="bg-danger px-3 text-white py-2 border-0">
                        
                        
                    </td>
                </tr>

                <?php } }}
                else{
                  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
             
                ?>
            </tbody>
        </table>
        <div class="d-flex mb-5">
          <?php
          $get_ip_address = getIPAddress(); 
         
          $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo " <h5 class='px-3'>SubTotal : <strong class='text-success'><u> $total_price tk</u></strong></h5>
            <input type='submit' value='Shopping' name='continue_shopping' class='bg-success text-white mx-3  px-3 py-2 border-0'>
            <button class='bg-danger p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
          }else{
            echo " <input type='submit' value='Shopping' name='continue_shopping' class='bg-success text-white mx-3  px-3 py-2 border-0'>";
          }
          if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
           ?>
           
        </div>
       
    </div>
</div>
</form>

<?php
function remove(){
  global $con;
  if(isset($_POST['remove'])){
    foreach($_POST['remove_item'] as $remove_id){
      echo  $remove_id;
      $delet_query="Delete  from `cart_details` where product_id= $remove_id";
      $run_delete=mysqli_query($con, $delet_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
  }
}
}

echo $remove_item=remove();

?>


<?php
//include("./include/footer.php")
?>
</div> 

    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>