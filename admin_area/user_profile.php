<?php

$sql = "SELECT * FROM `admin` WHERE `a_email`= '{$_SESSION['admin_email']}'";

if ($q = $con->query($sql)) {

    $r = mysqli_fetch_assoc($q);
}
?>
<div class="box-header">
    <!-- box-header Begin -->

    <center>
        <!-- center Begin -->

        <h2> Edit account </h2>

    </center><!-- center Finish -->

    <form action="my_account.php?edit_account" method="post" enctype="multipart/form-data">
        <!-- form Begin -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Name</label>

            <input type="text" class="form-control" name="name" required value="<?= $r["a_name"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Email</label>

            <input type="text" class="form-control" name="email" disabled value="<?= $r["a_email"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Contact</label>

            <input type="text" class="form-control" name="contact" required value="<?= $r["a_con"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Address</label>

            <input type="text" class="form-control" name="address" required value="<?= $r["a_address"] ?>">

        </div><!-- form-group Finish -->

        <div class="form-group">
            <!-- form-group Begin -->

            <label>Your Profile Picture</label>

            <input type="file" class="form-control form-height-custom" name="image">

        </div><!-- form-group Finish -->

        <div class="text-center">
            <!-- text-center Begin -->

            <button type="submit" name="update" class="btn btn-primary">

                <i class="fa fa-user-md"></i> Update

            </button>

        </div><!-- text-center Finish -->

    </form><!-- form Finish -->

</div><!-- box-header Finish -->

<?php
if (isset($_POST["update"])) {

    $c_name = ucwords($_POST["c_name"]);

    $c_email = $_POST["c_email"];

    $c_pass = $_POST["c_pass"];

    $c_country = ucfirst($_POST["c_country"]);

    $c_city = ucfirst($_POST["c_city"]);

    $c_ph = $_POST["c_contact"];

    $c_add = ucwords($_POST["c_address"]);

    $c_img = $_FILES["c_image"]["name"];

    $c_image_tmp = $_FILES["c_image"]["tmp_name"];

    if ( empty($_FILES["c_image"]) ) {

        $s = "UPDATE `customer` SET `c_name`='$c_name ',`c_country`='$c_country',`c_city`='$c_city',`c_ph`='$c_ph',`c_add`='$c_add' WHERE `c_email` = '{$_SESSION["c_email"]}'";

        if (mysqli_query($con, $s) or die('Query Failed')) {

            echo "<script>alert('You Profile have been Update Sucessfully')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

        } else {

            echo "<script>alert('You Profile is not Updated')</script>";

            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
        }
        
    } else {

        $s = "UPDATE `customer` SET `c_name`='$c_name',`c_country`='$c_country',`c_city`='$c_city',`c_ph`='$c_ph',`c_add`='$c_add',`c_img`='$c_img' WHERE `c_email` = '{$_SESSION["c_email"]}'";

        if (mysqli_query($con, $s) or die('Query Failed')) {

            move_uploaded_file($c_image_tmp, "images/$c_img");

            echo "<script>alert('You Profile have been Update Sucessfully')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        } else {


            echo "<script>alert('You Profile is not Updated')</script>";

            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
        }
    }
}

?>