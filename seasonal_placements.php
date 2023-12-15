<?php 
require('./includes/header.php');
require('./admin/config/dbcon.php');

 ?>
<section class="seasonal_placements_1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text">
                    <h1>Seasonal Placements</h1>
                    <p>Your Gateway to Seasonal Internships</p>
                    <p>At DigitalShakha, we understand that career growth isn't confined to a single season. That's why we offer a range of seasonal placement opportunities that align with your academic calendar and career goals.</p>
                </div>
            </div>
            <div class="col-md-6 dot-position d-flex align-content-center justify-content-center">
                <div class="img">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <img src="./assets/images/seasonal_pacements_bg_1.png" alt="">
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="seasonal_placements_2">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Explore Our Seasonal Placements:</h1>
            </div>

            <?php
            $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_status = 1";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                while ($data = mysqli_fetch_assoc($sql_run)) {
            ?>
                    <div class="col-md-6">
                        <div class="box">
                            <a href="./placement_view.php?id=<?=$data['placement_id']?>">
                                <div class="head">
                                    <h1><?=$data['placement_name']?></h1>
                                    <p><?=$data['placement_detail']?></p>
                                    <p><b>Start Date: <span><?=$data['placement_date']?></span></b></p>
                                </div>
                                <div class="img">
                                    <img src="./admin/seasonal_placement_images/<?=$data['placement_front_image']?>" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <!-- <div class="col-md-6">
                <div class="box">
                    <a href="./placement_view.php">
                        <div class="head">
                            <h1>Summer Internships</h1>
                            <p>Dive into summer learning and gain practical experience.</p>
                            <p><b>Start Date: May 15</b></p>
                        </div>
                        <div class="img">
                            <img src="./assets/images/seasonal_pacement_explore_1.png" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <a href="#!">
                        <div class="head">
                            <h1>Fall Internships</h1>
                            <p>Transition seamlessly from vacation to skill-building.</p>
                            <p><b>Start Date: September 1</b></p>
                        </div>
                        <div class="img">
                            <img src="./assets/images/seasonal_pacement_explore_2.png" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <a href="#!">
                        <div class="head">
                            <h1>Spring Internships</h1>
                            <p>Welcome the season of renewal with fresh career insights.</p>
                            <p><b>Start Date: January 15</b></p>
                        </div>
                        <div class="img">
                            <img src="./assets/images/seasonal_pacement_explore_3.png" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <a href="#!">
                        <div class="head">
                            <h1>Year-Round Internships</h1>
                            <p>Never stop learning with opportunities throughout the year.</p>
                            <p><b>Ongoing Opportunities</b></p>
                        </div>
                        <div class="img">
                            <img src="./assets/images/seasonal_pacement_explore_4.png" alt="">
                        </div>
                    </a>
                </div>
            </div> -->
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