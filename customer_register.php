<?php 

    $active='Account';

    include("includes/header.php");

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-8 col-xs-offset-2"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Register a new account </h2>
                           
                       </center><!-- center Finish -->
                       
                       <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Name</label>
                               
                               <input type="text" class="form-control" name="c_name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Email</label>
                               
                               <input type="text" class="form-control" name="c_email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Password</label>
                               
                               <input type="password" class="form-control" name="c_pass" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Country</label>
                               
                               <input type="text" class="form-control" name="c_country" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your City</label>
                               
                               <input type="text" class="form-control" name="c_city" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Contact</label>
                               
                               <input type="text" class="form-control" name="c_contact" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Address</label>
                               
                               <input type="text" class="form-control" name="c_address" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Profile Picture</label>
                               
                               <input type="file" class="form-control form-height-custom" name="c_image" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Register
                               
                               </button>
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>


<?php 
    if(isset($_POST["register"])){

        $c_ip = getRealUserIp();

        $c_name = ucwords($_POST["c_name"]);

        $c_email = $_POST["c_email"];

        $c_pass = $_POST["c_pass"];

        $c_country = ucfirst($_POST["c_country"]);

        $c_city = ucfirst($_POST["c_city"]);

        $c_ph = $_POST["c_contact"];

        $c_add = ucwords($_POST["c_address"]);

        $c_img = $_FILES["c_image"]["name"];

        $c_image_tmp = $_FILES["c_image"]["tmp_name"];

        $s = "INSERT INTO `customer`(`c_name`, `c_email`, `c_pass`, `c_country`, `c_city`, `c_ph`, `c_add`, `c_img`, `c_ip`) VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_ph','$c_add','$c_img','$c_ip')";

        $q = mysqli_query($con,$s) or die('Query Failed 1');

        if($q){

            move_uploaded_file($c_image_tmp,"customer/images/$c_img");

            $_SESSION["c_email"] = $c_email;

            $s = "SELECT * FROM `cart` WHERE ip_add = '$c_ip'";

            $q = $con->query($s) or die('Query Failed 2');

            if($q->num_rows > 0){

                echo "<script>alert('You have been Registered Sucessfully')</script>";

                echo "<script>window.open('checkout.php','_self')</script>";
            }else{

                echo "<script>alert('You have been Registered Sucessfully')</script>";

                echo "<script>window.open('index.php','_self')</script>";
            }

        }
    }
    
?>
