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
                    <h1 class="display-1 font-weight-bold text-success">User Data</h1>
                </div>
            </div>
        </div>
    </div>
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
                            <th scope="col">User Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Address Proof</th>
                            <th scope="col">ID Proof</th>
                            <th scope="col">Block</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";
                        $q = "select * from `user`";
                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <th scope="row"><?php echo $data['id']; ?></th>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td><?php echo $data['age']; ?></td>
                            <td><?php echo $data['gender']; ?></td>
                            <td><?php echo $data['address']; ?></td>
                            <td><img class="img img-fluid" style="height:50px; width:60px" src="../upload/<?php echo $data['addressproof']; ?>" alt=""></td>
                            <td><img class="img img-fluid" style="height:50px; width:60px" src="../upload/<?php echo $data['id_proof']; ?>" alt=""></td>
                            <?php
                            if (@$data['status'] == 'Active') {
                            ?>
                                <td><a href="block_user.php?id=<?php echo $data['id']; ?>" class="valid border border-success button button-contactForm boxed-btn">Block</a></td>
                            <?php
                            } else {
                            ?>
                                <td><a href="unblock_user.php?id=<?php echo $data['id']; ?>" class="valid border border-success button button-contactForm boxed-btn">Unblock</a></td>
                            <?php
                            }
                            ?>
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