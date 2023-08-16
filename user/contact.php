<?php
require('header.php');
?>
<main>
    <div class="py-5">
        <div class="row" style="width: 100%;">
            <div class="col-md-6 mx-5">
                <div class="titlepage mx-auto">
                    <h1 class="display-1 font-weight-bold text-success">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End -->
    <!--?  Contact Area start  -->
    <section class="contact-section py-1">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_POST['button'])) {
                    require "../config.php";
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $q = "Insert into `contact`(`name`, `email`, `phone`, `subject`, `message`) values ('$name', '$email', '$phone', '$subject', '$message')";
                    $result = mysqli_query($conn, $q);
                    if ($result > 0) {
                ?>
                        <div class='alert alert-success text-center col-md-12'>Data Inserted.</div>
                <?php
                    } else {
                        echo "<div class='alert alert-danger text-center col-md-12'>Try Again.</div>";
                    }
                }
                ?>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="" method="post" id="request" novalidate="novalidate" name="myform">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control border border-dark" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100 border border-dark" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control valid border border-dark" name="phone" id="phone" type="phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'" placeholder="Enter Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="valid border border-success button button-contactForm boxed-btn" name="button" onclick="return checkValues()">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Jalandhar, India</h3>
                            <p>IKGPTU</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+91 1236547895</h3>
                            <p>Open 24/7 to help you</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>curenation27@gmail.com</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function checkValues() {
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        if (subject == '' || message == '' || name.value == '' || email.value == '' || phone.value == '') {
            alert('Please fill complete form.');
            return false;
        }

        var emaipatt = /^[a-zA-Z0-9\.\_\-]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/;
        if (!emaipatt.test(email)) {
            alert('Enter Valid Email');
            return false;
        }

        var contactpatt = /^[6-9]{1}[0-9]{9}$/;
        if (!contactpatt.test(phone)) {
            alert('Enter Valid Phone Number without code.');
            return false;
        }
    }
</script>
<?php
require('footer.php');
?>