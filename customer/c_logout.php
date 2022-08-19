<?php

    session_start();

    unset($_SESSION['c_email']);
    
    session_destroy();

    header("location:../checkout.php");

?>