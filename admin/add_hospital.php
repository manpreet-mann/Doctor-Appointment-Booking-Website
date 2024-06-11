<?php
require('header.php');
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<main>
    <div class="py-5">
        <div class="row">
            <div class="col-md-6 mx-5">
                <div class="titlepage mx-auto">
                    <h1 class="display-1 font-weight-bold text-success">Add Hospital</h1>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="col-lg-12">
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_POST['button'])) {
                    require "../config.php";
                    $hospital_name = $_POST['hospital_name'];
                    $fees = $_POST['fees'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $state = $_POST['state'];
                    $city = $_POST['city'];
                    $description = $_POST['description'];
                    $opentiming = $_POST['opentiming'];
                    $closetiming = $_POST['closetiming'];
                    $q = "Insert into `hospital`(`hospital_name`, `fees`, `email`, `password`,`phone`,`address`,`state`,`city`,`description`,`opentiming`,`closetiming`) values ('$hospital_name', '$fees', '$email', '$password','$phone', '$address', '$state', '$city', '$description', '$opentiming', '$closetiming')";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                ?>
                        <div class='alert alert-success text-center col-md-12'>Hospital Added</div>
                <?php
                    } else {
                        echo "<div class='alert alert-danger text-center col-md-12'>Try Again.</div>";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="hospital_name" id="hospital_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter hospital name'" placeholder="Enter hospital name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="fees" id="fees" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Fees'" placeholder="Enter Fees">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="phone" id="phone" type="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="state" id="state" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter State'" placeholder="Enter State">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="city" id="city" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter City'" placeholder="Enter City">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group h4 py-1">Open Timing
                                        <input class="form-control valid border border-dark" name="opentiming" id="opentiming" type="time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Open Timing'" placeholder="Open Timing">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group h4 py-1">Close Timing
                                        <input class="form-control valid border border-dark" name="closetiming" id="closetiming" type="time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Close Timing'" placeholder="Close Timing">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="description" id="description" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="form-group ml-4">
                                    <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<script>
    function checkValues() {
        var hospital_name = document.getElementById('hospital_name').value;
        var fees = document.getElementById('fees').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        // var password = document.getElementById('password').value;
        var opentiming = document.getElementById('opentiming').value;
        var closetiming = document.getElementById('closetiming').value;
        var address = document.getElementById('address').value;
        var state = document.getElementById('state').value;
        var city = document.getElementById('city').value;
        var description = document.getElementById('description').value;


        if (hospital_name == '' || fees == '' || phone.value == '' || email.value == '' || opentiming == '' || closetiming == '' || address == '' || state == '' || city == '' || description == '') {
            alert('Please fill complete form.');
            return false;
        }
        // var re = /^(?=.\d)(?=.[!@#$%^&])(?=.[a-z])(?=.*[A-Z]).{8,}$/;
        // if (!re.test(password)) {
        //     alert('Your password must be of at least 8 characters, must contain a capital letter, a small letter, a number, a symbol and should not contain space');
        //     return false;
        // }
        var emaipatt = /^[a-zA-Z0-9\.\_\-]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/;
        if (!emaipatt.test(email)) {
            alert('Enter Valid Email');
            return false;
        }

        var contactpatt = /^[6-9]{1}[0-9]{9}$/;
        if (!contactpatt.test(phone)) {
            alert('Enter Valid Phone Number without code.');
            return false;
        }
    }
</script>
<?php
require('footer.php');
?>