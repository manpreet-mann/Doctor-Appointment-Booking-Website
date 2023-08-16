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
                    <h1 class="display-1 font-weight-bold text-success">Add Doctor's</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_POST['button'])) {
                    require "../config.php";
                    $name = $_POST['name'];
                    $specialization = $_POST['specialization'];
                    $hospital_name = $_POST['hospital_name'];
                    // $fees = $_POST['fees'];
                    $email = $_POST['email'];
                    // $password = $_POST['password'];
                    $phone = $_POST['phone'];
                    $gender = $_POST['gender'];
                    $age = $_POST['age'];
                    $address = $_POST['address'];
                    $addressproof = $_FILES['addressproof']['name'];
                    $newname = rand() . $addressproof;
                    $location = $_FILES['addressproof']['tmp_name'];
                    $id_proof = $_FILES['id_proof']['name'];
                    $newname2 = rand() . $id_proof;
                    $location2 = $_FILES['id_proof']['tmp_name'];
                    $q = "Insert into `emp`(`name`, `specialization`,`hospital_name`,`email`,`phone`,`gender`,`age`,`address`,`addressproof`,`id_proof`) values ('$name', '$specialization','$hospital_name','$email','$phone','$gender','$age','$address','$newname', '$newname2')";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                        move_uploaded_file($location, '../upload/' . $newname);
                        move_uploaded_file($location2, '../upload/' . $newname2);
                ?>
                        <div class='alert alert-success text-center col-md-12'>Employee Inserted.</div>
                <?php
                    } else {
                        echo "<div class='alert alert-danger text-center col-md-12'>Try Again.</div>";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="specialization" id="specialization" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Specialization'" placeholder="Enter Specialization">
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
                                    <input class="form-control valid border border-dark" name="age" id="age" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your age'" placeholder="Age">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="textarea"> Id Proof
                                        <div class="form-group">
                                            <input name="id_proof" class="form-control border border-dark" id="id_proof" type="file">
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="textarea"> Address Proof
                                        <div class="form-group">
                                            <input name="addressproof" class="form-control border border-dark" id="addressproof" type="file">
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="form-control border border-dark">Select Gender
                                        <div>
                                            <input type="radio" name="gender" id="tellgender" value="m" name="gender"> Male
                                            <input type="radio" name="gender" id="tellgender" value="f" name="gender"> Female
                                            <input type="radio" name="gender" id="tellgender" value="o" name="gender"> Other
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "curenation");
                                $result = mysqli_query($conn, "select * from hospital");
                                echo "<select id='hospital_name' name='hospital_name'>";
                                echo "<option>Hospital Name</option>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option>{$row['hospital_name']}</option>";
                                }
                                echo "</select>";
                                mysqli_close($conn);
                                ?>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
                                <script>
                                    $("#hospital_name").chosen();
                                </script>
                            </div>
                            <!-- <div class="col-6">
                             <div class="form-group">
                                 <input class="form-control valid border border-dark" name="hospital_name" id="hospital_name" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Hospital Name'" placeholder="Enter Hospital Name">
                                 </div>
                             </div> -->
                            <!-- <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="fees" id="fees" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Fees'" placeholder="Enter Fees">
                                </div>
                            </div> -->
                            
                            <!-- <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'" placeholder="Enter Password">
                                </div>
                            </div> -->
                            <div class="form-group ml-4">
                                <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function checkValues() {
        var name = document.getElementById('name').value;
        var specialization = document.getElementById('specialization').value;
        var hospital_name = document.getElementById('hospital_name').value;
        // var fees = document.getElementById('fees').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        // var password = document.getElementById('password').value;
        var age = document.getElementById('age').value;
        var address = document.getElementById('address').value;
        var id_proof = document.getElementById('id_proof').value;
        var addressproof = document.getElementById('addressproof').value;


        if (name == '' || specialization == '' || hospital_name == '' || phone.value == '' || address == '' || email.value == '' || age.value == '' || id_proof == '' || addressproof == '') {
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