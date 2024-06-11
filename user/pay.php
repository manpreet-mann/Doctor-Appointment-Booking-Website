<?php
require('header.php');
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<div class="py-5">
    <div class="row">
        <div class="col-md-6 mx-5">
            <div class="titlepage mx-auto">
                <h2 class="display-1 font-weight-bold text-success">Payment Details</h2>
            </div>
        </div>
    </div>
</div>
<section class="contact-section py-1">
    <div class="container h3">
        <div class="row">
            <?php
            if (isset($_POST['button'])) {
                require "../config.php";
                $full_name = $_POST['full_name'];
                $user_id = $_SESSION['user_id'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $q = "Insert into `payment`(`full_name`, `email`, `address`, `city`, `state`,`user_id`) values ('$full_name', '$email', '$address', '$city', '$state','$user_id')";
                $result = mysqli_query($conn, $q);
                if ($result > 0) {
            ?>
                    <!-- <div class='alert alert-success text-center col-md-12'>Data Inserted.</div> -->
                    echo "<script>
                        window.location.assign('payment.php');
                    </script>";
            <?php
                } else {
                    echo "<div class='alert alert-danger text-center col-md-12'>Try Again.</div>";
                }
            }
            ?>
            <div class="col-lg-10">
                <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control valid border border-dark" type="text" name="full_name" placeholder="Enter Full Name" id="full_name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control valid border border-dark" type="text" name="email" placeholder="Enter Email" id="email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control valid border border-dark" type="text" name="address" placeholder="Enter Address" id="address">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control valid border border-dark" type="text" name="city" placeholder="Enter City" id="city">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control valid border border-dark" type="text" name="state" placeholder="Enter State" id="state">
                            </div>
                        </div>
                        <div class="form-group ml-4">
                            <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function checkValues() {
        var fname = document.getElementById('fname').value;
        var email = document.getElementById('email').value;
        var adr = document.getElementById('adr').value;
        var city = document.getElementById('city').value;

        if (fname == '' || email.value == '' || adr == '' || city == '') {
            alert('Please fill complete form.');
            return false;
        }
        var emaipatt = /^[a-zA-Z0-9\.\_\-]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/;
        if (!emaipatt.test(email)) {
            alert('Enter Valid Email');
            return false;
        }
    }
</script>
<?php
require('footer.php');
?>
<!-- <h2>Payment Detailed</h2>
                        <div class="row">
                            <div class="col-75">
                                <div class="container">
                                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-50">
                                                <h3>All Field Fill Mandatory</h3>
                                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                                <input type="text" id="fname" name="full_name">
                                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                                <input type="text" id="email" name="email">
                                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                                <input type="text" id="adr" name="address">
                                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                                <input type="text" id="city" name="city">

                                                <div class="row">
                                                    <div class="col-50">
                                                        <label for="state">State</label>
                                                        <input type="text" name="state" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-50">
                                                <label for="fname">Accepted Cards</label>
                                                <div class="icon-container">
                                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                                </div>
                                            </div>

                                            <a href="payment.php" input type="submit" value="Continue to checkout" name="button" class="btn">Continue to checkout</a>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        </body>-->