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
                    <h1 class="display-1 font-weight-bold text-success">Add Ambulance</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <section class="contact-section py-1">
            <div class="container">
                <div class="row">
                    <?php
                    if (isset($_POST['button'])) {
                        require "../config.php";
                        $city = $_POST['city'];
                        $state = $_POST['state'];
                        $contact = $_POST['contact'];
                        $q = "Insert into `ambulance`(`city`, `state`, `contact`) values ('$city', '$state', '$contact')";
                        $result = mysqli_query($conn, $q);
                        if ($result > 0) {
                    ?>
                            <div class='alert alert-success text-center col-md-12'>Ambulance Added</div>
                    <?php
                        } else {
                            echo "<div class='alert alert-danger text-center col-md-12'>Try Again.</div>";
                        }
                    }
                    ?>
                    <div class="col-lg-6">
                        <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid border border-dark" name="city" id="city" type="text" pattern="[A-Za-z\s]+" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter City'" placeholder="Enter City" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid border border-dark" name="state" id="state" type="text" pattern="[A-Za-z\s]+" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter State'" placeholder="Enter State">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid border border-dark" name="contact" id="contact" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group ml-4">
                                        <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Add</button>
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