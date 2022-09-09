<?php

    session_start();

    $p_cat_id = $_GET['delete_p_cat'];

    $s= "DELETE FROM `pro_categories` WHERE `p_cat_id` = '{$p_cat_id}'";
    
    if ( $con->query($s) ) {

        echo "<script>alert('Your Categories Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        
    }


?>