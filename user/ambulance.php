<?php
require('header.php');
?>
<style>
    body {
        overflow-x: hidden !important;
    }
</style>
<div class="py-5">
    <div class="row">
        <div class="col-md-6 mx-5">
            <div class="titlepage mx-auto">
                <h2 class="display-1 font-weight-bold text-success">Emergency</h2>
            </div>
        </div>
    </div>
</div>
<section class="contact-section py-1">
    <div class="container h3">
        <div class='col-12 alert alert-success text-center'>
            <h2 style="color: green;">Ambulance</h2>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control valid border border-dark" type="text" name="city" placeholder="Enter City" id="city">
                            </div>
                        </div>
                        <div class="form-group ml-4 mx-auto">
                            <button name="btn" class="valid border border-success button button-contactForm boxed-btn " onclick = "return checkValues()">Search</button>
                        </div>
                        <?php
                        require "../config.php";
                        if (isset($_REQUEST['btn'])) {
                            $city = $_REQUEST['city'];
                            $query = "SELECT * from `ambulance` where `city`='$city'";
                            // } else {
                            //     $query = "SELECT * from `ambulance`";
                            // }

                            $ress = mysqli_query($conn, $query);
                        ?>
                            <div class="col-12">
                                <table class="table font2 table-borderless table-hover">
                                    <tr>
                                        <th>Sr. no</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Contact</th>
                                    </tr>
                                    <?php
                                    $sno = 1;
                                    while ($data = mysqli_fetch_array($ress)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $sno ?></td>
                                            <td><?php echo $data['city'] ?></td>
                                            <td><?php echo $data['state'] ?></td>
                                            <td><?php echo $data['contact'] ?></td>
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
</section>

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