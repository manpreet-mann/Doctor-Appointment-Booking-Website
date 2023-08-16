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
                    <h1 class="display-1 font-weight-bold text-success">Add Specialization</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_POST['button'])) {
                    require "../config.php";
                    $specialization_name = $_POST['specialization_name'];
                    $q = "Insert into `specialization`(`specialization_name`) values ('$specialization_name')";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                ?>
                        <div class='alert alert-success text-center col-md-12'>Specialization Added</div>
                <?php
                    } else {
                        echo "<div class='alert alert-danger text-center col-md-12'>Try Again.</div>";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="specialization_name" id="specialization_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Specialization'" placeholder="Enter Specialization">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
    }
</script>
<?php
require('footer.php');
?>