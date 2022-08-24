<center>
    <!--  center Begin  -->

    <h1> My Orders </h1>

    <p class="lead"> Your orders on one place</p>

    <p class="text-muted">

        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>

    </p>

</center><!--  center Finish  -->


<hr>


<div class="table-responsive">
    <!--  table-responsive Begin  -->

    <table class="table table-bordered table-hover">
        <!--  table table-bordered table-hover Begin  -->

        <thead>
            <!--  thead Begin  -->

            <tr>
                <!--  tr Begin  -->

                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Size: </th>
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>
                <th> Status: </th>

            </tr><!--  tr Finish  -->

        </thead><!--  thead Finish  -->

        <tbody>
            <!--  tbody Begin  -->

            <?php

            $sql = "SELECT * FROM `customer_orders` WHERE `customer_id` = '{$_SESSION["c_email"]}'";

            if ($query = $con->query($sql)) {
                $i = 0;
                while ( $res = mysqli_fetch_assoc($query) ) {
                    $i++;

            ?>

                    <tr>
                        <!--  tr Begin  -->

                        <th> <?= $i; ?> </th>

                        <td> <?= $res["due_amount"]; ?> </td>
                        <td> <?= $res["invoice_no"]; ?> </td>
                        <td> <?= $res["qty"]; ?> </td>
                        <td> <?= $res["size"]; ?> </td>
                        <td> <?= $res["order_date"]; ?> </td>
                        <td> 
                            <?php
                                if ( $res["order_status"] == "Panding" ) {
                                    echo "Unpaid";
                                } else { echo "Paid"; }
                            ?>
                        </td>

                        <td>

                            <a href="confirm.php?order_id=<?= $res["order_id"]; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>

                        </td>

                    </tr><!--  tr Finish  -->

            <?php }
            } ?>

        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->