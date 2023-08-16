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
                <h3 class="color: green;">Edit Appointment</h3>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                require '../config.php';
                $id = $_GET['id'];
                $q = "select * from `appointment` where id = '$id'";
                $result = mysqli_query($conn, $q);
                $data = mysqli_fetch_assoc($result);
                if (isset($_POST['button'])) {
                    $patient_name = $_POST['patient_name'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $book_date = $_POST['book_date'];
                    $book_time = $_POST['book_time'];
                    $description = $_POST['description'];

                    $q = "update `appointment` set `patient_name` = '$patient_name', `age` = '$age', `gender` = '$gender', `book_date` = '$book_date', `book_time` = '$book_time', `description` = '$description' where id = '$id'";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                        echo "<script>window.location.assign('view_appointment.php?msg=Record Updated');</script>";
                    } else {
                        echo "<script>window.location.assign('view_appointment.php?msg=Try Again.');</script>";
                    }
                }
                ?>
                <div class="col-lg-6">
                    <form class="form-contact contact_form" action="" method="post" id="request" enctype="multipart/form-data" novalidate="novalidate">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="patient_name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" value="<?php echo $data['patient_name'] ?>">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="age" id="age" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your age'" placeholder="Age" value="<?php echo $data['age'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <fieldset>
                                    <legend class="form-control border border-dark">Select Gender
                                        <div>
                                            <input type="radio" name="gender" id="tellgender" value="m" name="gender" <?php if ($data['gender'] == 'm') { echo "checked"; } ?>> Male
                                            <input type="radio" name="gender" id="tellgender" value="f" name="gender" <?php if ($data['gender'] == 'f') { echo "checked"; } ?>> Female
                                            <input type="radio" name="gender" id="tellgender" value="o" name="gender" <?php if ($data['gender'] == 'o') { echo "checked"; } ?>> Other
                                        </div>
                                    </legend>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address" value="<?php echo $data['address'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <div class="col-12 px-0 mb-5">
                                        <legend class="form-control border border-dark textarea pt-2">Choose Appointment Date
                                            <input class="mt-3" type="date" name="book_date" id="appointmentdate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $data['book_date'] ?>">
                                        </legend>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <div class="col-12 px-0">
                                        <legend class="form-control border border-dark textarea pt-2">Choose Appointment Time
                                            <input class="mt-3" type="time" name="book_time" id="appointmenttime" value="<?php echo $data['book_time'] ?>">
                                        </legend>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control border border-dark textarea" name="description" id="description" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description'" placeholder="Enter Description" value="<?php echo $data['description'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="status" id="">
                                        <option value="" disabled>Select One</option>
                                        <?php
                                        if($data['status']=='PENDING' ||$data['status']=='Pending')
                                        {
                                            echo "
                                            <option selected>PENDING</option>
                                            <option>Accept</option>
                                            <option>Reject</option>";
                                        }
                                        else if($data['Accept']!=""){
                                            echo "
                                            <option disabled>PENDING</option>
                                            <option selected>Accept</option>
                                            <option>Reject</option>";
                                        }
                                        else if($data['Reject']!=""){
                                            echo "
                                            <option disabled>PENDING</option>
                                            <option disabled>Accept</option>
                                            <option selected>Reject</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Edit</button>

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
if (isset($_POST['button'])) {
    // $employee_id = $_POST['employee_id'];
    
    $status = $_POST['status'];

    $q = "Update `appointment` set `status` = '$status' where id = '$id'";
    $result1 = mysqli_query($conn, $q);
    if ($result1 > 0) {
        move_uploaded_file($location, '../upload/' . $newname);
        echo "<script>window.location.assign('view_appointment.php?msg=Record Updated');</script>";
    } else {
        echo "<script>window.location.assign('view_appointment.php?msg=Try Again.');</script>";
    }
}
?>