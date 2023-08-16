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
                    <h1 class="display-1 font-weight-bold text-success">Doctor's Record</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container h5">
            <div class="row">
                <?php
                if (isset($_GET['msg'])) {
                    echo "<div class='col-12 alert alert-info'>" . $_GET['msg'] . "</div>";
                }
                ?>
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">Doctor's id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Hospital</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Address Proof</th>
                            <th scope="col">ID Proof</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";
                        $q = "select * from `emp`";
                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $data['id']; ?></th>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['specialization']; ?></td>
                                <td><?php echo $data['hospital_name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['phone']; ?></td>
                                <td><?php echo $data['age']; ?></td>
                                <td><?php echo $data['gender']; ?></td>
                                <td><?php echo $data['address']; ?></td>
                                <td><img class="img img-fluid" style="height:50px; width:60px" src="../upload/<?php echo $data['addressproof']; ?>" alt=""></td>
                                <td><img class="img img-fluid" style="height:50px; width:60px" src="../upload/<?php echo $data['id_proof']; ?>" alt=""></td>
                                <td><a href="edit_employee.php ?id=<?php echo $data['id']; ?>" button type="button" class="valid border border-success button button-contactForm boxed-btn">Edit</button></a></td>
                                <td><a href="delete_employee.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="text-danger"><button type="button" class="valid border border-success button button-contactForm boxed-btn">Delete</button>
                                    </a></td>
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