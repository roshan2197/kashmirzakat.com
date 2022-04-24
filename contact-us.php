<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
</head>

<body>
    <?php
    include 'assets/navbar.php';
    ?>
    <div class="container contact">
        <div class="row contact-left shadow p-3 mb-5 mt-5 bg-body rounded">
            <div class="col-md-3 ">
                <div class="contact-info">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" width="100px" />
                    <h2 class=" fw-bold">Contact Us</h2>
                    <h4>We would love to hear from you !</h4>
                </div>
            </div>
            <div class="col-md-9 ">
                <form method="POST" action="" class="contact-form">
                    <div class="form-group mb-3">
                        <label class="control-label form-floating col-sm-2" for="fname">First Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" name="fname" required>
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="control-label col-sm-2" for="lname">Last Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" name="lname">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="control-label col-sm-2" for="comment">Comment:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="comment" placeholder="Write brief reason for contact" id="comment" required></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

    include 'assets/footer.php';
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $db = mysqli_connect("localhost", "root", "", "db");
        $sql = "INSERT into `user_contact` (fname,lname,email,comment) values ('$fname','$lname', '$email','$comment')";
        include 'assets/connection.php';
        if (mysqli_query($db, $sql)) {
            echo '<script>alert("Your form is successfully submitted. Our team will contact you shortly.")</script>';
            echo '<script>window.location = "index.php"</script>';
        } else {
            echo '<script>alert("Error in sending message. Please try again")</script>';
            echo '<script>window.location = "contact-us.php"</script>';
        }
    }
    ?>

</body>

</html>