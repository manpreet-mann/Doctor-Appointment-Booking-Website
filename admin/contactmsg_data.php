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
                    <h1 class="display-1 font-weight-bold text-success">Contact Data</h1>
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
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";
                        $q = "select * from `contact`";
                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $data['id']; ?></th>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['phone']; ?></td>
                                <td><?php echo $data['subject']; ?></td>
                                <td><?php echo $data['message']; ?></td>
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