<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');
?>
<section class="program_option_1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text">
                    <h1>Program Options</h1>
                    <p>Discover Your Path to Success with Digitalshakha's Programs</p>
                    <p>Digitalshakha offers a rich array of programs designed to catapult your career in the digital world. Our comprehensive programs are meticulously crafted to equip you with the skills and expertise you need to thrive in the industry. Whether you're a tech enthusiast, a creative mind, or a data aficionado, we have the perfect program for you.</p>
                </div>
            </div>
            <div class="col-md-6 dot-position d-flex align-content-center justify-content-center">
                <div class="img">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <img src="./assets/images/program_option_bg_1.png" alt="">
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_option_2">
    <div class="container">
        <div class="heading">
            <h1>Explore the Possibilities</h1>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            <?php
            $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                while ($data = mysqli_fetch_assoc($sql_run)) {
            ?>
                    <div class="col-md-3 p-2">
                        <a href="./program_view.php?id=<?= $data['program_id'] ?>">
                            <div class="box">
                                <div class="text">
                                    <h4><?= $data['program_name'] ?></h4>
                                    <p><?= $data['program_detail'] ?></p>
                                </div>
                                <div class="img">
                                    <img src="./admin/program_images/<?= $data['program_image'] ?>" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
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
<section class="opportunities_4">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Innovative Projects and Challenges</h1>
                <p>Challenge Yourself, Ignite Innovation</p>
            </div>
            <div class="col-md-7">
                <p>
                    Innovation thrives on challenges. At DigitalShakha, we provide a platform for you to immerse yourself in innovative projects and real-world challenges. These experiences not only enhance your problem-solving abilities but also allow you to apply your skills in practical scenarios.
                </p>
            </div>
            <div class="col-md-5">
                <p> What to Expect:</p>
                <ul>
                    <li> Collaborate with industry experts.</li>
                    <li>Solve real challenges faced by businesses.</li>
                    <li>Gain hands-on experience.</li>
                    <li>Elevate your skills to a new level.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="heading">
                <h1>Complementary Professional Development Programs</h1>
                <p>Challenge Yourself, Ignite Innovation</p>
            </div>
            <div class="col-md-7">
                <p>Your career journey doesn't end with a degree; it's a continuous path of growth. DigitalShakha's Professional Development Programs are designed to elevate your skills, foster leadership, and prepare you for success in your chosen field.</p>
            </div>
            <div class="col-md-5">
                <p>Why Professional Development?</p>
                <ul>
                    <li>Gain expertise beyond traditional education.</li>
                    <li>Develop leadership and management skills.</li>
                    <li>Stay ahead of industry trends.</li>
                    <li>Unlock new career opportunities.</li>
                </ul>
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
                        <a href="#!">Get in touch <img src="./assets/images/arrow.png" alt=""></a>
                    </div>
                </div>
                <div class="padding-top col-md-6 d-flex align-items-center justify-content-start">
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