<?php require('./includes/header.php'); 

?>
<section class="internship_track_1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text">
                    <h1>Internship Track</h1>
                    <p>Chart Your Path to Success</p>
                    <p>Our Internship Tracks offer you the opportunity to not only gain valuable work experience but also track your journey to success. As an intern at DigitalShakha, you can enjoy a host of benefits:</p>
                </div>
            </div>
            <div class="col-md-6 dot-position d-flex align-content-center justify-content-center">
                <div class="img">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <img src="./assets/images/internship_track_bg_1.png" alt="">
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="internship_track_2">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Track Progress</h1>
                <?php
                if (!isset($_SESSION['std_auth']) || !$_SESSION['std_auth']) {
                ?>
                    <a href="#!" class="login_popup">Login First<i class="fa-solid fa-arrow-up-right-from-square"></i></a>

                <?php
                } else {
                ?>

                <?php
                }
                ?>
            </div>
            <div class="list">
                <ul>
                    <li>View your dedicated time spent.</li>
                    <li>Access monthly grades and feedback from mentors.</li>
                    <li>Read graded reviews to understand your strengths and areas for improvement.</li>
                    <li>Unlock achievement milestones.</li>
                    <li>Download certificates for your accomplishments.</li>
                    <li>Keep an eye on your program completion status.</li>
                </ul>
            </div>
            <div class="login-btn">
            <?php
                if (!isset($_SESSION['std_auth']) || !$_SESSION['std_auth']) {
                    ?>
                    <a href="#!" class="login_popup">Login</a>
                    <?php
                } else {
                    ?>
                    <a href="./internship_track_1.php">Track</a>

                <?php
                }
                ?>
            </div>
            <div class="new-apply-btn">
                <p>Not an Intern at digitalshakha? <a href="./application_1.php">Apply for internship here.</a></p>
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
    </div>
</section>
<section class="home_4">
    <div class="container">
        <div class="heading">
            <h1>Let’s craft cool things</h1>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="text">
                        <div>
                            <p>Let us help you build delightfulexperiences to propel yourcompany's growth.</p>
                            <p>We're just one message away.</p>
                        </div>
                        <a href="./contact.php">Get in touch <img src="./assets/images/arrow.png" alt=""></a>
                    </div>
                </div>
                <div class="padding-top col-md-6 d-flex align-items-center justify-content-center">
                    <div class="img_area">
                        <div class="img">
                            <img src="./assets/images/Rectangle 6.png" alt="">
                        </div>
                        <div class="img">
                            <img src="./assets/images/Rectangle 7.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<?php require('./includes/end_html.php'); ?>