<?php

    $con = mysqli_connect("localhost", "root", "", "e_comm_database");


    if (isset($_GET["c_mail"])) {

        $cEmail = $_GET["c_mail"];
    }

    $status = "Panding";
    $s = "SELECT * FROM `cart` WHERE `c_mail` = '$cEmail'";
    $q = $con->query($s);

    while ($row = $q->fetch_assoc()) {

        $p_id = $row["p_id"];

        $p_qty = $row["qty"];
        $p_size = $row["size"];

        $ss = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";

        $qq = mysqli_query($con, $ss) or die('Query Failed 2');

        while ($r = mysqli_fetch_array($qq)) {

            $sub_total = $r["p_price"] * $p_qty;
            $invoice_no = $r["invoice_no"];

            $insert_customerOrder = "INSERT INTO `customer_orders`(`customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES ('$cEmail','$sub_total','$invoice_no','$p_qty','$p_size',NOW(),'$status')";
            $insert_customerOrder_query = $con->query($insert_customerOrder);

            $delete_cart = "DELETE FROM `cart` WHERE `c_mail` = '$cEmail'";
            $delete_cart_query = $con->query($delete_cart);


            echo "<script>alert('Your orders has been submitted, Thanks')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        }
    }
