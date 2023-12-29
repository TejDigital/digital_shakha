<?php require('./includes/header.php'); ?>
<?php require('./admin/config/dbcon.php'); ?>
<?php
// if (isset($_SESSION['digital_msg'])) {
//     echo "<script>alert('" . $_SESSION['digital_msg'] . "')</script>";
//     unset($_SESSION['digital_msg']);
// }
?>
<section class="contact_1">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0">
            <div class="col-md-6 p-0">
                <div class="img">
                    <img src="./assets/images/contact.png" alt="">
                </div>
            </div>
            <div class="col-md-6 p-0">
                <div class="text">
                    <div class="heading">
                        <h1>Contact Us</h1>
                        <p> Let's Connect</p>
                        <p>For any specific inquiries or feedback, please utilize our convenient online form below. Our team is committed to responding promptly and providing the information or assistance you seek.</p>
                    </div>
                    <div class="inputs form-click">
                        <form class="formID" id="contactFrom" name="uploader">
                            <input type="text" name="full_name" placeholder="Full Name" class="input_box" >
                            <input type="number" name="mobile" placeholder="Contact Number" class="input_box" >
                            <input type="email" name="email" placeholder="Email Address" class="input_box" >
                            <textarea cols="30" rows="5" name="message" class="input_box" placeholder="Your Message" ></textarea>
                            <button class="btn_contact" type="submit" name="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact_2">
    <div class="container">
        <div class="heading">
            <p>We value your connection and are here to provide the support and information you need. Whether you're a prospective learner, a partner, or simply interested in what we do, feel free to reach out.</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <p>OFFICE ADDRESS</p>
                    <p>PLOT - 490-B, cross, Street 25, main road, Smriti Nagar, Bhilai, Chhattisgarh 490020</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p>PHONE</p>
                    <p><a href="#!">+91 93XXX XXX32</a></p>
                    <p><a href="#!">0788 4XXXX22</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p>EMAIL ADDRESS</p>
                    <p><a href="#!">info@digitalshakha.in</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="head">
                <p>Department Contacts:</p>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p>ADMISSIONS</p>
                    <p><a href="#!">hr.digitalshakha@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p>PROGRAMS</p>
                    <p><a href="#!">info.digitalshakha@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p>EMAIL ADDRESS</p>
                    <p><a href="#!">marketing.digitalshakha@gmail.com</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>We look forward to hearing from you and assisting you in any way we can. Your input is important to us and helps us continually improve our services.</p>
            </div>
        </div>
        <div class="row end_text">
            <div class="col-md-12 d-flex align-items-center justify-content-center flex-column">
                <p>“Your career may not have begun here, but we're <br> here to refine and reshape it for a brighter future”</p>
                <div class="img">
                    <img src="./assets/images/digital_logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<?php require('./includes/end_html.php'); ?>