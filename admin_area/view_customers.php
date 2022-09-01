<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Customers

            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-fw fa-users"></i>  View Customers
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> #ID: </th>
                                <th> Name: </th>
                                <th> Email: </th>
                                <th> Country: </th>
                                <th> City: </th>
                                <th> Address: </th>
                                <th> Phone No: </th>
                                <th> Image: </th>
                                <th> Edit</th>
                                <th> Delete</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            <?php
                            
                                $s = "select * from customer";
                                if ($q = $con->query($s)) {

                                    $i = 0;
                                    while($r = $q->fetch_assoc()){
                                        $i++;
                            ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $r['c_name']; ?></td>
                                        <td><?= $r['c_email']; ?></td>
                                        <td><?= $r['c_country']; ?></td>
                                        <td><?= $r['c_city']; ?></td>
                                        <td><?= $r['c_add']; ?></td>
                                        <td><?= $r['c_ph']; ?></td>
                                        <td>
                                            <img src="../customer/images/<?= $r['c_img']; ?>" alt="<?= $r['c_img']; ?>" style="height: 70px;">
                                        </td>
                                        <td>
                                            <a href="index.php?edit_slide=<?= $r['c_id']; ?>" class="btn btn-success">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?delete_slide=<?= $r['c_id']; ?>" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>

                            <?php } } ?>

                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


<?php } ?>