<?php
require('header.php');
//  $eid = $_GET['id'];
//  $hospitalid = $_SESSION['hospital_id'];
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<main>

    <div class="py-5">
        <div class="row" style="width: 100%;">
            <!-- <div class="col-md-6 mx-5 my-5"> -->
            <div class="col-10 alert alert-success text-center mx-auto">
                <h3 class="color: green;">Patient's Details</h3>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <?php
    if (isset($_POST['button'])) {
        //print_r($_FILES);
        require "../config.php";
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $book_date = $_POST['book_date'];
        $book_time = $_POST['book_time'];
        $description = $_POST['description'];
        $user_id = $_SESSION['user_id'];
        $hospitalid = $_SESSION['hospital_id'];
        $eid = $_GET['id'];
        $q = "Insert into `appointment`(`patient_name`,`age`,`gender`,`address`, `book_date`, `book_time`,`description`,`user_id`,`hospital_id`,employee_id) values ('$name','$age','$gender','$address', '$book_date', '$book_time', '$description','$user_id','$hospitalid','$eid')";
        $result = mysqli_query($conn, $q);
        if ($result > 0) {
            
            echo "<div class='alert alert-success text-center col-md-12'>Data Inserted</div>";

    ?>
        echo "<script>
                window.location.assign('pay.php');
                </script>";    
    <?php
        } else {
            echo "<div class='alert alert-danger text-center col-md-10 mx-auto'>Try Again.</div>";
        }
    }
    ?>
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form class="form-contact contact_form" action="" method="post" id="request" enctype="multipart/form-data" novalidate="novalidate">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="age" id="age" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your age'" placeholder="Age">
                                </div>
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
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <div class="col-12 px-0 mb-5">
                                        <legend class="form-control border border-dark textarea pt-2">Choose Appointment Date
                                            <input class="mt-3" type="date" name="book_date" id="appointmentdate" min="<?php echo date('Y-m-d'); ?>">
                                        </legend>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <div class="col-12 px-0">
                                        <legend class="form-control border border-dark textarea pt-2">Choose Appointment Time
                                            <input class="mt-3" type="time" name="book_time" id="appointmenttime">
                                        </legend>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control border border-dark textarea" name="description" id="description" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder="Enter Description">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Pay</button>
                            
                        </div>
                    </form>
                </div>
                <div class="col-lg-1">
                </div>
                <div class="col-lg-3">
                    <img src="../Appointment.png" alt="#">
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function checkValues() {
        var name = document.getElementById('name').value;
        var age = document.getElementById('age').value;
        var tellgender = document.getElementById('tellgender').value;
        var address = document.getElementById('address').value;
        var appointmentdate = document.getElementById('appointmentdate').value;
        var appointmenttime = document.getElementById('appointmenttime').value;
        var description = document.getElementById('description').value;

        if (name == '' || age == '' || tellgender == '' || address == '' || appointmentdate == '' || appointmenttime == '' || description == '') {
            alert('Please fill complete form.');
            return false;
        }

    }
</script>
<?php
require('footer.php');

?>