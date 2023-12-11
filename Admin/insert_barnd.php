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
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
  include('../include/connect.php'); 
  if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_t'];

    $select_query="Select * from  `brand` where brand_title	='$brand_title' ";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert(' Already Present inside the database')</script>";
    }
    else{
      $insert_query="insert into `brand` (brand_title) values('$brand_title')";
      $result=mysqli_query($con, $insert_query);
      if( $result){
        echo "<script>alert('Insert successfully')</script>";
      }
    }


    
  }
  ?>
    <h3 class="text-center">Brands</h3>
    <form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
      <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
      <input type="text" class="form-control" name="brand_t" placeholder="Insert barnd..." aria-label="barnd" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
      
      <input type="submit" class=" bg-info border-0 my-3 p-2" name="insert_brand" value="Insert Barnd"  >
    </div>
    
    </form>
    <!-- Bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>