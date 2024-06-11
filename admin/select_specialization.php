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
                    <h1 class="display-1 font-weight-bold text-success">Specialization Record</h1>
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
                ?>
                <table class="table table-bordered h3">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../config.php";
                        $q = "select * from `specialization`";
                        $result = mysqli_query($conn, $q);
                        $i = 1;
                        foreach ($result as $data) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $data['id']; ?></th>
                                <td><?php echo $data['specialization_name']; ?></td>
                                <td><a href="edit_specialization.php ?id=<?php echo $data['id']; ?>" <button type="button" class="valid border border-success button button-contactForm boxed-btn">Edit</button></a></td>
                                <td><a href="delete_specialization.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="text-danger"><button type="button" class="valid border border-success button button-contactForm boxed-btn">Delete</button>
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
<script>
    function checkValues() {
        var specialization_name = document.getElementById('specialization_name').value;

        if (specialization_name == '') {
            alert('Please fill complete form.');
            return false;
        }
</script>
<?php
require('footer.php');
?>