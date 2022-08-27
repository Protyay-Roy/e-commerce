<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {
    include('../functions/function.php');

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Products

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

                        <i class="fa fa-tags"></i> View Products

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover">
                            <!-- table table-striped table-bordered table-hover begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr>
                                    <!-- tr begin -->
                                    <th> Product ID: </th>
                                    <th> Product Title: </th>
                                    <th> Product Image: </th>
                                    <th> Product Price: </th>
                                    <th> Product Status: </th>
                                    <th> Product Keywords: </th>
                                    <th> Product Date: </th>
                                    <th> Product Delete: </th>
                                    <th> Product Edit: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php

                                    $s = "SELECT * FROM `product`";

                                    if ($q = $con->query($s)) {

                                        $i = 0;
                                        while ($r = $q->fetch_array()) {
                                            $pro_id = $r["p_id"];
                                            $i++;
                                ?>

                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $r["p_title"]; ?></td>
                                            <td>
                                                <img src="../admin_area/product_images/<?= $r["p_img1"]; ?>" alt="<?= $r["p_img1"]; ?>" style="height: 50px;">
                                            </td>
                                            <td>$ <?= $r["p_price"]; ?></td>
                                            <td>

                                            </td>
                                            <td><?= $r["invoice_no"]; ?></td>
                                            <td><?= $r["date"]; ?></td>
                                            <td>
                                                <a href="index.php?delete_product=<?= $pro_id; ?>" onclick="confirm_delete()" class="btn btn-danger">

                                                    <i class="fa fa-trash-o"></i> Delete

                                                </a>

                                            </td>
                                            <td>
                                                <a href="index.php?edit_product=<?= $r["p_id"]; ?>" class="btn btn-success">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                            </td>
                                        </tr>

                                <?php } }   ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
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