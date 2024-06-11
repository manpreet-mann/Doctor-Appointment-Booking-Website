<?php
 require "../config.php";
require('header.php');
$hid = $_GET['id'];
$_SESSION['hospital_id'] = $hid;

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
                    <h3 class="display-1 font-weight-bold text-success">Doctors Available</h3>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container h2">
           







        <table class="table table-bordered">
                <tbody>
                    <?php
                    require "../config.php";
                   
                    $q = " select hospital.* from hospital where id = $hid";
                    
                    $result = mysqli_query($conn, $q);
                    foreach ($result as $data) {
                    ?>
                        <thead class="table-success">
                            <tr>
                                <th scope="col"> ########</th>
                                <td class="h2">Welcome to <?php echo $data['hospital_name']; ?></td>
                            </tr>
                        </thead>
                    <?php
                        break;
                    }
                    ?>
                </tbody>
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
                            <th scope="col">Doctor id</th>
                            <th scope="col">Doctor's Name</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Fees</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Book Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        
                       
                       $q = "select  hospital.fees, emp.*, emp.name as e_name from emp,hospital where emp.hospital_name = hospital.hospital_name and hospital.id = $hid ";

                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $data['id']; ?></th>
                                <td><?php echo $data['e_name']; ?></td>
                                <td><?php echo $data['specialization']; ?></td>
                                <td><?php echo $data['fees']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['phone']; ?></td>
                                <td><?php echo $data['gender']; ?></td>
                                <td><?php echo "<a href='appointment.php?id=" . $data['id'] . "' class='valid border border-success button button-contactForm boxed-btn'>Book Appointment</a>"?> </td>
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