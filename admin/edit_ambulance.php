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
                    <h1 class="display-1 font-weight-bold text-success">Edit Ambulance</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mx-auto">
        <section class="contact-section py-1">
            <div class="container">
                <div class="row">
                    <?php
                    require '../config.php';
                    $id = $_GET['id'];
                    $q = "select * from `ambulance` where id = '$id'";
                    $result = mysqli_query($conn, $q);
                    $data = mysqli_fetch_assoc($result);
                    if (isset($_POST['button'])) {
                        $city = $_POST['city'];
                        $state = $_POST['state'];
                        $contact = $_POST['contact'];
                        $q = "update `ambulance` set `city` = '$city', `state` = '$state', `contact` = '$contact' where id = '$id'";
                        $result = mysqli_query($conn, $q);
                        if ($result > 0) {
                            echo "<script>window.location.assign('select_ambulance.php?msg=Record Updated');</script>";
                        } else {
                            echo "<script>window.location.assign('select_ambulance.php?msg=Try Again.');</script>";
                        }
                    }
                    ?>
                    <div class="col-lg-6">
                        <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid border border-dark" name="city" id="city" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter City'" placeholder="Enter City" value="<?php echo $data['city'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid border border-dark" name="state" id="state" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter State'" placeholder="Enter State" value="<?php echo $data['state'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid border border-dark" name="contact" id="contact" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number" value="<?php echo $data['contact'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ml-4">
                                        <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick = "return checkValues()">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-3">
                        <img src="../OIP.jpeg" alt="#">
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    function checkValues() {
        var city = document.getElementById('city').value;
        var state = document.getElementById('state').value;
        var contact = document.getElementById('contact').value;

        if (city == '' || state == '' || contact == '') {
            alert('Please fill complete form.');
            return false;
        }
    }
</script>


<?php
require('footer.php');
?>