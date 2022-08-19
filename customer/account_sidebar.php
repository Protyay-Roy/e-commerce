<?php  

    $s = "SELECT * FROM `customer` WHERE `c_email` = '{$_SESSION["c_email"]}'";

    $q = mysqli_query($con,$s) or die('Query Failed');

    if(mysqli_num_rows($q)==1){

        $r = mysqli_fetch_array($q);

    }

?>

<div class="panel panel-default sidebar-menu">
    <!--  panel panel-default sidebar-menu Begin  -->

    <div class="panel-heading">
        <!--  panel-heading  Begin  -->

        <center>
            <!--  center  Begin  -->

            <img class="img-responsive" src='images/<?=$r["c_img"] ?>' alt="">

        </center><!--  center  Finish  -->

        <br />

        <h3 align="center" class="panel-title">
            <!--  panel-title  Begin  -->

            Name: <?=$r["c_name"]; ?>

        </h3><!--  panel-title  Finish -->

    </div><!--  panel-heading Finish  -->

    <div class="panel-body">
        <!--  panel-body Begin  -->

        <ul class="nav-pills nav-stacked nav">
            <!--  nav-pills nav-stacked nav Begin  -->

            <li class="<?php if (isset($_GET['my_orders'])) { echo "active"; } ?>">

                <a href="my_account.php?my_orders">

                    <i class="fa fa-list"></i> My Orders

                </a>

            </li>

            <li class="<?php if (isset($_GET['pay_offline'])) {
                            echo "active";
                        } ?>">

                <a href="my_account.php?pay_offline">

                    <i class="fa fa-bolt"></i> Pay Offline

                </a>

            </li>

            <li class="<?php if (isset($_GET['edit_account'])) {
                            echo "active";
                        } ?>">

                <a href="my_account.php?edit_account">

                    <i class="fa fa-pencil"></i> Edit Account

                </a>

            </li>

            <li class="<?php if (isset($_GET['change_pass'])) {
                            echo "active";
                        } ?>">

                <a href="my_account.php?change_pass">

                    <i class="fa fa-user"></i> Change Password

                </a>

            </li>

            <li class="<?php if (isset($_GET['delete_account'])) {
                            echo "active";
                        } ?>">

                <a href="my_account.php?delete_account">

                    <i class="fa fa-trash-o"></i> Delete Account

                </a>

            </li>

            <li>

                <a href="c_logout.php">

                    <i class="fa fa-sign-out"></i> Log Out

                </a>

            </li>

        </ul><!--  nav-pills nav-stacked nav Begin  -->

    </div><!--  panel-body Finish  -->

</div><!--  panel panel-default sidebar-menu Finish  -->


