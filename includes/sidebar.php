<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Products Categories</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
            
            <?php
            
                $s = "SELECT DISTINCT p_cat_title FROM `pro_categories`";

                $q = mysqli_query($con,$s);

                while($r=mysqli_fetch_array($q)){

                    $pro_cat = $r["p_cat_title"];
                
            
            ?>

            <li><a href="#"><?=$pro_cat;?></a></li>

            <?php } ?>
            
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Categories</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
            
        <?php
            
            $s = "SELECT DISTINCT cat_title FROM categories";

            $q = mysqli_query($con,$s);

            while($r=mysqli_fetch_array($q)){

                $cat = $r["cat_title"];
            
        
        ?>

        <li><a href="#"><?=$cat;?></a></li>

        <?php } ?>
            
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->