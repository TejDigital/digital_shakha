<?php require('./includes/header.php');
require('./admin/config/dbcon.php');

 ?>
<section class="opportunities_1">
    <div class="container">
        <div class="row flex-change">
            <div class="col-md-6">
                <div class="text">
                    <h1>Opportunities</h1>
                    <p>Opportunities are the gateways to growth, learning, and success</p>
                    <p>At DigitalShakha, we believe in empowering individuals to not just seize opportunities but to
                        create them. Whether you're a seasoned professional seeking the next big challenge or a
                        fresh graduate embarking on your professional journey, understanding and leveraging
                        opportunities is the key to reaching new heights.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="img">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <img src="./assets/images/opportunities_bg_1.png" alt="">
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="opportunities_2">
    <div class="container">
        <div class="row">
            <h1>Open Opportunities:</h1>
            <?php
            $sql = "SELECT * FROM opportunities_tbl WHERE opp_status = 1";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                while ($data = mysqli_fetch_assoc($sql_run)) {
            ?>
                 <div class="col-md-12 mb-4">
                <div class="big_box">
                    <div class="box">
                        <p><?=$data['opp_name']?></p>
                    </div>
                    <a href="./opportunities_view.php?id=<?=$data['opp_id']?>">Know More</a>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <!-- <div class="col-md-12 mb-4">
                <div class="big_box">
                    <div class="box">
                        <p>Business Development Executive </p>
                        <p>ID: 2301</p>
                    </div>
                    <a href="#!">Know More</a>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="big_box">
                    <div class="box">
                        <p>Graphic Design Intern</p>
                        <p>ID: 2302</p>
                    </div>
                    <a href="#!">Know More</a>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="big_box">
                    <div class="box">
                        <p>Digital Marketing Intern </p>
                        <p>ID: 2303</p>
                    </div>
                    <a href="#!">Know More</a>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="big_box">
                    <div class="box">
                        <p>HR Admin, Fresher</p>
                        <p>ID: 2304</p>
                    </div>
                    <a href="#!">Know More</a>
                </div>
            </div> -->
        </div>
    </div>
</section>
<section class="opportunities_3">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Explore the Possibilities</h1>
            </div>
            <div class="col-md-3 p-2">
                <div class="box">
                    <div class="text">
                        <h4>Tech Enthusiast?</h4>
                        <p>Dive into programming and development courses.</p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/opportunities_box_bg_1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="box">
                    <div class="text">
                        <h4>Creative Mind?</h4>
                        <p>Explore UX UI Design and Digital Marketing.</p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/opportunities_box_bg_2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="box">
                    <div class="text">
                        <h4>Data Aficionado?</h4>
                        <p>Master Data Analytics and Machine Learning.</p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/opportunities_box_bg_3.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="box">
                    <div class="text">
                        <h4>Looking to Lead?</h4>
                        <p>Develop leadership skills through our Professional Development Programs.</p>
                    </div>
                    <div class="img">
                        <img src="./assets/images/opportunities_box_bg_4.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center pt-5">
                <div class="btn">
                    <a href="./program_option.php">Explore Learning Paths</a>
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
<section class="opportunities_5">
    <div class="container">
        <h1>How to Make the Most of Opportunities?</h1>
        <div class="row d-flex align-content-center justify-content-evenly">
            <div class="main_box">
                <div class="flex_box p-1">
                    <div class="box">
                        <h3>Be Proactive</h3>
                        <p>Actively seek out opportunities that align with your goals. Take initiative, express your
                            interests, and be a proactive contributor to your team.</p>
                    </div>
                </div>
                <div class="flex_box p-1">
                    <div class="box">
                        <h3>Continuous Learning</h3>
                        <p>Embrace a mindset of continuous learning. Attend workshops, webinars, and training
                            sessions to stay informed and ready to seize emerging opportunities.</p>
                    </div>
                </div>
                <div class="flex_box p-1">
                    <div class="box">
                        <h3>Network Effectively</h3>
                        <p>Build strong professional relationships within and outside your organization. Networking
                            opens doors to unforeseen opportunities and collaborations.</p>
                    </div>
                </div>
                <div class="flex_box p-1">
                    <div class="box">
                        <h3>Embrace Challenges</h3>
                        <p>Don't shy away from challenges; instead, view them as opportunities for growth. Tackling
                            challenges head-on showcases your resilience and adaptability.</p>
                    </div>
                </div>
                <div class="flex_box p-1">
                    <div class="box">
                        <h3>Align with Organizational Goals</h3>
                        <p>Understand the goals of your organization and align your efforts with them. Opportunities
                            that contribute to organizational success often lead to personal success.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text_end">
                <p>At DigitalShakha, we recognize the transformative power of opportunities. Our commitment is not just to provide a workplace but to cultivate an environment where individuals can thrive, innovate, and uncover their full potential. Explore opportunities with us, and together, let's embark on a journey of growth, learning, and professional success.</p>
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