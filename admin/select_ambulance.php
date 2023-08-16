<?php
require('header.php');
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<main class="h3">
    <div class="py-5">
        <div class="row">
            <div class="col-md-6 mx-5">
                <div class="titlepage mx-auto">
                    <h1 class="display-1 font-weight-bold text-success">Ambulances</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mx-auto">
        <section class="contact-section py-1">
            <div class="container">
                <div class="row">
                    <?php
                    if (isset($_GET['msg'])) {
                        echo "<div class='col-12 alert alert-info'>" . $_GET['msg'] . "</div>";
                    }
                    ?>
                    <table class="table table-bordered col-8">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require "../config.php";
                            $q = "select * from `ambulance`";
                            $result = mysqli_query($conn, $q);
                            $i = 1;
                            foreach ($result as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $data['id']; ?></th>
                                    <td><?php echo $data['city']; ?></td>
                                    <td><?php echo $data['state']; ?></td>
                                    <td><?php echo $data['contact']; ?></td>
                                    <td><a href="edit_ambulance.php ?id=<?php echo $data['id']; ?>" <button type="button" class="valid border border-success button button-contactForm boxed-btn">Edit</button></a></td>
                                    <td><a href="delete_ambulance.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="text-danger"><button type="button" class="valid border border-success button button-contactForm boxed-btn">Delete</button>
                                        </a></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="mx-auto col-4 my-5 py-5 pl-5">
                        <img src="../OIP.jpeg" alt="#">
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<?php
require('footer.php');
?>