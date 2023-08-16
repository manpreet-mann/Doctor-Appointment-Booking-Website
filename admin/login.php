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
                <h1 class="display-1 font-weight-bold text-success text-center">Welcome to Admin Login</h1>
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
                $password = md5($_POST['password']);
                $q = "select * from `admin` where `email`='$email' and `password`='$password'";
                $result = mysqli_query($conn, $q);
                if (mysqli_num_rows($result) > 0) {
                    //login
                    $data = mysqli_fetch_assoc($result);
                    $_SESSION['admin_id'] = $data['id'];
                    $_SESSION['admin_name'] = $data['name'];
                    echo "<script>window.location.assign('index.php');</script>";
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
                        <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Login</button>
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
<!-- <script>
    function checkValues() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (email.value == '' || password.value == '') {
            alert('Please fill complete form.');
            return false;
        }

        var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (!re.test(password)) {
            alert('Your password must be of at least 8 characters, must contain a capital letter, a small letter, a number, a symbol and should not contain space');
            return false;
        }
        var emaipatt = /^[a-zA-Z0-9\.\_\-]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/;
        if (!emaipatt.test(email)) {
            alert('Enter Valid Email');
            return false;
        }
    }
</script> -->
<?php
require('footer.php');
?>