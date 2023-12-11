<?php
//include('./include/connect.php');
function getproducs(){
    global $con;
    $select_query="Select * from `products5` order by rand() LIMIT 0,6";
     $result_query=mysqli_query($con,$select_query);
     while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $cat_id=$row['cat_id'];
      $brand_id=$row['brand_id'];

      echo "<div class='col-md-4 mb-3'>
      <div class='card'>
       <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price: $product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
    </div>
  </div>
  </div>";

     }
}

function get_all_products(){



global $con;
  
      
    $select_query="Select * from `products5` order by rand()";
     $result_query=mysqli_query($con,$select_query);
     while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $cat_id=$row['cat_id'];
      $brand_id=$row['brand_id'];

      echo "<div class='col-md-4 mb-3'>
      <div class='card'>
       <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to cart</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View more</a>
    </div>
  </div>
  </div>";

     }
    }



function getbrand(){
    global $con;
    $select_brand = "Select * from `brand`" ;
      $result_brand= mysqli_query($con,$select_brand);
      //$row_data=mysqli_fetch_assoc( $result_brand);
      //echo $row_data['brand_title'];
      while( $row_data=mysqli_fetch_assoc( $result_brand)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo "<li class='anv-item '>
        <a href='index.php?brand=$brand_id' class='nav-link text-light text-center'>$brand_title</a>
      </li>";
      }
}

function getcategory(){
    global $con;
    $select_Categories = "Select * from `categorys`" ;
    $result_Categories= mysqli_query($con,$select_Categories);
    //$row_data=mysqli_fetch_assoc( $result_brand);
    //echo $row_data['brand_title'];
    while( $row_data=mysqli_fetch_assoc( $result_Categories)){
      $Categories_title=$row_data['cat_title'];
      $Categories_id=$row_data['cat_id'];
      echo "<li class='anv-item '>
      <a href='index.php?cat=$Categories_id' class='nav-link text-light text-center'>$Categories_title</a>
    </li>";
    }
}
 

function view_details(){
  global $con;
  
     if(isset($_GET['product_id'])) {
      $product_id=$_GET['product_id'];
    $select_query="Select * from `products5` where product_id=$product_id";
     $result_query=mysqli_query($con,$select_query);
     while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_image2=$row['product_image2'];
      $product_image3=$row['product_image3'];
      $product_price=$row['product_price'];
      $cat_id=$row['cat_id'];
      $brand_id=$row['brand_id'];

      echo "<div class='col-md-4 mb-3'>
      <div class='card'>
       <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>Price:$product_price/-</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Add to cart</a>
      <a href='index.php' class='btn btn-primary bg-secondary'>Go Home</a>
    </div>
  </div>
  </div>
  <div class='col-md-8'>
             <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info md-5'>Related products</h4>
                </div>
                <div class='col-md-6'>
                <img src='./Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                <img src='./Admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
             </div>
        </div>";

     }
}
}
  //ip function

  function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'  and product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item is already present inside cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values($get_product_id,'$get_ip_address',0)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is add to  cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

// get cart
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress(); 
   
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    
    }else{
      global $con;
    $get_ip_address = getIPAddress(); 
   
    $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }
    echo  $count_cart_items;
  }

  // price

  function total_price(){
    global $con;
    $get_ip_address = getIPAddress(); 
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $slect_products="Select * from `products5` where product_id= '$product_id'";
      $resul_products=mysqli_query($con,$slect_products);
      while($row_product_price=mysqli_fetch_array($resul_products)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;

      }
    }
    echo $total_price;

  }
  

?>
