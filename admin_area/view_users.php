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

                    <i class="fa fa-dashboard"></i> Dashboard / View Users

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

                        <i class="fa fa-fw fa-users"></i> View Users

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

                                    <th> Users no: </th>
                                    <th> Users Name: </th>
                                    <th> Users Email: </th>
                                    <th> Users Address: </th>
                                    <th> Users Contuct No: </th>
                                    <th> About User: </th>
                                    <th> Users Image:: </th>

                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                            <?php
                            
                                $s = "SELECT * FROM `admin`";
                                if ($q = $con->query($s)) {

                                    $i = 0;
                                    while ($r = $q->fetch_assoc()) {  $i++;?>
                                    
                                <tr>
                                    <!-- tr begin -->
                                    <td><?= $i; ?></td>
                                    <td><?= $r["a_name"]; ?></td>
                                    <td><?= $r["a_email"]; ?></td>
                                    <td><?= $r["a_address"]; ?></td>
                                    <td><?= $r["a_con"]; ?></td>
                                    <td><?= $r["a_about"]; ?></td>
                                    <td>
                                        <img style="height: 70px;" src="admin_images/<?= $r["a_img"]?>" alt="<?= $r["a_img"]?>">
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