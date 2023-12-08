<?php require('./includes/header.php');
require('./admin/config/dbcon.php');

?>
<section class="log_reg_1">
    <div class="container-fluid px-0">
        <div class="row px-0">
            <div class="col-md-6 mx-0">
                <div class="img">
                    <img src="./assets/images/register_bg.png" alt="">
                </div>
            </div>
            <div class="col-md-6 mx-0 d-flex justify-content-center align-items-center">
                <div class="text">
                    <div class="heading">
                        <h1>Event Register</h1>
                    </div>
                    <div class="input_area">
                        <form class="event_register" id="event_register">
                            <input type="text" name="name" class="input_box" placeholder="Full Name">
                            <input type="text" name="phone" class="input_box" maxlength="10" placeholder="Contact Number" onkeypress="return event.charCode>=48 && event.charCode<=57">
                            <input type="Email" name="email" class="input_box" placeholder="Email Address">
                            <select name="event" class="input_box">
                                <option value="">Select Events</option>
                                <?php
                                $sql = "SELECT * FROM event_tbl WHERE event_status = 1";
                                $sql_run = mysqli_query($con, $sql);
                                if (mysqli_num_rows($sql_run) > 0) {
                                    foreach ($sql_run as $data) {
                                ?>
                                        <option value="<?= $data['event_id'] ?>"><?= $data['event_title'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <button type="submit">Register</button>
                        </form>
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
                        <a href="#!">Get in touch <img src="./assets/images/arrow.png" alt=""></a>
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