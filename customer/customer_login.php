<?php include "header.php" ?>

<div class="container">

    <div class="col-xs-8 col-xs-offset-2">

        <div class="box">
            <!-- box Begin -->

            <div class="box-header">
                <!-- box-header Begin -->

                <center>
                    <!-- center Begin -->

                    <h1> Login </h1>

                    <p class="lead"> Already have our account..? </p>

                    <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>

                </center><!-- center Finish -->

            </div><!-- box-header Finish -->

            <form method="post" action="">
                <!-- form Begin -->

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Email </label>

                    <input name="c_email" type="text" class="form-control" required>

                </div><!-- form-group Finish -->

                <div class="form-group">
                    <!-- form-group Begin -->

                    <label> Password </label>

                    <input name="c_pass" type="password" class="form-control" required>

                </div><!-- form-group Finish -->

                <div class="text-center">
                    <!-- text-center Begin -->

                    <button name="login" value="Login" class="btn btn-primary">

                        <i class="fa fa-sign-in"></i> Login

                    </button>

                </div><!-- text-center Finish -->

            </form><!-- form Finish -->

            <center>
                <!-- center Begin -->

                <a href="../customer_register.php">

                    <h3> Dont have account..? Register here </h3>

                </a>

            </center><!-- center Finish -->

        </div><!-- box Finish -->

    </div>

</div>

<?php include "footer.php" ?>


<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


</body>

</html>

<?php

if (isset($_POST["login"])) {

    $c_email = $_POST["c_email"];

    $c_pass = $_POST["c_pass"];

    $s = "SELECT * FROM `customer` WHERE `c_email`='$c_email' && `c_pass`='$c_pass'";

    $q = mysqli_query($con, $s) or die("Query Failed 1");

    $check_email = mysqli_num_rows($q);

    if ($check_email == 1) {

        $email_session = mysqli_fetch_array($q);

        $_SESSION["c_email"] = $email_session["c_email"];

        $c_ip = getRealUserIp();

        $s = "SELECT * FROM `cart` WHERE `ip_add`= '$c_ip'";

        $q = mysqli_query($con,$s) or die("Query Failed 2");

        if (mysqli_num_rows($q) !== 0){

            echo "<script>alert('You are Logged in')</script>"; 

            echo "<script>window.open('../checkout.php','_self')</script>";

        } else{

            echo "<script>alert('You are Logged in')</script>"; 

            echo "<script>window.open('../shop.php','_self')</script>";            
        }

    } else{

        echo "<script>alert('Your email or password is wrong')</script>";

        exit();

    }
}
// if(isset($_POST['login'])){

//     $customer_email = $_POST['c_email'];

//     $customer_pass = $_POST['c_pass'];

//     $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

//     $run_customer = mysqli_query($con,$select_customer);

//     $get_ip = getRealIpUser();

//     $check_customer = mysqli_num_rows($run_customer);

//     $select_cart = "select * from cart where ip_add='$get_ip'";

//     $run_cart = mysqli_query($con,$select_cart);

//     $check_cart = mysqli_num_rows($run_cart);

//     if($check_customer==0){

//         echo "<script>alert('Your email or password is wrong')</script>";

//         exit();

//     }

//     if($check_customer==1 AND $check_cart==0){

//         $_SESSION['customer_email']=$customer_email;

//        echo "<script>alert('You are Logged in')</script>"; 

//        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

//     }else{

//         $_SESSION['customer_email']=$customer_email;

//        echo "<script>alert('You are Logged in')</script>"; 

//        echo "<script>window.open('checkout.php','_self')</script>";

//     }

// }

?>