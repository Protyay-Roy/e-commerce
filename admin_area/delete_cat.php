<?php

    session_start();

    $cat_id = $_GET['delete_cat'];

    $s= "DELETE FROM `categories` WHERE `cat_id` = '{$cat_id}'";
    
    if ( $con->query($s) ) {

        echo "<script>alert('Your Categories Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
        
    }


?>