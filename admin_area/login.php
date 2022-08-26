<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P-Roy Store Admin Area</title>
    <link rel="stylesheet" href="../styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>
    

<?php

    include ("db_con.php");

    if (isset($_POST["admin_login"])){

        $aEmail = $_POST["admin_email"];
        $aPass = $_POST["admin_pass"];

        $s = "SELECT * FROM `admin` WHERE a_email = '$aEmail' && a_pass = '$aPass'";
        $q = $con->query($s);

        if ($q->num_rows === 1){
            
            session_start();

            $r = mysqli_fetch_assoc($q);
            $_SESSION["admin_email"] = $r["a_email"];


            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        }else{

            echo "<script>alert('Your E-mail Or Password Is Wrong')</script>";
            echo "<script>window.open('login.php','_self')</script>";

        }
    }

?>