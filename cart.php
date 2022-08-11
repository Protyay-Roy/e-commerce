<?php

    $active = "cart";

    include("includes/header.php");

?>
<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Cart
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div id="cart" class="col-md-9">
            <!-- col-md-9 Begin -->

            <div class="box">
                <!-- box Begin -->

                <form action="" method="post" enctype="multipart/form-data">
                    <!-- form Begin -->

                    <h1>Shopping Cart</h1>
                    <p class="text-muted">You currently have <?php cartItem(); ?> item(s) in your cart</p>

                    <div class="table-responsive">
                        <!-- table-responsive Begin -->

                        <table class="table">
                            <!-- table Begin -->
                            <!-- if no item in cart start -->
                            <?php 
                            
                                $ip = getRealUserIp();
                
                                $sql = "SELECT * FROM `cart` WHERE `ip_add` = '$ip'";
                            
                                $que = mysqli_query($con,$sql) or die('Query Failed 1');
                                
                                if(mysqli_num_rows($que) == 0){

                                    echo "<h3 class='text-center '>&#128549; Oops! No item in your cart</h3>";

                                } else {
                            ?>

                            <thead>
                                <!-- thead Begin -->

                                <tr>
                                    <!-- tr Begin -->

                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="2">Sub-Total</th>

                                </tr><!-- tr Finish -->

                            </thead><!-- thead Finish -->

                            <tbody>
                                <!-- tbody Begin -->
                                <!-- item in cart start -->
                                <?php
                                
                                    $total = 0;

                                    while($row = mysqli_fetch_array($que)){
                            
                                        $p_id = $row ["p_id"];
                                    
                                        $p_qty = $row ["qty"];
                                    
                                        $p_size = $row ["size"];
                                    
                                        $s = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";
                                    
                                        $q = mysqli_query($con,$s) or die('Query Failed 2');
                                    
                                        while($r = mysqli_fetch_array($q)){
        
                                            $p_img1 = $r["p_img1"];
        
                                            $p_title = $r["p_title"];
        
                                            $p_price = $r["p_price"];
                                    
                                            $sub_total = $r["p_price"]*$p_qty ;
                                    
                                            $total += $sub_total;
                                            
                                        
                                ?>

                                <tr>
                                    <!-- tr Begin -->

                                    <td>

                                        <img class="img-responsive" src="admin_area/product_images/<?= $p_img1; ?>" alt="Product 3a">

                                    </td>

                                    <td><a href="#"><?= $p_title; ?></a></td>

                                    <td><?= $p_qty; ?></td>

                                    <td><?= "$ ".$p_price; ?></td>

                                    <td><?= $p_size; ?></td>

                                    <td><input type="checkbox" name="remove[]" value="<?=$p_id?>"></td>

                                    <td><?= "$ ".$sub_total; ?></td>

                                </tr><!-- tr Finish -->
                                
                                <?php } } ?><!-- item in cart end -->

                            </tbody><!-- tbody Finish -->

                            <tfoot>
                                <!-- tfoot Begin -->

                                <tr>
                                    <!-- tr Begin -->

                                    <th colspan="5">Total</th>
                                    <th colspan="2"><?= "$ ".$total; ?></th>

                                </tr><!-- tr Finish -->

                            </tfoot><!-- tfoot Finish -->
                            
                            <?php } ?><!-- if no item in cart end -->

                        </table><!-- table Finish -->

                    </div><!-- table-responsive Finish -->

                    <div class="box-footer">
                        <!-- box-footer Begin -->

                        <div class="pull-left">
                            <!-- pull-left Begin -->

                            <a href="index.php" class="btn btn-default">
                                <!-- btn btn-default Begin -->

                                <i class="fa fa-chevron-left"></i> Continue Shopping

                            </a><!-- btn btn-default Finish -->

                        </div><!-- pull-left Finish -->

                        <div class="pull-right">
                            <!-- pull-right Begin -->

                            <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                <!-- btn btn-default Begin -->

                                <i class="fa fa-refresh"></i> Update Cart

                            </button><!-- btn btn-default Finish -->

                            <a href="checkout.php" class="btn btn-primary">

                                Proceed Checkout <i class="fa fa-chevron-right"></i>

                            </a>

                        </div><!-- pull-right Finish -->

                    </div><!-- box-footer Finish -->

                </form><!-- form Finish -->

            </div><!-- box Finish -->

            <?php
            
                if(isset($_POST["update"])){

                    foreach($_POST["remove"] as $remove_id){

                        $s = "DELETE FROM `cart` WHERE `p_id`='$remove_id'";

                        $q = mysqli_query($con,$s);

                        if(mysqli_query($con,$s) or die("Query Failed")){

                            echo "<script>window.open('cart.php', '_self')</script>";
                        }
                    }
                }                        
            
            ?>

            <div id="row same-heigh-row">
                    <!-- #row same-heigh-row Begin -->
                    <div class="col-md-3 col-sm-6">
                        <!-- col-md-3 col-sm-6 Begin -->
                        <div class="box same-height headline">
                            <!-- box same-height headline Begin -->
                            <h3 class="text-center">Products You Maybe Like</h3>
                        </div><!-- box same-height headline Finish -->
                    </div><!-- col-md-3 col-sm-6 Finish -->

                    <?php
                    
                        $s = "SELECT * FROM `product` ORDER BY RAND() LIMIT 0,3";

                        $q = mysqli_query($con,$s) or die ("Query Failed");
                
                        while($row_products=mysqli_fetch_array($q)){
        
                            $pro_id = $row_products['p_id'];
                            
                            $pro_title = $row_products['p_title'];
                            
                            $pro_price = $row_products['p_price'];
                            
                            $pro_price = "$ " . $pro_price;
                            
                            $pro_img1 = $row_products['p_img1'];

                    ?>

                    <div class="col-md-3 col-sm-6 center-responsive">
                        <!-- col-md-3 col-sm-6 center-responsive Begin -->
                        <div class="product same-height">
                            <!-- product same-height Begin -->
                            <a href="details.php?pro_id=<?=$pro_id;?>">
                                <img class="img-responsive" src="admin_area/product_images/<?=$pro_img1;?>" alt="<?=$pro_img1;?>">
                            </a>

                            <div class="text">
                                <!-- text Begin -->
                                <h3><a href="details.php?pro_id=<?=$pro_id;?>"><?=$pro_title;?></a></h3>

                                <p class="price"><?=$pro_price;?></p>

                            </div><!-- text Finish -->

                        </div><!-- product same-height Finish -->
                    </div><!-- col-md-3 col-sm-6 center-responsive Finish -->

                    <?php } ?>

                </div><!-- #row same-heigh-row Finish -->

        </div><!-- col-md-9 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <div id="order-summary" class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <h3>Order Summary</h3>

                </div><!-- box-header Finish -->

                <p class="text-muted">
                    <!-- text-muted Begin -->

                    Shipping and additional costs are calculated based on value you have entered

                </p><!-- text-muted Finish -->

                <div class="table-responsive">
                    <!-- table-responsive Begin -->

                    <table class="table">
                        <!-- table Begin -->

                        <tbody>
                            <!-- tbody Begin -->

                            <tr>
                                <!-- tr Begin -->

                                <td> Order Sub-Total </td>
                                <th><?= "$ ".$total; ?></th>

                            </tr><!-- tr Finish -->

                            <tr>
                                <!-- tr Begin -->

                                <td> Shipping and Handling </td>
                                <td> $0 </td>

                            </tr><!-- tr Finish -->

                            <tr>
                                <!-- tr Begin -->

                                <td> Tax </td>
                                <th> $0 </th>

                            </tr><!-- tr Finish -->

                            <tr class="total">
                                <!-- tr Begin -->

                                <td> Total </td>
                                <th  colspan="5"><?= "$ ".$total; ?></th>

                            </tr><!-- tr Finish -->

                        </tbody><!-- tbody Finish -->

                    </table><!-- table Finish -->

                </div><!-- table-responsive Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-3 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


</body>

</html>