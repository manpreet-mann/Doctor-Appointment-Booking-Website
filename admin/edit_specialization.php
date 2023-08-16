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
                    <h1 class="display-1 font-weight-bold text-success">Edit Hospital</h1>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="col-lg-12">
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                require '../config.php';
                $id = $_GET['id'];
                $q = "select * from `specialization` where id = '$id'";
                $result = mysqli_query($conn, $q);
                $data = mysqli_fetch_assoc($result);
                if (isset($_POST['button'])) {
                    $specialization_name = $_POST['specialization_name'];
                    $q = "update `specialization` set `specialization_name` = '$specialization_name' where id = '$id'";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                        echo "<script>window.location.assign('select_specialization.php?msg=Record Updated');</script>";
                    } else {
                        echo "<script>window.location.assign('select_specialization.php?msg=Try Again.');</script>";
                    }
                }
                ?>
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="row form-group">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="specialization_name" id="specialization_name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Specialization'" placeholder="Enter Specialization" value="<?php echo $data['specialization_name'] ?>">
                                    </div>
                                    <div class="form-group ml-4">
                                        <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
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