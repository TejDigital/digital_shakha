<?php
session_start();
require('./admin/config/dbcon.php');
?>
<!DOCTYPE php>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/resources.css">
    <link rel="stylesheet" href="./assets/css/resumebuilding.css">
    <link rel="stylesheet" href="./assets/css/opportunities.css">
    <link rel="stylesheet" href="./assets/css/reset_password.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/explore_opportunities.css">
    <link rel="stylesheet" href="./assets/css/internship_resources.css">
    <link rel="stylesheet" href="./assets/css/events.css">
    <link rel="stylesheet" href="./assets/css/application.css">
    <link rel="stylesheet" href="./assets/css/blog.css">
    <link rel="stylesheet" href="./assets/css/blog_view.css">
    <link rel="stylesheet" href="./assets/css/news_letter.css">
    <link rel="stylesheet" href="./assets/css/schedule_interview.css">
    <link rel="stylesheet" href="./assets/css/program_option.css">
    <link rel="stylesheet" href="./assets/css/internship_track_0.css">
    <link rel="stylesheet" href="./assets/css/internship_track_1.css">
    <link rel="stylesheet" href="./assets/css/seasonal_placements.css">
    <link rel="stylesheet" href="./assets/css/placement_view.css">
    <link rel="stylesheet" href="./assets/css/eligibility_criteria.css">
    <link rel="stylesheet" href="./assets/css/program_view.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <link rel="stylesheet" href="./assets/css/opportunities_view.css">
    <link rel="stylesheet" href="./assets/css/modals.css">
    <link rel="stylesheet" href="./assets/css/cover_letter.css">
    <link rel="stylesheet" href="./assets/css/interview_insights.css">
    <link rel="stylesheet" href="./assets/css/success_stories.css">
    <link rel="stylesheet" href="./assets/css/partner_with_us.css">
    <link rel="stylesheet" href="./assets/css/employee_contact.css">
    <link rel="stylesheet" href="./assets/css/application_success.css">
    <link rel="stylesheet" href="./assets/css/error.css">
    <link rel="stylesheet" href="./assets/css/about.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/splide-4.1.3/dist/css/splide.min.css">
    <link rel="stylesheet" href="./assets/css/preloading/effect.css">
    <link rel="stylesheet" href="./sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="./assets/OwlCarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/OwlCarousel2/dist/assets/owl.theme.default.min.css">
    <title>Digitalshakha</title>

</head>
<style>
    .preloader2 {
        background-color: #BB5327;
        width: 100%;
        height: 100vh;
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        animation: slideUp 1s linear;
    }

    .preloader1 {
        background-color: #1A0E09;
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: start;
        justify-content: start;
        padding: 3rem;
        flex-direction: column;
        /* animation: slideUp 1s linear; */
    }

    .preloader {
        /* overflow: hidden; */
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100vh;
        /* background: #BB5327; */
    }

    .preloader1 .text {
        padding: 1rem 3rem;
        height: 100%;
        color: #FFFFFF;
        text-align: left;
    }

    .preloader1 .text h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin: 1rem 0;
    }

    .preloader1 .count {
        padding: 1rem 3rem;
        font-size: 1rem;
        font-weight: 500;
        margin: 1rem 0;
        color: #FFFFFF;
    }

    .preloader1 .count span {
        color: #FFFFFF;
    }

    .preloader1 .img {
        padding: 0 3rem;
        width: 300px;
    }

    .preloader1 .img img {
        width: 100%;
    }


    @keyframes slideUp {
        0% {
            transform: translateY(0);
            opacity: 1;
            animation-timing-function: ease-in;
        }

        100% {
            transform: translateY(-100vh);
            opacity: 1;
            animation-timing-function: ease-out;
        }
    }
</style>

