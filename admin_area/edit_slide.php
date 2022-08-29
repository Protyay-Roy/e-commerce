<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Update Slides </title>
    </head>

    <body>

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-12">
                <!-- col-lg-12 Begin -->

                <ol class="breadcrumb">
                    <!-- breadcrumb Begin -->

                    <li class="active">
                        <!-- active Begin -->

                        <i class="fa fa-dashboard"></i> Dashboard / Slides / Update Slides

                    </li><!-- active Finish -->

                </ol><!-- breadcrumb Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-12">
                <!-- col-lg-12 Begin -->

                <div class="panel panel-default">
                    <!-- panel panel-default Begin -->

                    <div class="panel-heading">
                        <!-- panel-heading Begin -->

                        <h3 class="panel-title">
                            <!-- panel-title Begin -->

                            <i class="fa fa-money fa-fw"></i> Update Slides

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <?php

                        if (isset($_GET['edit_slide'])) {

                            $slide_id = $_GET['edit_slide'];
                            $s = "select * from slider where slide_id = '$slide_id'";

                            if ($q = $con->query($s)) {

                                $r = $q->fetch_assoc();
                            }
                        }

                        ?>

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Slides Title </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="slide_title" type="text" class="form-control" required value="<?= $r['slide_title']; ?>">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Slides Image </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <img src="slides_images/<?= $r['slide_img']; ?>" alt="<?= $r['slide_img']; ?>" style="height: 100px;">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Update Slides Image </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="slide_img" type="file" class="form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Update Categories" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->

                    </div><!-- panel-body Finish -->

                </div><!-- canel panel-default Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

        <script src="js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea'
            });
        </script>
    </body>

    </html>


    <?php

    if (isset($_POST["submit"])) {

        $slide_title = $_POST["slide_title"];
        $slider_img = $_FILES["slide_img"]["name"];
        $slider_imgTmp = $_FILES["slide_img"]["tmp_name"];

        if ( empty($slider_img )) {
        
            $s = "UPDATE `slider` SET `slide_title`='{$slide_title}' WHERE `slide_id` = '{$slide_id}'";

            if ($con->query($s)) {

                echo "<script>alert('Sliders has been inserted sucessfully')</script>";
                echo "<script>window.open('index.php?view_slides','_self')</script>";
            } else {

                echo "<script>alert('Failed')</script>";
            }

        } else {

            $s = "UPDATE `slider` SET `slide_title`='{$slide_title}',`slide_img`='{$slider_img}' WHERE `slide_id` = '{$slide_id}'";

            if ($con->query($s)) {

                move_uploaded_file($slider_imgTmp,"slides_images/".$slider_img);
                echo "<script>alert('Sliders has been inserted sucessfully')</script>";
                echo "<script>window.open('index.php?view_slides','_self')</script>";
            } else {

                echo "<script>alert('Failed')</script>";
            }
        }
    }




    ?>



<?php } ?>