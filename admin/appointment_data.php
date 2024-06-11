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
                    <h3 class="display-1 font-weight-bold text-success">Appointment Data</h3>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container h2">
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <!-- <th scope="col">######## </th> -->
                        <!-- <td class="h2">Welcome to Admin Page.....</td>S -->
                    </tr>
                </thead>
            </table>
            <div class="row">
                <?php
                if (isset($_GET['msg'])) {
                    echo "<div class='col-12 alert alert-info'>" . $_GET['msg'] . "</div>";
                }
                ?>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">Appointment no.</th>
                            <th scope="col">User</th>
                            <th scope="col">Hospital</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Appointment Time</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <!-- <th scope="col">Report</th> -->
                            <th scope="col">Created At</th>
                            <!-- <th scope="col">Doctor</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";
                        $q = "select appointment.*, user.name as u_name, hospital.hospital_name, emp.name as e_name from `appointment` left join emp on appointment.employee_id=`emp`.id left join hospital on appointment.hospital_id=hospital.id left join user on appointment.user_id = user.id";
                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $data['id']; ?></td>
                                <td><?php echo $data['u_name']; ?></td>
                                <td><?php echo $data['hospital_name']; ?></td>
                                <td><?php echo $data['book_date']; ?></td>
                                <td><?php echo $data['book_time']; ?></td>
                                <td><?php echo $data['description']; ?></td>
                                <td><?php echo $data['status']; ?> <a href="edit_appointment.php?id=<?php echo $data['id']; ?>"><i class="fa fa-pencil-square text-success fa-2x" aria-hidden="true"></i></a></td>
                                <td><?php echo $data['createdat']; ?></td>
                                <!-- <td><?php if ($data['e_name']) {
                                        echo $data['e_name'];
                                    } else {
                                        echo "<a href='assign_employee.php?id=" . $data['id'] . "' class='valid border border-success button button-contactForm boxed-btn'>Assign Doctor</a>";
                                    ?>
                                    <?php
                                    } ?></td> -->
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</main>
<?php
require('footer.php');
?>