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
        <div class="row" style="width: 100%;">
            <div class="col-md-6 mx-5 my-5">
                <div class="titlepage mx-auto">
                    <h1 class="display-1 font-weight-bold text-success">Appointment</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['msg'])) {
                    echo "<div class='col-12 alert alert-info'>" . $_GET['msg'] . "</div>";
                }
                require '../config.php';
                if (isset($_REQUEST['id'])) {
                    $id = $_GET['id'];
                    $q2 = "select appointment.*,user.name,user.email,user.phone,user.address,user.age from `appointment` inner join `user` on appointment.user_id=user.id   where appointment.id='$id'";
                    $result2 = mysqli_query($conn, $q2);
                    $data = mysqli_fetch_array($result2);
                }
                ?>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" value="<?php echo $data['name'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="phone" id="phone" type="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number" value="<?php echo $data['phone'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" value="<?php echo $data['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="age" id="age" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your age'" placeholder="Age" value="<?php echo $data['age'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="address" id="address" type="textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address'" placeholder="Enter Address" value="<?php echo $data['address'] ?>" readonly>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="book_date" id="date" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" placeholder="" value="<?php echo $data['book_date'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="book_time" id="time" type="time" onfocus="this.placeholder = ''" onblur="this.placeholder = ''" placeholder="" value="<?php echo $data['book_time'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select name="employee" class="form-control border-dark contactus pt-2">
                                    <option selected disabled>Select Doctor</option>
                                    <?php
                                    $eq = "Select * from `emp`";
                                    $res1 = mysqli_query($conn, $eq);
                                    while ($d1 = mysqli_fetch_array($res1)) {
                                    ?>
                                        <option value="<?php echo $d1['id'] ?>"><?php echo $d1['name'] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group ml-4">
                                <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require('footer.php');
if (isset($_REQUEST['button'])) {
    $emp_id = $_REQUEST['employee'];
    echo $uq = "Update `appointment` set `employee_id`=$emp_id, `status`='Employee Assigned' where `id`='$id'";
    $res = mysqli_query($conn, $uq);
    if ($res > 0) {
        echo "<Script>window.location.assign('appointment_data.php?msg=Employee Assigned')</script>";
    } else {
        echo "<Script>window.location.assign('appointment_data.php?msg=Error!! Try again later.')</script>";
    }
}
?>
?>