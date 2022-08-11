<?php

    $active = "contuct";

    include("includes/header.php");

?>

<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Contact Us
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-8 col-xs-offset-2">
            <!-- col-md-12 Begin -->

            <div class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <center>
                        <!-- center Begin -->

                        <h2> Feel free to Contact Us</h2>

                        <p class="text-muted">
                            <!-- text-muted Begin -->

                            If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>

                        </p><!-- text-muted Finish -->

                    </center><!-- center Finish -->

                    <?php
                    
                        if(isset($_POST["submit"])){

                            // send massage from user
                            $name = $_POST["name"];

                            $subject = $_POST["subject"];

                            $message = $_POST["message"];

                            $sender_email = $_POST["email"];

                            $receiver_mail = "r.protyay@gmail.com";

                            mail($receiver_mail,$name,$subject,$message,$sender_email);

                            // send massage from user
                            $email = $_POST["email"];

                            $sub = "Welcome To My Website";

                            $msg = "Thank you for sending massage. ASAP we will reply";

                            $from = "r.protyay@gmail.com";

                            mail($email,$sub,$msg,$from);

                            echo "<script>alert('Successfully Sent Your Massage. Thank You.')</script>";

                        }
                    
                    ?>

                    <form action="contact.php" method="post">
                        <!-- form Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Name</label>

                            <input type="text" class="form-control" name="name" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Email</label>

                            <input type="text" class="form-control" name="email" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Subject</label>

                            <input type="text" class="form-control" name="subject" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Message</label>

                            <textarea name="message" class="form-control"></textarea>

                        </div><!-- form-group Finish -->

                        <div class="text-center">
                            <!-- text-center Begin -->

                            <button type="submit" name="submit" class="btn btn-primary">

                                <i class="fa fa-user-md"></i> Send Message

                            </button>

                        </div><!-- text-center Finish -->

                    </form><!-- form Finish -->

                </div><!-- box-header Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


</body>

</html>