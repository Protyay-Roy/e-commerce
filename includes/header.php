<?php

include("functions/function.php");

$con = mysqli_connect("localhost", "root", "", "e_comm_database");

session_start();

?>
<?php   // details page start

if (isset($_GET["pro_id"])) {

    $pro_id = $_GET["pro_id"];

    $s = "SELECT * FROM `product` WHERE `p_id`='$pro_id'";

    $q = mysqli_query($con, $s) or die("Query Failed");

    if ($q) {

        $row_products = mysqli_fetch_array($q);

        $pro_id = $row_products['p_id'];

        $pro_title = $row_products['p_title'];

        $pro_price = $row_products['p_price'];

        $pro_img1 = $row_products['p_img1'];

        $pro_img2 = $row_products['p_img2'];

        $pro_img3 = $row_products['p_img3'];

        $pro_desc = $row_products['p_desc'];

        $pro_price = "$ " . $pro_price;
    }
} // details page end

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div id="top">
        <!-- Top Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-6 offer">
                <!-- col-md-6 offer Begin -->

                <a href="#" class="btn btn-success btn-sm">
                    
                    Welcome

                    <?php 
                    
                        if(isset($_SESSION["c_email"])){ echo $_SESSION["c_email"]; }else{ echo "Guest"; }
                    
                    ?>
                </a>
                <a href="checkout.php"><?php cartItem(); ?> Items In Your Cart | Total Price: <?php totalPrice(); ?> </a>

            </div><!-- col-md-6 offer Finish -->

            <div class="col-md-6">
                <!-- col-md-6 Begin -->

                <ul class="menu">
                    <!-- cmenu Begin -->

                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <?php 
                            
                            if (isset($_SESSION["c_email"])) {

                                echo "<a href='customer/my_account.php'>My Account</a>";

                            } else{                             

                                echo "<a href='checkout.php'>My Account</a>";

                            }
                        
                        ?>
                        <!-- <a href="checkout.php">My Account</a> -->
                    </li>
                    <li>
                        <a href="cart.php">Go To Cart</a>
                    </li>
                    <li>

                        <?php 
                            
                            if (isset($_SESSION["c_email"])) {

                                echo "<a href='customer/c_logout.php'>Log Out</a>";

                            } else{                             

                                echo "<a href='checkout.php'>LogIn</a>";

                            }
                        
                        ?>

                    </li>

                </ul><!-- menu Finish -->

            </div><!-- col-md-6 Finish -->

        </div><!-- container Finish -->

    </div><!-- Top Finish -->

    <div id="navbar" class="navbar navbar-default">
        <!-- navbar navbar-default Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="navbar-header">
                <!-- navbar-header Begin -->

                <a href="index.php" class="navbar-brand home">
                    <!-- navbar-brand home Begin -->

                    <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">

                </a><!-- navbar-brand home Finish -->

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>

            </div><!-- navbar-header Finish -->

            <div class="navbar-collapse collapse" id="navigation">
                <!-- navbar-collapse collapse Begin -->

                <div class="padding-nav">
                    <!-- padding-nav Begin -->

                    <ul class="nav navbar-nav left">
                        <!-- nav navbar-nav left Begin -->

                        <li class="<?php if($active=="home"){ echo "active"; } ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active=="shop"){ echo "active"; } ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if($active=="my_account"){ echo "active"; } ?>">
                            
                            <?php 
                            
                                if (isset($_SESSION["c_email"])) {

                                    echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

                                } else{                             

                                    echo "<a href='checkout.php'>My Account</a>";

                                }
                        
                            ?>
                            
                        </li>
                        <li class="<?php if($active=="cart"){ echo "active"; } ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=="contuct"){ echo "active"; } ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>

                    </ul><!-- nav navbar-nav left Finish -->

                </div><!-- padding-nav Finish -->

                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <!-- btn navbar-btn btn-primary Begin -->

                    <i class="fa fa-shopping-cart"></i>

                    <span> <?php cartItem(); ?> Items In Your Cart</span>

                </a><!-- btn navbar-btn btn-primary Finish -->

                <div class="navbar-collapse collapse right">
                    <!-- navbar-collapse collapse right Begin -->

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <!-- btn btn-primary navbar-btn Begin -->

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button><!-- btn btn-primary navbar-btn Finish -->

                </div><!-- navbar-collapse collapse right Finish -->

                <div class="collapse clearfix" id="search">
                    <!-- collapse clearfix Begin -->

                    <form method="get" action="results.php" class="navbar-form">
                        <!-- navbar-form Begin -->

                        <div class="input-group">
                            <!-- input-group Begin -->

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">
                                <!-- input-group-btn Begin -->

                                <button type="submit" name="search" value="Search" class="btn btn-primary">
                                    <!-- btn btn-primary Begin -->

                                    <i class="fa fa-search"></i>

                                </button><!-- btn btn-primary Finish -->

                            </span><!-- input-group-btn Finish -->

                        </div><!-- input-group Finish -->

                    </form><!-- navbar-form Finish -->

                </div><!-- collapse clearfix Finish -->

            </div><!-- navbar-collapse collapse Finish -->

        </div><!-- container Finish -->

    </div><!-- navbar navbar-default Finish -->