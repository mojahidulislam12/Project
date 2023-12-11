<?php
include('../include/connect.php');

if(isset($_POST['insert_product'])){
   $product_title=$_POST['product_title'];
   $description=$_POST['description'];
   $product_keywords=$_POST['product_keywords'];
   $product_category=$_POST['product_category'];
   $product_brands=$_POST['product_brands'];
   $product_price=$_POST['product_price'];
   


   $product_image1=$_FILES['product_image1']['name'];
   $product_image2=$_FILES['product_image2']['name'];
   $product_image3=$_FILES['product_image3']['name'];

   $temp_image1=$_FILES['product_image1']['tmp_name'];
   $temp_image2=$_FILES['product_image2']['tmp_name'];
   $temp_image3=$_FILES['product_image3']['tmp_name'];

   
   $file1="product_images/".$product_image1;
   $file2="product_images/".$product_image2;
   $file3="product_images/".$product_image3;

   move_uploaded_file($temp_image1,$file1);
   move_uploaded_file($temp_image2,$file2);
   move_uploaded_file($temp_image3,$file3);

   $query="INSERT INTO products5 (product_title,product_description,product_keywords,cat_id,brand_id,product_image1,product_image2,product_image3,product_price	
   ) VALUES('$product_title',' $description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price')";
   $data=mysqli_query($con,$query);
   if($data){
    echo "<script>alert('Successfully')</script>";
   }else{
    echo "<script>alert('Failed')</script>";
   }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Admin</title>
    <!-- Bootstrap link:https://getbootstrap.com/docs/5.1/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font awesom link:https://cdnjs.com/libraries/font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-2">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title:</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title..." autocomplete="off" required = "required">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="description" class="form-label">Product Description:</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description..." autocomplete="" required = "required">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keyord:</label>
                <input type="text" name="product_keywords" id="product_kewyords" class="form-control" placeholder="Enter product keyord..." autocomplete="off" required = "required">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "Select * from `categorys`";
                    $result_query = mysqli_query($con,$select_query) ;
                    while($row = mysqli_fetch_assoc($result_query)){
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<option value=''>$cat_title </option>";
                    }
 
                    ?>
                    <!-- <option value="">Category1</option>
                    <option value="">Category2</option>
                    <option value="">Category3</option> -->
                </select>

            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a brand</option>
                    <?php
                    $select_query = "Select * from `brand`";
                    $result_query = mysqli_query($con,$select_query) ;
                    while($row = mysqli_fetch_assoc($result_query)){
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id '];
                        echo "<option value=''>$brand_title </option>";
                    }
                    ?>
                    <!-- <option value="">brand1</option>
                    <option value="">brand2</option>
                    <option value="">brand3</option> -->
                </select>

            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1:</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  required = "required">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2:</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"  required = "required">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3:</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"  required = "required">
            </div>
            <div class="form-outline mb-3 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price:</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter price..." autocomplete="off" required = "required">
            </div>
            <div class="form-outlin mb-3 w-50 m-auto">
                <input type="submit" name="insert_product" id="insert_product" class="btn btn-success" value="Insert Product">
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>