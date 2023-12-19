<?php require('./includes/header.php');
require('./admin/config/dbcon.php');

 ?>
<section class="eligibility_criteria_1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text">
                    <h1>Eligibility Criteria</h1>
                    <p>Your Path to Enrollment</p>
                    <p>The eligibility criteria are like the key to unlock the door to your chosen program. This section is all about helping you understand what it takes to get in. We lay out the specific requirements for each program, so you can quickly see if you're a match. From educational background to prior experience, it's all here. It's the first step to joining your dream program.</p>
                </div>
            </div>
            <div class="col-md-6 dot-position d-flex align-content-center justify-content-center">
                <div class="img">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <img src="./assets/images/eligibility_criteria_bg_1.png" alt="">
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="eligibility_criteria_2">
    <div class="container">
        <div class="row">
            <h1>Overview: Get a Comprehensive Understanding of Each Program</h1>
            <p>Before you dive into eligibility criteria, it's essential to gain a comprehensive understanding of the program you're interested in. We've created detailed program overviews to give you a sneak peek into what each course offers. Explore the curriculum, learning objectives, and potential outcomes to make an informed decision about your educational journey.</p>
            <a href="#!">Explore Program Overviews <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
    </div>
</section>
<section class="eligibility_criteria_3">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Eligibility</h1>
                <p>Check the Prerequisites and Criteria for Enrollment</p>
                <p>Enrolling in our programs isn't just about qualifications on paper; it's about the right mindset and qualities.</p>
            </div>
            <p>We look for candidates who:</p>
            <div class="col-md-6">
                <ul>
                    <li>Prioritize a learning mindset over ego.</li>
                    <li> Exhibit unwavering confidence and adaptability, even in the face of challenges.</li>
                    <li>Demonstrate exceptional communication skills, both verbally and in their manner.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>Showcase sharp analytical thinking and sound judgment.</li>
                    <li>Embrace an agile mentality, acknowledging that being among the top 1% globally isn't a prerequisite, but believing in yourself is the key to completing this process.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="end_text">
                <p>This section introduces the qualities we hold dear in our candidates, rising above conventional prerequisites</p>
                <p>At <span>Digitalshakha</span>, we extend a warm invitation to those who resonate with our values and criteria. If you find yourself aligned with this category, we welcome you to embark on this exciting journey with us. For those who don't, rest assured that other paths await you in the wider world. The choice is yours, and you're free to explore different horizons.</p>
            </div>
        </div>
    </div>
</section>
<section class="eligibility_criteria_4">
    <div class="container">
        <div class="heading">
            <h1>Application Process</h1>
            <p>Learn How to Apply Seamlessly</p>
            <p>Once you've confirmed your eligibility, the next step is to dive into the application process. We've streamlined this process to make it as seamless as possible. Our application portal is user-friendly and designed to guide you through each step. Learn how to complete your application, upload necessary documents, and submit your application with ease.</p>
        </div>
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-md-2">
                <div class="box box1">
                    <div class="head">
                        <h1>STEP-1</h1>
                        <p>Explore Courses That Resonate</p>
                    </div>
                    <p>Dive into our course offerings and choose the one that aligns with your aspirations.</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box box2">
                    <div class="head">
                        <h1>STEP-2</h1>
                        <p>Check Eligibility Criteria</p>
                    </div>
                    <p>Ensure you meet the eligibility criteria for your chosen course.</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box box3">
                    <div class="head">
                        <h1>STEP-3</h1>
                        <p>Discover Conventional Prerequisites</p>
                    </div>
                    <p>Familiarize yourself with the traditional prerequisites for your course.</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box box4">
                    <div class="head">
                        <h1>STEP-4</h1>
                        <p>Apply for the Position or Course You've Opted For</p>
                    </div>
                    <p>Submit your application for the position or course you've selected.</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="box box5">
                    <div class="head">
                        <h1>STEP-5</h1>
                        <p>Get Set to Start Your Internship</p>
                    </div>
                    <p>Prepare to begin your exciting internship journey with Digitalshakha.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid p-0">
    <img src="./assets/images/arrow-line.png" class="w-100" alt="">
</div>
<section class="eligibility_criteria_4">
    <div class="container end_text">
        <div class="row">
            <p>These steps will guide you through a hassle-free application process and set you on the path to your future success.</p>
            <div class="deadline">
                <h1>Deadline</h1>
                <p>Stay Updated on Application Deadlines</p>
                <p>Don't miss your opportunity to join our programs. Keeping an eye on application deadlines is essential. We understand the importance of timely submissions, and to help you stay updated, we provide a clear schedule of application deadlines for each program. Mark your calendar, set reminders, and ensure your application is submitted in time for consideration.</p>
                <a href="#!">View Application Deadlines <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="eligibility_criteria_5">
    <div class="container">
        <div class="heading">
            <h1>FAQs</h1>
            <p>Your Path to Answers</p>
        </div>
        <div class="row">
        <?php
            $sql = "SELECT * FROM faqs_tbl WHERE faq_status = 1";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                while ($data = mysqli_fetch_assoc($sql_run)) {
            ?>
                         <div class="main-box">
                <div class="toggle_heading toggle_btn">
                    <h1>Q: <?=$data['faq_question']?></h1>
                    <p class="plus"> <i class="fa-solid fa-plus"></i></p>
                    <p class="minus"><i class="fa-solid fa-minus"></i></p>
                </div>
                <div class="toggle_content">
                    <p>A: <?=$data['faq_ans']?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <div class="col-md-12 end_toggle_link">
                <a href="./contact.php">Any Other Queries, Contact Us <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
        </div>
        <div class="row end_text_end">
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
<script>
    $(document).ready(function() {

        $(".toggle_btn").click(function() {
            // Close all other toggle_content elements
            $(".toggle_content").slideUp();
            $(".toggle_btn").removeClass("active_toggle_content");
            $(".plus").show();
            $(".minus").hide();

            // Toggle the clicked toggle_content
            var panel = $(this).next(".toggle_content");
            $(this).toggleClass("active_toggle_content");

            if (panel.is(":hidden")) {
                panel.slideDown();
                $(this).find('.plus').hide();
                $(this).find('.minus').show();
            } else {
                panel.slideUp();
                $(this).find('.plus').show();
                $(this).find('.minus').hide();
            }
        });
    });
</script>
<?php require('./includes/end_html.php'); ?>