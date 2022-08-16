<?php
    $con = mysqli_connect("localhost","root","","e_comm_database");

    if($con){

    } else {
        echo "Your database connection is not successful";
    }

// user ip
function getRealUserIp(){

    switch(true){

      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

      default : return $_SERVER['REMOTE_ADDR'];
    }
 }

 // cartItem start
function totalPrice(){

    global $con;

    $ip = getRealUserIp();
           
    $sql = "SELECT * FROM `cart` WHERE `ip_add` = '$ip'";

    $que = mysqli_query($con,$sql) or die('Query Failed 1');

    $total = 0;

    while($row = mysqli_fetch_array($que)){

        $p_id = $row ["p_id"];

        $p_qty = $row ["qty"];

        $s = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";

        $q = mysqli_query($con,$s) or die('Query Failed 2');

        while($r = mysqli_fetch_array($q)){

            $sub_total = $r["p_price"]*$p_qty ;

            $total += $sub_total;
        }

    }

    echo "$ ".$total;

}
// cartItem end

// cartItem start
function cartItem(){

    global $con;

    $ip = getRealUserIp();
           
    $sql = "SELECT * FROM `cart` WHERE `ip_add` = '$ip'";

    $que = mysqli_query($con,$sql) or die('Query Failed');

    $row = mysqli_num_rows($que);

    echo $row;

}
// cartItem end

// addCart start
function addCart(){

    global $con;

    if(isset($_GET["addCart"])){
        
        $ip = getRealUserIp();

        $p_id = $_GET["addCart"];

        $product_qty = $_POST["product_qty"];

        $product_size = $_POST["product_size"];

        $sql = "SELECT * FROM `cart` WHERE `ip_add` = '$ip' && `p_id`= '$p_id'";

        $que = mysqli_query($con,$sql) or die('Query Failed 1');

        if(mysqli_num_rows($que) > 0){

            echo "<script>alert('This Product Already Added')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

            // echo "<script>alert('This product has already added in cart')</script>";
            // echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }else {

            $s = "INSERT INTO `cart`(`ip_add`, `p_id`, `qty`, `size`) VALUES ('$ip','$p_id','$product_qty','$product_size')";

            $q = mysqli_query($con,$s) or die('Query Failed 2');

            // echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";


        }

    }

}
// cart end

// slider start
function slider(){

    global $con;

    $s = "SELECT * FROM `slider` limit 0,1";

    $q = mysqli_query($con,$s);

    while($r=mysqli_fetch_array($q)){

        $slider_img = $r["slide_img"];

        echo "

            <div class='item active'>
                        
                <img src='admin_area/slides_images/$slider_img' alt='$slider_img'>
                        
            </div>
        
        ";

    }

    $s = "SELECT * FROM `slider` limit 1,3";

    $q = mysqli_query($con,$s);

    while($r=mysqli_fetch_array($q)){

        $slider_img = $r["slide_img"];

        echo "

            <div class='item'>
                        
                <img src='admin_area/slides_images/$slider_img' alt='$slider_img'>
                        
            </div>
        
        ";

    }

}
// slider end

// product start
    function get_pro(){
        
        global $con;

        $s = "SELECT * FROM `product` ORDER BY RAND()";

        $q = mysqli_query($con,$s) or die ("Query Failed");

        while($row_products=mysqli_fetch_array($q)){
        
            $pro_id = $row_products['p_id'];
            
            $pro_title = $row_products['p_title'];
            
            $pro_price = $row_products['p_price'];
            
            $pro_price = "$ " . $pro_price;
            
            $pro_img1 = $row_products['p_img1'];
            
            echo "
                
                <div class='col-md-4 col-sm-6 center-responsive'>

                    <div class='product'>

                        <a href='details.php?pro_id=$pro_id'>

                            <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='$pro_img1'>
        
                        </a>
    
                        <div class='text'>
            
                            <h3>
                                <a href='details.php?pro_id=$pro_id'>
                                    $pro_title 
                                </a>
                            </h3>
            
                            <p class='price'>$pro_price</p>
            
                            <p class='button'>
            
                                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
            
                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
            
                                    <i class='fa fa-shopping-cart'>
                                        Add To Cart
                                    </i>
            
                                </a>
            
                            </p>
            
                        </div>

                    </div>

                </div>
            
            ";
            
        }
    }
// product end
?>