<?php
require('header.php');
if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
}
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
                    <h1 class="display-1 font-weight-bold text-success">Appointment Report</h1>
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
                        
                        $q = "select  user.name from `appointment` left join `user` on `appointment`.user_id=`user`.id where appointment.user_id='$uid'";
                    
                        $result = mysqli_query($conn, $q);
                        foreach ($result as $data) {
                        ?>
                        
                         <thead class="table-success">
                        <tr>
                            
                            <!-- <th scope="col">User's Login name </th> -->
                            <td class="h2">Welcome <?php echo $data['name']; ?></td>
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
                            <th scope="col">Appointment no.</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Hospital Name</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Appoinement Date</th>
                            <th scope="col">Appoinement Time</th>
                            <th scope="col">Description</th>
                            <!-- <th scope="col">Report</th> -->
                            <th scope="col">Created At</th>
                            <!-- <th scope="col">Employee</th> -->
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";
                        $q = "select appointment.* ,emp.name as e_name , hospital.hospital_name from appointment left join hospital on appointment.hospital_id = hospital.id left join emp on appointment.employee_id = emp.id where appointment.user_id = $uid";
                        $result = mysqli_query($conn, $q);
                        
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <td scope="row"><?php echo $data['id']; ?></td>
                                <td><?php echo $data['patient_name']; ?></td>
                                <td><?php echo $data['hospital_name']; ?></td>
                                <td><?php echo $data['e_name']; ?></td>
                                <td><?php echo $data['book_date']; ?></td>
                                <td><?php echo $data['book_time']; ?></td>
                                <td><?php echo $data['description']; ?></td>
                                <td><?php echo $data['createdat']; ?></td>
                                <!-- <td><?php if ($data['e_name']) {
                                        echo $data['e_name'];
                                    } else {
                                        echo "Pending";
                                    } ?></td> -->
                                <td><?php  if ($data['status'])
                                {echo $data['status'];
                                }
                                else{
                                    echo "pending";
                                }
                                 ?></td>
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