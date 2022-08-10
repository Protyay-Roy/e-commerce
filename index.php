<?php

    $active = "home";

    include("includes/header.php");

?>

<div class="container" id="slider">
    <!-- container Begin -->

    <div class="col-md-12">
        <!-- col-md-12 Begin -->

        <div class="carousel slide" id="myCarousel" data-ride="carousel">
            <!-- carousel slide Begin -->

            <ol class="carousel-indicators">
                <!-- carousel-indicators Begin -->

                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>

            </ol><!-- carousel-indicators Finish -->

            <div class='carousel-inner'>
                <!-- carousel-inner Begin -->

                <?php slider(); ?>

            </div><!-- carousel-inner Finish -->

            <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                <!-- left carousel-control Begin -->

                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>

            </a><!-- left carousel-control Finish -->

            <a href="#myCarousel" class="right carousel-control" data-slide="next">
                <!-- left carousel-control Begin -->

                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>

            </a><!-- left carousel-control Finish -->

        </div><!-- carousel slide Finish -->

    </div><!-- col-md-12 Finish -->

</div><!-- container Finish -->

<div id="advantages">
    <!-- #advantages Begin -->

    <div class="container">
        <!-- container Begin -->

        <div class="same-height-row">
            <!-- same-height-row Begin -->

            <div class="col-sm-4">
                <!-- col-sm-4 Begin -->

                <div class="box same-height">
                    <!-- box same-height Begin -->

                    <div class="icon">
                        <!-- icon Begin -->

                        <i class="fa fa-heart"></i>

                    </div><!-- icon Finish -->

                    <h3><a href="#">Best Offer</a></h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>

                </div><!-- box same-height Finish -->

            </div><!-- col-sm-4 Finish -->

            <div class="col-sm-4">
                <!-- col-sm-4 Begin -->

                <div class="box same-height">
                    <!-- box same-height Begin -->

                    <div class="icon">
                        <!-- icon Begin -->

                        <i class="fa fa-tag"></i>

                    </div><!-- icon Finish -->

                    <h3><a href="#">Best Prices</a></h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                </div><!-- box same-height Finish -->

            </div><!-- col-sm-4 Finish -->

            <div class="col-sm-4">
                <!-- col-sm-4 Begin -->

                <div class="box same-height">
                    <!-- box same-height Begin -->

                    <div class="icon">
                        <!-- icon Begin -->

                        <i class="fa fa-thumbs-up"></i>

                    </div><!-- icon Finish -->

                    <h3><a href="#">100% Original</a></h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                </div><!-- box same-height Finish -->

            </div><!-- col-sm-4 Finish -->

        </div><!-- same-height-row Finish -->

    </div><!-- container Finish -->

</div><!-- #advantages Finish -->

<div id="hot">
    <!-- #hot Begin -->

    <div class="box">
        <!-- box Begin -->

        <div class="container">
            <!-- container Begin -->

            <div class="col-md-12">
                <!-- col-md-12 Begin -->

                <h2>
                    Our Latest Products
                </h2>

            </div><!-- col-md-12 Finish -->

        </div><!-- container Finish -->

    </div><!-- box Finish -->

</div><!-- #hot Finish -->

<div id="content" class="container">
    <!-- container Begin -->

    <div id="row same-heigh-row">
        <!-- #row same-heigh-row Begin -->

        <?php

        $s = "SELECT * FROM `product` ORDER BY RAND() LIMIT 3";

        $q = mysqli_query($con, $s) or die("Query Failed");

        while ($row_products = mysqli_fetch_array($q)) {

            $pro_id = $row_products['p_id'];

            $pro_title = $row_products['p_title'];

            $pro_price = $row_products['p_price'];

            $pro_price = "$ " . $pro_price;

            $pro_img1 = $row_products['p_img1'];

        ?>

            <div class="col-md-3 col-sm-6 center-responsive">
                <!-- col-md-3 col-sm-6 center-responsive Begin -->
                <div class="product same-height">
                    <!-- product same-height Begin -->
                    <a href="details.php?pro_id=<?= $pro_id; ?>">
                        <img class="img-responsive" src="admin_area/product_images/<?= $pro_img1; ?>" alt="<?= $pro_img1; ?>">
                    </a>

                    <div class="text">
                        <!-- text Begin -->
                        <h3><a href="details.php?pro_id=<?= $pro_id; ?>"><?= $pro_title; ?></a></h3>

                        <p class="price"><?= $pro_price; ?></p>

                    </div><!-- text Finish -->

                </div><!-- product same-height Finish -->
            </div><!-- col-md-3 col-sm-6 center-responsive Finish -->

        <?php } ?>

    </div><!-- #row same-heigh-row Finish -->
</div><!-- container Finish -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


</body>

</html>