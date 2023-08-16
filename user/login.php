<?php
require('header.php');
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<div class="py-5">
    <div class="row" style="width: 100%;">
        <div class="col-md-12 mx-5 my-5">
            <div class="titlepage mx-auto">
                <h1 class="display-1 font-weight-bold text-success text-center">Welcome to User's Login</h1>
            </div>
        </div>
    </div>
</div>
<section class="contact-section py-1">
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['err'])) {
                echo "<div class='col-12 alert alert-danger'>Please Login First</div>";
            }

            if (isset($_POST['button'])) {
                require "../config.php";
                $email = $_POST['email'];
                $password = $_POST['password'];
                $q = "select * from `user` where `email`='$email' and `password`='$password'";
                $result = mysqli_query($conn, $q);
                if (mysqli_num_rows($result) > 0) {
                    //login
                    $data = mysqli_fetch_assoc($result);
                    if ($data['status'] == 'Blocked') {
                        echo "<div class='col-12 alert alert-danger'>You are blocked, Please Contact Admin..</div>";
                    } else {
                        $_SESSION['user_id'] = $data['id'];
                        $_SESSION['user_name'] = $data['name'];
                        echo "<script>window.location.assign('index.php');</script>";
                    }
                } else {
                    // invalid credentials
                    echo "<div class='col-12 alert alert-danger'>Invalid Email/Password.</div>";
                }
            }
            ?>
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control valid border border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control border border-dark" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group mt-3 col-12">
                        <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
            </div>
            <!-- <div class="col-lg-2">
                <img src="../OIP.jpg" alt="#">
            </div> -->
        </div>
    </div>
</section>
<?php
require('footer.php');
?>