<!-- <?php
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
                    <h1 class="display-1 font-weight-bold text-success">Edit Employee</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                require '../config.php';
                $id = $_GET['id'];
                $q = "select * from `emp` where id = '$id'";
                $result = mysqli_query($conn, $q);
                $data = mysqli_fetch_assoc($result);
                if (isset($_POST['button'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    if ($_FILES['addressproof']['error'] > 0) {
                        //file not uploaded
                        $addressproof = $data['addressproof'];
                    } else {
                        //file uploaded
                        $addressproof = rand() . $_FILES['addressproof']['name'];
                        $location = $_FILES['addressproof']['tmp_name'];
                    }
                    if ($_FILES['id_proof']['error'] > 0) {
                        //file not uploaded
                        $id_proof = $data['id_proof'];
                    } else {
                        //file uploaded
                        $id_proof = rand() . $_FILES['id_proof']['name'];
                        $location2 = $_FILES['id_proof']['tmp_name'];
                    }
                    $q = "update `emp` set `name` = '$name', `email` = '$email', `phone` = '$phone',`age` = '$age',`gender` = '$gender',`address` = '$address', `addressproof` = '$addressproof', `id_proof` = '$id_proof' where id = '$id'";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                        if ($_FILES['id_proof']['error'] == 0) {
                            move_uploaded_file($location2, '../upload/' . $id_proof);
                        }
                        if ($_FILES['addressproof']['error'] == 0) {
                            move_uploaded_file($location, '../upload/' . $addressproof);
                        }
                        echo "<script>window.location.assign('select_employee.php?msg=Record Updated');</script>";
                    } else {
                        echo "<script>window.location.assign('select_employee.php?msg=Try Again.');</script>";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" value="<?php echo $data['name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="specialization" id="specialization" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Specialization'" placeholder="Enter Specialization" value="<?php echo $data['specialization'] ?>">
                                </div>
                            </div>
                            <!-- <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="fees" id="fees" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Fees'" placeholder="Enter Fees" value="<?php echo $data['fees'] ?>">
                                </div>
                            </div> -->
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="phone" id="phone" type="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number" value="<?php echo $data['phone'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" value="<?php echo $data['email'] ?>">
                                </div>
                            </div>
                            <!-- <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" placeholder="Enter Password" value="<?php echo $data['password'] ?>">
                                </div>
                            </div> -->
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="age" id="age" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your age'" placeholder="Age" value="<?php echo $data['age'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address" value="<?php echo $data['address'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="textarea"> Id Proof
                                        <div class="form-group">
                                            <input name="id_proof" class="form-control border border-dark" id="id_proof" type="file" value="<?php echo $data['id_proof'] ?>">
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="textarea"> Address Proof
                                        <div class="form-group">
                                            <input name="addressproof" class="form-control border border-dark" id="addressproof" type="file" value="<?php echo $data['addressproof'] ?>">
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="form-control border border-dark">Select Gender
                                        <div>
                                            <input type="radio" name="gender" id="tellgender" value="m" name="gender" <?php if ($data['gender'] == 'm') {
                                                                                                                            echo "checked";
                                                                                                                        } ?>> Male
                                            <input type="radio" name="gender" id="tellgender" value="f" name="gender" <?php if ($data['gender'] == 'f') {
                                                                                                                            echo "checked";
                                                                                                                        } ?>> Female
                                            <input type="radio" name="gender" id="tellgender" value="o" name="gender" <?php if ($data['gender'] == 'o') {
                                                                                                                            echo "checked";
                                                                                                                        } ?>> Other
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="form-group ml-4">
                                <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</main>
<script>
    function checkValues() {
        var name = document.getElementById('name').value;
        var specialization = document.getElementById('specialization').value;
        // var fees = document.getElementById('fees').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        // var password = document.getElementById('password').value;
        var age = document.getElementById('age').value;
        var address = document.getElementById('address').value;
        var id_proof = document.getElementById('id_proof').value;
        var addressproof = document.getElementById('addressproof').value;
        var tellgender = document.getElementById('tellgender').value;

        if (name == '' || specialization == '' || phone.value == '' || email.value == '' || age == '' || address == '' || id_proof == '' || addressproof == '' || tellgender == '') {
            alert('Please fill complete form.');
            return false;
        }

        // var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
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
?> -->