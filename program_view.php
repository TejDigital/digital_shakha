<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM program_tbl WHERE program_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>
<section class="program_view_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="nav_box">
                    <a href="./index.php"><img src="./assets/images/home.svg">Home<i class="fa-solid fa-angle-right"></i></a>
                    <a href="./program_option.php">Program Option<i class="fa-solid fa-angle-right"></i></a>
                    <p class="m-0"><?= $row['program_name'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_view_2" id="section2">
    <div class="container">
        <div class="row flex_change">
            <div class="col-md-8">
                <div class="text">
                    <div class="heading">
                        <h1><?= $row['program_name'] ?></h1>
                        <p><?= $row['program_view_description'] ?></p>
                    </div>
                    <div class="language">
                        <p><img src="./assets/images/language.svg">Taught in English & Hindi</p>
                    </div>
                    <div class="classes">
                        <p><?= $row['program_type_class'] ?></p>
                    </div>
                    <div class="enroll_btn_area">
                        <button>Enroll</button>
                        <div class="batch">
                            <p>Next Batch</p>
                            <p><?= $row['program_next_batch'] ?></p>
                        </div>
                    </div>
                    <div class="enroll_count">
                        <p><span><?= $row['program_enroll_count'] ?></span> already enrolled</p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exp_text_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1 style="font-size: 1.8rem; font-weight:700; line-height:40px; color:#BB5327">Recommended Experience </h1>
                            <p style="font-size: 0.9rem; font-weight:400; line-height:20px;"><?php if ($row['program_experience'] == 1) {
                                                                                                    echo "Beginner Level";
                                                                                                } else if ($row['program_experience'] == 2) {
                                                                                                    echo "Min Level";
                                                                                                } else {
                                                                                                    echo "Advanced Level";
                                                                                                }
                                                                                                ?></p>
                            <!-- <input type="hidden" name="program_delete_id" class="program_delete_id"> -->
                            <h3 style="font-size: 1.4rem; font-weight:600; line-height:32px; color:#615D5D;"><?= $row['program_experience_text'] ?></h3>
                            <button type="button" style="font-weight:600; background-color: #BB5327; color:#fff; padding:0.7rem 1.1rem; border:0;" class="my-3" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box" id="fixed-box">
                    <div class="heading">
                        <h1>Professional Certificate</h1>
                        <p>Attain a professional credential showcasing your expertise and skills in the field.</p>
                    </div>
                    <div class="review">
                        <p><?= $row['program_rating_no'] ?><img src="./assets/images/star.svg" alt=""></p>
                        <p>( <?= $row['program_review_no'] ?> reviews )</p>
                    </div>
                    <div class="level">
                        <h2><?php if ($row['program_experience'] == 1) {
                                echo "Beginner Level";
                            } else if ($row['program_experience'] == 2) {
                                echo "Min Level";
                            } else {
                                echo "Advanced Level";
                            }
                            ?>
                        </h2>
                        <p>Recommended Experience <button class="ext_text_btn"><img src="./assets/images/info.svg" alt=""></button></p>
                    </div>
                    <div class="time_taken">
                        <h3><?= $row['program_duration'] ?></h3>
                        <h3>Capstone Projects</h3>
                    </div>
                    <div class="btn_area">
                        <a href="#!">View Course Curriculum</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_view_3" id="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="mini_list">
                    <a href="#!">About</a>
                    <a href="#!">Outcomes</a>
                    <a href="#!">Details</a>
                    <a href="#!">Testimonials</a>
                </div>
                <div class="learn">
                    <div class="heading">
                        <h1>What You will Learn</h1>
                    </div>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM program_about_tbl WHERE program = '$id'";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run)) {
                            foreach ($sql_run as $data) {
                                if ($data['program_about_text'] != '') {

                        ?>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <img src="./assets/images/right-tick.svg" alt="">
                                            <p><?= $data['program_about_text'] ?></p>
                                        </div>
                                    </div>

                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="skills">
                    <div class="heading">
                        <h1>Skills you will gain</h1>
                    </div>
                    <div class="grid">
                        <?php
                        $sql = "SELECT * FROM program_skill_tbl WHERE program = '$id'";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run)) {
                            foreach ($sql_run as $data) {
                                if ($data['program_skill_name'] != '') {

                        ?>
                                    <p><?= $data['program_skill_name'] ?></p>

                        <?php
                                }
                            }
                        }
                        ?>
                        <!-- <p>User Experience</p>
                        <p>User Interface</p>
                        <p>Prototype</p>
                        <p>Wireframe</p>
                        <p>UX Research</p>
                        <p>Mockup</p>
                        <p>Figma</p>
                        <p>Usability Mobility</p>
                        <p>User Experience Design (UXD)</p>
                        <p>UX design Jobs</p> -->
                    </div>
                </div>
                <div class="must_know_details">
                    <div class="heading">
                        <h1>Must Know Details</h1>
                    </div>
                    <div class="content">
                        <img src="./assets/images/LinkedIn_program_view.png" alt="">
                        <h6>Shareable Certificate</h6>
                        <p>Add to your Linkedin Profile</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_view_4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    <?php
                    $sql = "SELECT * FROM program_outcome_heading WHERE program = '$id'";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run)) {
                        $row = mysqli_fetch_assoc($sql_run);
                    ?>
                        <h1><?=$row['heading']?></h1>
                    <?php
                    }
                    ?>
                </div>
                <div class="list">
                    <ul>
                        <?php
                        $sql = "SELECT * FROM program_outcome_tbl WHERE program = '$id'";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run)) {
                            foreach ($sql_run as $data) {
                                if ($data['program_outcome_list'] != '') {
                        ?>
                                    <li><?= $data['program_outcome_list'] ?></li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <?php
                    $sql = "SELECT * FROM program_image_tbl WHERE program = '$id' limit 1";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run)) {
                        foreach ($sql_run as $data) {
                            if ($data['program_view_image'] != '') {
                    ?>
                                <div class="img">
                                    <img src="./admin/program_view_images/<?= $data['program_view_image'] ?>" alt="">
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <div class="text_box">
                        <?php
                        $sql = "SELECT * FROM program_image_tbl WHERE program = '$id'";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run)) {
                            foreach ($sql_run as $data) {
                                if ($data['program_image_heading_1'] != '') {
                        ?>
                                    <div class="mini_box">
                                        <div class="boxes">
                                            <p><?= $data['program_image_heading_1'] ?></p>
                                            <p><?= $data['program_image_description_1'] ?></p>
                                        </div>
                                        <div class="boxes">
                                            <p><?= $data['program_image_heading_2'] ?></p>
                                            <p><?= $data['program_image_description_2'] ?></p>
                                        </div>
                                        <div class="boxes">
                                            <p><?= $data['program_image_heading_3'] ?></p>
                                            <p><?= $data['program_image_description_3'] ?></p>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_view_5">
    <div class="container">
        <div class="row main_box">
            <div class="col-md-3">
                <div class="box">
                    <h1>Get exclusive access to career resources upon completion</h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <img src="./assets/images/Resume.svg" alt="">
                    <h4>Resume Enhancement</h4>
                    <p>Get personalized feedback to improve your resume and LinkedIn profile.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <img src="./assets/images/Video Conference.svg" alt="">
                    <h4>Interview Prep </h4>
                    <p>Practice and refine your skills with interactive tools and mock interviews.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <img src="./assets/images/Personal Growth.svg" alt="">
                    <h4>Career Guidance</h4>
                    <p>Plan your next career move with the help of DigitalShakha's job guide.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_view_6">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-md-6">
                    <div class="text">
                        <h1>Earn a career certificate</h1>
                        <p>Add it to your LinkedIn profile, resume, or CV. </p>
                        <p> Share it on social media and highlight it in your performance review.</p>
                    </div>
                </div>
                <div class="col-md-6 img_box">
                    <div class="img">
                        <img src="./assets/images/Certificate_program_view.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="program_view_7">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="top_text">
                    <?php
                    $sql = "SELECT * FROM program_detail_tbl WHERE program = '$id' limit 1";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run)) {
                        foreach ($sql_run as $data) {
                            if ($data['program_detail_heading'] != '') {
                    ?>
                                <div class="heading">
                                    <h1><?= $data['program_detail_heading'] ?></h1>
                                </div>
                                <div class="toggle_text">
                                    <p><?= $data['program_detail_description'] ?></p>
                                    <a href="#!" style="display:none;" id="closeButton">Read Less</a>
                                </div>
                                <a href="#!" id="readMoreLink">Read More</a>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="modules">
            <?php
            $sql = "SELECT * FROM program_accordion_tbl WHERE program = '$id' limit 1";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run)) {
                foreach ($sql_run as $data) {
                    $count = 1;
                    if ($data['program_detail_dropdown_heading'] != '') {
            ?>
                        <div class="toggle_box main_box">
                            <div class="left">
                                <h1><?= $data['program_detail_dropdown_heading'] ?></h1>
                                <div class="left_bottom_text">
                                    <p>MODULE - <span><?= $count++ ?></span></p>
                                    <p>ESTIMATED TIME: <span><?= $data['program_detail_dropdown_days'] ?> Days</span></p>
                                </div>
                            </div>
                            <div class="right">
                                <i class="fa-solid fa-angle-down"></i>
                                <i style="display:none;" class="fa-solid fa-angle-up"></i>
                            </div>
                        </div>
                        <div class="show_content">
                            <p><?= $data['program_detail_dropdown_description'] ?></p>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>
<section class="program_testimonial">
    <div class="container">
        <div class="heading">
            <h1>Why people choose Digitalshakha for their career</h1>
        </div>
        <div class="testimonial testimonial_program_view owl-carousel owl-theme">
            <?php
            $sql = "SELECT * FROM program_testimonial_tbl WHERE program = '$id'";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run)) {
                foreach ($sql_run as $data) {
                    if ($data['program_testimonial_image'] != '') {
            ?>

                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="img">
                                    <img src="./admin/program_testimonial_images/<?= $data['program_testimonial_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="text">
                                    <img src="./assets/images/dot1.svg" alt="">
                                    <p><?= $data['program_testimonial_text'] ?></p>
                                    <p><?= $data['program_testimonial_name'] ?></p>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>

        </div>
        <div class="btn_area">
            <a href="./contact.php">Any Queries, Contact Us<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="row">
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
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<script>
    $(document).ready(function() {
        $('.ext_text_btn').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.program').val(user_id);
            $('#exp_text_modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        var textContainer = $('.toggle_text');
        var readMoreLink = $('#readMoreLink');
        var closeButton = $('#closeButton');

        readMoreLink.click(function(e) {
            e.preventDefault();
            textContainer.css('max-height', 'none');
            readMoreLink.hide();
            closeButton.show();
        });

        closeButton.click(function() {
            textContainer.css('max-height', '80px'); // Adjust the height based on your design
            readMoreLink.show();
            closeButton.hide();
        });
    });
</script>
<script>
    $(document).ready(function() {

        $(".toggle_box").click(function() {
            // Close all other toggle_content elements
            $(".show_content").slideUp();
            $(".toggle_btn").removeClass("active_show_content");
            $(".fa-angle-down").show();
            $(".fa-angle-up").hide();

            // Toggle the clicked toggle_content
            var panel = $(this).next(".show_content");
            $(this).toggleClass("active_show_content");

            if (panel.is(":hidden")) {
                panel.slideDown();
                $(this).find('.fa-angle-up').show();
                $(this).find('.fa-angle-down').hide();
            } else {
                panel.slideUp();
                $(this).find('.fa-angle-up').hide();
                $(this).find('.fa-angle-down').show();
            }
        });
    });
</script>
<script>
    window.onscroll = function() {
        var box = document.getElementById('fixed-box');
        var section2 = document.getElementById('section2');
        var section3 = document.getElementById('section3');
        var programView3 = document.querySelector('.program_view_3');
        var programView4 = document.querySelector('.program_view_4');

        var boxRect = box.getBoundingClientRect();
        var boxTop = boxRect.top + window.scrollY;
        var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
        var screenSize = window.innerWidth || document.documentElement.clientWidth;

        requestAnimationFrame(function() {
            if (screenSize >= 999) {
                if (scrollPosition < section2.offsetTop) {
                    box.style.position = 'fixed';
                    box.style.top = '13rem';
                } else if (scrollPosition < programView4.offsetTop - window.innerHeight) {
                    box.style.position = 'absolute';
                    box.style.top = (scrollPosition - section2.offsetTop + 200) + 'px';
                } else {
                    box.style.position = 'absolute';
                    box.style.top = (programView4.offsetTop - programView3.offsetTop) + 'px';
                }
            } else {
                // If screen size is less than 998px, set position to relative
                box.style.position = 'relative';
                box.style.top = 'auto';
                box.style.right = 'auto';
            }
        });
    };

    window.dispatchEvent(new Event('scroll'));
</script>
<?php require('./includes/end_html.php'); ?>