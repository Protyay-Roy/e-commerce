<?php

    include("header.php");
    
    if ( !isset($_SESSION["c_email"]) ) {
        
        echo "<script>window.open('customer_login.php', '_self')</script>";

    } else {

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
                    My Account
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->
            
            <?php include ("account_sidebar.php") ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <!-- col-md-12 Begin -->

            <div class="box">
                <!-- box Begin -->

                <h1 align="center"> Please confirm your payment</h1>

                <?php
                
                    if ( isset($_GET["order_id"]) ){

                        $order_id = $_GET["order_id"];
                        $sql = "SELECT * FROM `customer_orders` WHERE `order_id` = '$order_id'";
                        if ( $query = $con->query($sql) ) {
                            
                            $res = mysqli_fetch_assoc($query);
                            
                        }
                    }
                    
                ?>

                <form action="confirm.php" method="post" enctype="multipart/form-data">
                    <!-- form Begin -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <input type="hidden" class="form-control" name="order_id" value=" <?= $res["order_id"]?>" >

                        <label> Invoice No: </label>

                        <input type="text" class="form-control" name="invoice_no" value=" <?= $res["invoice_no"]?>" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label> Amount Sent: </label>

                        <input type="text" class="form-control" name="amount_sent" value="<?= $res["due_amount"]?>" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label> Select Payment Mode: </label>

                        <select name="payment_mode" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')">
                            <!-- form-control Begin -->

                            <option disabled selected> Select Payment Mode </option>
                            <option> Back Code </option>
                            <option> UBL / Omni Paisa </option>
                            <option> Easy Paisa </option>
                            <option> Western Union </option>

                        </select><!-- form-control Finish -->
                        <span><?php if (isset($err)) { echo $err; } ?></span>
                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label> Transaction / Reference ID: </label>

                        <input type="text" class="form-control" name="ref_no" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label> Omni Paisa / East Paisa: </label>

                        <input type="text" class="form-control" name="code" required>

                    </div><!-- form-group Finish -->

                    <div class="text-center">
                        <!-- text-center Begin -->

                        <button class="btn btn-primary btn-lg" name="confirm_order">
                            <!-- tn btn-primary btn-lg Begin -->

                            <i class="fa fa-user-md"></i> Confirm Payment

                        </button><!-- tn btn-primary btn-lg Finish -->

                    </div><!-- text-center Finish -->

                </form><!-- form Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

    include("footer.php");

?>

</body>
</html>

<?php

    if ( isset($_POST["confirm_order"]) ) {

        $inv_no = $_POST["invoice_no"];
        $amount = $_POST["amount_sent"];
        $payment_mode = $_POST["payment_mode"];
        $ref_no = $_POST["ref_no"];
        $code = $_POST["code"];
        $status = "Pending";
        $date = date('Y-M-d h:i a');
        $order_id = $_POST["order_id"];

        $orderSql = "SELECT * FROM `customer_orders` WHERE `order_id` = '$order_id'";
        $orderQuery = $con->query($orderSql) or die ("ORDER Query Failed");
        $orderRow = mysqli_fetch_assoc($orderQuery);
        $orderInvNo = $orderRow["invoice_no"];
        $orderAmmount = $orderRow["due_amount"];
        
        if ($orderInvNo == $inv_no && $orderAmmount == $amount && $payment_mode != "") {
            $sql = "INSERT INTO `pending_orders`(`order_id`, `amount`, `payment_mode`, `ref_no`, `code`, `status`, `date`, `invoice_no`) VALUES ('$order_id','$amount','$payment_mode','$ref_no','$code','$status','$date','$inv_no')";

            if  ($con->query($sql) or die ('Pending Query Failed')) {

                $request = "Payment Panding";
                $sql_updateCustomerOrder = "UPDATE `customer_orders` SET `order_date`=NOW(),`order_status`='$request' WHERE `order_id` = '$order_id'";

                if ($con->query($sql_updateCustomerOrder)) {

                    echo "<script>alert('Your Request Approved Within 12 Hours')</script>";
                    echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
                    
                }
            }
        } else {

            echo "<script>alert('Your Invoice No./ Amount / Payment Mode is wrong')</script>";
            echo "<script>window.open('confirm.php?order_id={$order_id}', '_self')</script>";
            
        }
    }                 

?>

<?php  }  ?>
