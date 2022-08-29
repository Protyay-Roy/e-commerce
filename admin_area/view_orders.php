<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Orders

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <div class="panel panel-default">
                <!-- panel panel-default begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <h3 class="panel-title">
                        <!-- panel-title begin -->

                        <i class="fa fa-fw fa-book"></i> View Orders

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->


                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-hover table-striped table-bordered">
                            <!-- table table-hover table-striped table-bordered begin -->

                            <thead>
                                <!-- thead begin -->

                                <tr>
                                    <!-- th begin -->

                                    <th> Order no: </th>
                                    <th> Customer Email: </th>
                                    <th> Invoice No: </th>
                                    <th> Amount: </th>
                                    <th> Product Qty: </th>
                                    <th> Product Size: </th>
                                    <th> Ordered Date: </th>
                                    <th> Status: </th>

                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                            <?php
                            
                                $s = "SELECT * FROM `customer_orders`";
                                if ($q = $con->query($s)) {

                                    $i = 0;
                                    while ($r = $q->fetch_assoc()) {  $i++;?>
                                    
                                <tr>
                                    <!-- tr begin -->
                                    <td><?= $i; ?></td>
                                    <td><?= $r["customer_id"]; ?></td>
                                    <td><?= $r["invoice_no"]; ?></td>
                                    <td><?= $r["due_amount"]; ?></td>
                                    <td><?= $r["qty"]; ?></td>
                                    <td><?= $r["size"]; ?></td>
                                    <td><?= $r["order_date"]; ?></td>
                                    <td>
                                        <form action="">
                                            <button class="btn btn-primary">
                                                <?= $r["order_status"]; ?>
                                            </button>
                                        </form>
                                    </td>

                                </tr><!-- tr finish -->

                            <?php } } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-hover table-striped table-bordered finish -->

                    </div><!-- table-responsive finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>
<!-- <script>
    function confirm_delete(){
        if(confirm("Are you sure you want to delete this..?") === true){
            return true;
        }else{
            return false;
        }
    }
</script> -->