<body>

    <div class="preloader">
        <div class="preloader1">
            <div class="text">
                <h1>Think</h1>
                <h1>Innovate</h1>
                <h1>Design</h1>
            </div>
            <div class="count">
                <span></span>
            </div>
            <div class="img">
                <img src="./assets/images/digital_logo_2.png" alt="">
            </div>
        </div>
        <div class="preloader2">
        </div>
    </div>
    <header class="header">
        <div class="header-inner">
            <div class="container-fluid px-lg-5">
                <nav class="navbar bg-body-tertiary mobile_nav">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php">
                            <img src="./assets/images/digital_logo.png" class="logo1">
                            <img src="./assets/images/digital_logo.png" class="logo2">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                                <a class="navbar-brand" href="index.php">
                            <img src="./assets/images/digital_logo.png" class="logo1">
                            <img src="./assets/images/digital_logo.png" class="logo2">
                        </a>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item drop-list">
                                        <p class=" nav-after-effect clicked-link" id="header_link_home">
                                            discover
                                        </p>
                                        <ul class="list-group bg-dark drop-item">
                                            <li class="list-group-item"><a href="./opportunities.php" class="">Opportunities <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./program_option.php">Program Options <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./internship_track_0.php">Internship Tracks <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./seasonal_placements.php">Seasonal Placements <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./eligibility_criteria.php">Eligibility Criteria <i class="color-ball"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item drop-list">
                                        <p class="nav-after-effect clicked-link">resources</p>
                                        <ul class="list-group bg-dark drop-item">
                                            <li class="list-group-item"><a href="./resources.php" class="">resources <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./resumebuilding.php" class="">Resume Building <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./cover_letter.php">Cover Letter Tips <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./interview_insights.php">Interview Insights <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./success_stories.php">Success Stories <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./blog.php">Blog/Article<i class="color-ball"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item drop-list">
                                        <p class="nav-after-effect clicked-link">employers</p>
                                        <ul class="list-group bg-dark drop-item">
                                            <li class="list-group-item"><a href="./partner_with_us.php" class="">Partner with Us <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./post_job_internship.php">Post an Internship <i class="color-ball"></i></a></li>
                                            <!-- <li class="list-group-item"><a href="#!">Employer Stories <i class="color-ball"></i></a></li> -->
                                            <li class="list-group-item"><a href="./contact.php">Contact <i class="color-ball"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item drop-list">
                                        <p class="clicked-link nav-after-effect">students</p>
                                        <ul class="list-group bg-dark drop-item">
                                            <li class="list-group-item"><a href="./explore_opportunities.php" class="">Explore Opportunities <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./application_1.php" class="">Application <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./schedule_interview.php" class="">Schedule Interviews <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./internship_resources.php" class="">Internship Resources <i class="color-ball"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item drop-list">
                                        <p class="nav-after-effect clicked-link">events</p>
                                        <ul class="list-group bg-dark drop-item">
                                            <li class="list-group-item"><a href="./events.php" class="">Our Events <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./event_register.php" class="">Register <i class="color-ball"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item drop-list">
                                        <p class="nav-after-effect clicked-link">updates</p>
                                        <ul class="list-group bg-dark drop-item">
                                            <li class="list-group-item"><a href="./blog.php" class="">Blog <i class="color-ball"></i></a></li>
                                            <li class="list-group-item"><a href="./news_letter.php" class="">Newsletters <i class="color-ball"></i></a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item list-group-item">
                                        <a class="clicked-link nav-after-effect" href="./contact.php" id="">
                                            contact
                                        </a>
                                    </li>
                                    <li class="nav-item list-group-item">

                                        <?php
                                        if (!isset($_SESSION['std_auth']) || !$_SESSION['std_auth'] && !isset($_SESSION['std_auth_user']['user_name']) || !$_SESSION['std_auth_user']['user_name']) {
                                        ?>
                                            <div class="btns">
                                                <a class="login_popup">Login</a>
                                                <span>|</span>
                                                <a class="signup_popup">Signup</a>
                                            </div>
                                            <?php
                                        } else {
                                            $email = $_SESSION['std_auth_user']['user_email'];
                                            $sql = "SELECT * FROM application_tbl WHERE email = '$email'";
                                            $sql_run = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($sql_run) > 0) {
                                                $show_profile = mysqli_fetch_assoc($sql_run);
                                            ?>
                                                <div class="btns">
                                                    <form class="std_log_out">
                                                        <div class="drop-list">
                                                            <?php
                                                            if ($show_profile['profile_photo'] != '') {
                                                                echo "<a href='#!' class='hover-link'><img class='profile_img' src='./admin/student_application_photo/" . $show_profile['profile_photo'] . "'></a>
                                                                ";
                                                            } else {
                                                                echo "<a href='#!' class='hover-link'><img class='profile_img' src='./assets/images/logout_icon.svg'></a>
                                                                ";
                                                            }
                                                            ?>
                                                            <!-- <a href="#!" class="hover-link"><img class="profile_img" src="./assets/images/logout_icon.svg" alt=""></a> -->
                                                            <ul class="list-group bg-dark drop-item">
                                                                <li class="list-group-item logout_box_list"><a style="padding:10px;" href="./contact.php">Help and sport</a></li>
                                                                <li class="list-group-item logout_box_list"><button type="submit" name="log_out">Logout</button></li>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <nav class="navbar navbar-expand-lg border-bottom my-navbar main_nav">
                    <a class="navbar-brand" href="index.php">
                        <img src="./assets/images/digital_logo.png" class="logo1">
                        <img src="./assets/images/digital_logo.png" class="logo2">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse navbar_mobile" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto ps-3">
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" href="./index.php" id="header_link_home">
                                    discover
                                </a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./opportunities.php" class="">Opportunities <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./program_option.php">Program Options <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./internship_track_0.php">Internship Tracks <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./seasonal_placements.php">Seasonal Placements <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./eligibility_criteria.php">Eligibility Criteria <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" href="./resources.php" id="">resources</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./resumebuilding.php" class="">Resume Building <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./cover_letter.php">Cover Letter Tips <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./interview_insights.php">Interview Insights <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./success_stories.php">Success Stories <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./blog.php">Blog/Article<i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" >employers</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./partner_with_us.php" class="">Partner with Us <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./post_job_internship.php">Post an Internship <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./contact.php">Contact <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link hover-link nav-after-effect" >students</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./explore_opportunities.php" class="">Explore Opportunities <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./application_1.php" class="">Application <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./schedule_interview.php" class="">Schedule Interviews <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./internship_resources.php" class="">Internship Resources <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link">events</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./events.php" class="">Our Events <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./event_register.php" class="">Register <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link">updates</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./blog.php" class="">Blog <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./news_letter.php" class="">Newsletters <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item list-group-item">
                                <a class="nav-link nav-after-effect" href="./contact.php" id="">
                                    contact
                                </a>
                            </li>
                            <li class="nav-item list-group-item padding2">
                                <?php
                                if (!isset($_SESSION['std_auth']) || !$_SESSION['std_auth'] && !isset($_SESSION['std_auth_user']['user_name']) || !$_SESSION['std_auth_user']['user_name']) {
                                ?>
                                    <div class="btns">
                                        <a class="login_popup">Login</a>
                                        <span>|</span>
                                        <a id="signup_popup" class="signup_popup">Signup</a>
                                    </div>
                                    <?php
                                } else {
                                    $email = $_SESSION['std_auth_user']['user_email'];
                                    $sql = "SELECT * FROM application_tbl WHERE email = '$email'";
                                    $sql_run = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($sql_run) > 0) {
                                        $show_profile = mysqli_fetch_assoc($sql_run);
                                    ?>
                                        <div class="btns">
                                            <form class="std_log_out">
                                                <div class="drop-list">
                                                    <?php
                                                    if ($show_profile['profile_photo'] != '') {
                                                        echo "<a href='#!' class='hover-link'><img class='profile_img' src='./admin/student_application_photo/" . $show_profile['profile_photo'] . "'></a>
                                                                ";
                                                    } else {
                                                        echo "<a href='#!' class='hover-link'><img class='profile_img' src='./assets/images/logout_icon.svg'></a>
                                                                ";
                                                    }
                                                    ?>
                                                    <ul class="list-group bg-dark drop-item">
                                                        <li class="list-group-item logout_box_list"><a style="padding:10px;" href="./contact.php">Help and sport</a></li>
                                                        <li class="list-group-item logout_box_list"><button type="submit" name="log_out">Logout</button></li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div id="loginModal">
        <div class="modal-content">
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey !</strong> <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['message']);
            }
            ?>
            <div class="box">
                <div class="btn_box">
                    <div class="close_login">
                        <p class="close_login_btn" id="close_login_btn">
                            <i class="fa-solid fa-xmark  float-end"></i>
                        </p>
                    </div>
                    <div class="box_content">
                        <div class="heading">
                            <h1>Welcome Back !</h1>
                        </div>
                        <div class="form">
                            <form id="std_login_form">
                                <div class="form-group">
                                    <input type="text" class="input_box" name="email" placeholder="Email Address" required>
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="input_box" name="password" placeholder="Password" required>
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <a class="forgetPassBtn">Forgot Password?</a>

                                <div class="form-group">
                                    <button type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="page_link">
                            <p>New at Digitalshakha? <a class="signup_popup">Register here</a></p>
                        </div>
                        <div class="end_text">
                            <p>Have trouble logging in?<a href="./contact.php">Contact Help Center</a></p>
                            <p>This site is protected by reCAPTCHA Enterprise & the Digitalshakha Privacy Policy and Terms of Service apply.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="registerModal">
        <div class="modal-content">
            <div class="box">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey !</strong> <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <div class="top" id="top">

                </div>
                <div class="btn_box">
                    <div class="close_signup">
                        <p class="close_signup_btn" id="close_signup_btn">
                            <i class="fa-solid fa-xmark  float-end"></i>
                        </p>
                    </div>
                    <div class="box_content">
                        <div class="heading">
                            <h1>Sign Up</h1>
                            <p>Begin Your Journey at Digitalshakha</p>
                        </div>
                        <div class="form">
                            <form id="std_register_form" name="std_register_form">
                                <div class="form-group">
                                    <input type="text" class="input_box" id="val_name" name="name" placeholder="Full-Name" required>
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" id="duration" onkeypress="return event.charCode>=48 && event.charCode<=57" class="input_box" name="phone" placeholder="Contact Number" required>
                                    <span class="material-symbols-outlined">
                                        phone_iphone
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="input_box" id="val_email" name="email" placeholder="Email Address" required>
                                    <span class="material-symbols-outlined" >
                                        mail
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="input_box" id="val_password" name="password" placeholder="Create Password" required>
                                    <span class="material-symbols-outlined" >
                                        lock
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="input_box" value="val_c_password" name="confirm_password" placeholder="Confirm Password" required>
                                    <span class="material-symbols-outlined" >
                                        lock
                                    </span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submitBtn">Join Digitalshakha</button>
                                </div>
                            </form>
                        </div>
                        <div class="page_link">
                            <p>Already at Digitalshakha? <a class="login_popup">login</a></p>
                        </div>
                        <div class="end_text">
                            <p>I accept Digitalshakha's Terms of Use and Privacy Notice.</p>
                            <p>Have trouble logging in?<a href="./contact.php">Contact Help Center</a></p>
                            <p>This site is protected by reCAPTCHA Enterprise & the Digitalshakha Privacy Policy and Terms of Service apply.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="forgetPassModal">
        <div class="modal-content">
            <div class="box">
                <div class="btn_box">
                    <div class="close_forgetPass">
                        <p class="close_forgetPass_btn" id="close_forgetPass_btn">
                            <i class="fa-solid fa-xmark  float-end"></i>
                        </p>
                    </div>
                    <div class="box_content">
                        <div class="heading">
                            <h1>Forgot password</h1>
                            <p>Enter the email address you use on Digitalshakha. We'll send you a link to reset your password.</p>
                        </div>
                        <div class="form">
                            <form id="std_forget_pass">
                                <div class="form-group">
                                    <input type="email" class="input_box" name="forget_email" placeholder="Email Address" required>
                                    <span class="material-symbols-outlined">
                                        mail
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="forgetBtn" name="f_pass">Reset Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="page_link">
                            <p>Back to <a class="login_popup">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>