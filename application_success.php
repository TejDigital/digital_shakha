<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');

if (!isset($_SESSION['std_auth']) || $_SESSION['std_auth'] !== true) {
    echo '<script>window.location.href = "index.php";</script>';
    exit(); // Stop further execution
}

?>

<section class="app_success_1">
    <div class="container">
        <div class="heading">
            <h1>Application</h1>
            <p>Candidate Application Form</p>
        </div>
        <div class="img">
            <img src="./assets/images/application_successfull_img.png" alt="">
        </div>
        <div class="bottom_text">
            <h1>Submitted Successfully ! </h1>
            <p>We appreciate your interest in our program.</p>
            <p>Next Steps</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <h1>Application Confirmation</h1>
                    <p>Please check your email for a confirmation of your application submission. Ensure it doesn't end up in your spam folder, if not found.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h1>Application Review</h1>
                    <p>Our admissions team will carefully review your application to ensure that all required information is provided.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h1>Connect with You</h1>
                    <p>Expect a follow-up from us within 3 to 5 business days. We'll reach out to you regarding the status of your application and provide addition details.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="arrow_img">
        <img src="./assets/images/arrow-line.png" alt="">
    </div>
</section>
<section class="app_success_1">
    <div class="container">
        <div class="text">
            <p>If you have any questions, concerns, or require assistance, our dedicated support team is here to help.</p>
            <a href="./contact.php">Contact Us for any Support <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<?php require('./includes/end_html.php');?>