<?php require('./includes/header.php'); ?>

<section class="log_reg_1">
    <div class="container-fluid px-0">
        <div class="row px-0">
            <div class="col-md-6 mx-0">
                <div class="img">
                    <img src="./assets/images/login_bg.png" alt="">
                </div>
            </div>
            <div class="col-md-6 mx-0 d-flex justify-content-center align-items-center">
                <div class="text">
                    <div class="heading">
                        <h1>Reset your password</h1>
                        <p>Changing password for: <b> <?php if (isset($_GET['email'])) {
                                                            echo $_GET['email'];
                                                        } ?></b></p>
                    </div>
                    <div class="input_area">
                        <form  id="std_reset_password" >
                            <input type="hidden" name="new_forget_email" value="<?php if (isset($_GET['email'])) {echo $_GET['email'];} ?>">
                            <input type="hidden" name="token" value="<?php if (isset($_GET['token'])) {echo $_GET['token'];} ?>">
                            <div class="form-group">
                                <input type="password" class="input_box" name="password" placeholder="Create Password" >
                                <span class="material-symbols-outlined">
                                    lock
                                </span>
                            </div>
                            <p>Between 8 and 64 characters</p>
                            <div class="form-group">
                                <input type="text" class="input_box" id="c_pass" name="confirm_password" placeholder="Confirm Password" >
                                <span class="material-symbols-outlined">
                                    lock
                                </span>
                            </div>
                            <button type="submit" id="resetBtn" name="add_pass">Change Password</button>
                        </form>
                    </div>
                    <div class="end">
                        <p>Have trouble logging in? <a href="./contact.php">Contact Help Center</a></p>
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
                <div class="col-md-6 d-flex align-content-center justify-content-center">
                    <div class="text">
                        <div>
                            <p>Let us help you build delightfulexperiences to propel yourcompany's growth.</p>
                            <p>We're just one message away.</p>
                        </div>
                        <a href="./contact.php">Get in touch <img src="./assets/images/arrow.png" alt=""></a>
                    </div>
                </div>
                <div class="padding-top col-md-6 d-flex align-content-center justify-content-center">
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