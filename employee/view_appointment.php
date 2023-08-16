<?php
require('header.php');
if (isset($_SESSION['hospital_id'])) {
    $hid = $_SESSION['hospital_id'];
}
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<main>
    <div class="py-5">
        <div class="row">
            <div class="col-md-12 mx-5">
                <div class="titlepage mx-auto">
                    <h1 class="display-1 font-weight-bold text-success">Appointments Details</h1>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <section class="contact-section py-1">
        <div class="container h2">
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
                            <th scope="col">Patient Name</th>
                            <th scope="col">Doctor Name</th>
                            <!-- <th scope="col">Hospital</th> -->
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Appointment Time</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col" colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";

                        $q = "select appointment.*, emp.name as e_name from `appointment` left join `emp` on `appointment`.employee_id=`emp`.id left join hospital on emp.hospital_name =`hospital`.hospital_name where hospital.id='$hid'";

                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <!-- <th scope="row"><?php echo $data['id']; ?></th> -->
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['patient_name']; ?></td>
                                <td><?php echo $data['e_name']; ?></td>
                                <!-- <td><?php echo $data['hospital_name']; ?></td> -->
                                <td><?php echo $data['book_date']; ?></td>
                                <td><?php echo $data['book_time']; ?></td>
                                <td><?php echo $data['description']; ?></td>
                                <td><?php echo $data['createdat']; ?></td>
                                <td> <a style="color:black" href="edit_appointment.php?id=<?php echo $data['id']; ?>"><?php echo $data['status']; ?></a></td>
                                <!-- <td><?php
                                if($data['status'] == " "){
                                    ?>
                                    <a href="accept.php?id= <?php echo $data['id'];?>"  class='valid border border-success button button-contactForm boxed-btn'>Accept</a>
                                 </td>
                                 <td>
                                 <a href="reject.php?id= <?php echo $data['id'];?>"  class='valid border border-success button button-contactForm boxed-btn'>Reject</a>
                        <?php
                        }
                        else{
                            echo $data['status'];  
                        }
                        ?> 
                    </td> -->
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