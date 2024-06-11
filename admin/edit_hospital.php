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
                    <h1 class="display-1 font-weight-bold text-success">Edit Hospital</h1>
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
                require '../config.php';
                $id = $_GET['id'];
                $q = "select * from `hospital` where id = '$id'";
                $result = mysqli_query($conn, $q);
                $data = mysqli_fetch_assoc($result);
                if (isset($_POST['button'])) {
                    $hospital_name = $_POST['hospital_name'];
                    $phone = $_POST['phone'];
                    $opentiming = $_POST['opentiming'];
                    $closetiming = $_POST['closetiming'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $state = $_POST['state'];
                    $city = $_POST['city'];
                    $description = $_POST['description'];
                    $q = "update `hospital` set `hospital_name` = '$hospital_name', `phone` = '$phone', `opentiming` = '$opentiming', `closetiming` = '$closetiming', `email` = '$email', `address` = '$address', `state` = '$state',`city` = '$city',`description` = '$description' where id = '$id'";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                        echo "<script>window.location.assign('select_hospital.php?msg=Record Updated');</script>";
                    } else {
                        echo "<script>window.location.assign('select_hospital.php?msg=Try Again.');</script>";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="hospital_name" id="hospital_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter hospital name'" placeholder="Enter hospital name" value="<?php echo $data['hospital_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="phone" id="phone" type="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number" value="<?php echo $data['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group h4 py-1">Open Timing
                                        <input class="form-control valid border border-dark" name="opentiming" id="opentiming" type="time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Open Timing'" placeholder="Open Timing" value="<?php echo $data['opentiming'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group h4 py-1">Close Timing
                                        <input class="form-control valid border border-dark" name="closetiming" id="closetiming" type="time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Close Timing'" placeholder="Close Timing" value="<?php echo $data['closetiming'] ?>"> 
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" value="<?php echo $data['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address" value="<?php echo $data['address'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="state" id="state" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter State'" placeholder="Enter State" value="<?php echo $data['state'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="city" id="city" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter City'" placeholder="Enter City" value="<?php echo $data['city'] ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="description" id="description" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder="Enter Description" value="<?php echo $data['description'] ?>">
                                    </div>
                                </div>
                                <div class="form-group ml-4">
                                    <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick = "return checkValues()">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script>
    function checkValues() {
        var hospital_name = document.getElementById('hospital_name').value;
        var phone = document.getElementById('phone').value;
        var opentiming = document.getElementById('opentiming').value;
        var closetiming = document.getElementById('closetiming').value;
        var email = document.getElementById('email').value;
        var address = document.getElementById('address').value;
        var state = document.getElementById('state').value;
        var city = document.getElementById('city').value;
        var description = document.getElementById('description').value;

        if (hospital_name == '' || phone.value == '' || opentiming == '' || closetiming == '' || email.value == '' || address == '' || state == '' || city == '' || description == '') {
            alert('Please fill complete form.');
            return false;
        }

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