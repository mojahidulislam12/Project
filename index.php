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
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_price();?>tk</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get" >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
       
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
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


<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
  <p class="text-center">A greengrocer is a retail trader in fruit and vegetables;</p>
</div>

<div class="row px-4">


  <div class="col-md-10">
    <!-- Products -->
    <div class="row">
    
    <?php
    getproducs();
    //$ip = getIPAddress();  
     //echo 'User Real IP Address - '.$ip;  
     ?>
    

</div>
</div>
  <div class="col-md-2 bg-success p-0">
    <ul class="navbar-nav me-auto">
      <li class="anv-item bg-">
        <a href="#" class="nav-link text-light text-center bg-info"><h4>Delivery Brand</h4></a>
      </li>


      <?php
         getbrand();
       ?>


      
      

    </ul>
    <ul class="navbar-nav me-auto">
      <li class="anv-item bg-info">
        <a href="#" class="nav-link text-light text-center"><h4>Categories</h4></a>
    </li>
    
    <?php
       getcategory();
       ?>

    </ul>
</div>


<?php
include("./include/footer.php")
?>
</div> 

    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>