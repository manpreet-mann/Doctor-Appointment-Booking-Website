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
                    <h3 class="display-1 font-weight-bold text-success">Hospitals</h3>
                </div>
            </div>
        </div>
    </div>
    <section class="contact-section py-1">
        <div class="container h4">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" type="text" name="city" placeholder="Enter City" id="city">
                                </div>
                            </div>
                            <div class="col-12 mx-auto form-group ml-4">
                                <center><button name="btn" class="valid border border-success button button-contactForm boxed-btn" onclick = "return checkValues()">Search</button></center>
                            </div>
                            <?php
                            require "../config.php";
                            if (isset($_REQUEST['btn'])) {
                                $city = $_REQUEST['city'];
                                $query = "SELECT * from `hospital` where `city`='$city'";
                                // } else {
                                //     $query = "SELECT * from `hospital`";
                                // }

                                $ress = mysqli_query($conn, $query);

                            ?>
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <tr class="table-success">
                                            <th>Sr. no</th>
                                            <th>Hospital Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Availability</th>
                                        </tr>
                                        <?php
                                        $sno = 1;

                                        while ($data = mysqli_fetch_array($ress)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sno ?></td>
                                                <td><?php echo $data['hospital_name'] ?></td>
                                                <td><?php echo $data['address'] ?></td>
                                                <td><?php echo $data['city'] ?></td>
                                                <td><?php echo $data['phone'] ?></td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td><a href="check_availability.php ?id=<?php echo $data['id'];?>" button type="button" class="valid border border-success button button-contactForm boxed-btn">Check Availability</button></a></td>
                                                <!-- <td><Button onclick="call()">Call</Button></td>
                                        <input type="hidden" id="id1" value="<?php echo $data['contact'] ?>"> -->
                                            </tr>
                                    <?php
                                            $sno++;
                                        }
                                    }
                                    ?>

                                    </table>
                                </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
</main>
<script>
    function checkValues() {
        var city = document.getElementById('city').value;

        if (city == '') {
            alert('Please fill complete form.');
            return false;
        }
    }
</script>
<?php
require('footer.php');
?>