<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Digitalshakha Admin</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css"> -->
  <!-- <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link rel="stylesheet" href="./assets/fontawesome-free-6.4.2-web/css/all.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/my_style.css">
  <link rel="shortcut icon" href="./assets/images/d_logo.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/logo_2.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/d_logo.png" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="./assets/images/profile.png" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">
                  <?php
                  if (isset($_SESSION['auth'])) {
                    echo $_SESSION['auth_user']['user_name'];
                  } else {
                    echo "No Logging";
                  }
                  ?>
                </h5>
                <!-- <span>Gold Member</span> -->
              </div>
            </div>
          </div>
        </li>
        <!-- <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li> -->
        <li class="nav-item menu-items">
          <a class="nav-link" href="index.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="send_unique_code.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Send Code</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="employee_contact.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Employee Contact</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Internship Track</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic6">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./internship_certificate.php">Certificate</a></li>
              <li class="nav-item"> <a class="nav-link" href="./internship_track_course_material.php">Course Material</a></li>
              <li class="nav-item"> <a class="nav-link" href="./internship_track_course_info.php">Course Info</a></li>
              <li class="nav-item"> <a class="nav-link" href="./internship_mentor_grading.php">Mentor Grading</a></li>
              <li class="nav-item"> <a class="nav-link" href="./internship_track_grade.php">Course Grade</a></li>
              <li class="nav-item"> <a class="nav-link" href="./internship_track_request_msg.php">Request Messages</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Application</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic5">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./application.php">Application</a></li>
              <li class="nav-item"> <a class="nav-link" href="./application_price.php">Application amount</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Events</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic1">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./event_category.php">Event Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="./events.php">Event</a></li>
              <li class="nav-item"> <a class="nav-link" href="./event_register_table.php">Event Registration</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Batches</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic2">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./upcoming_batches.php">Upcoming Batches</a></li>
              <li class="nav-item"> <a class="nav-link" href="./upcoming_batch_request_table.php">Batch Request</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Programs</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic3">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./programs.php">Program</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_about.php">Program about</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_skill.php">Program skill</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_outcome.php">Program outcome</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_outcome_heading.php">Program outcome heading</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_outcome_image.php">Program outcome image</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_details.php">Program Details</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_accordion.php">Program Accordion</a></li>
              <li class="nav-item"> <a class="nav-link" href="./program_testimonial.php">Program Testimonial</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Blog</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic4">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./blog.php">Blog</a></li>
              <li class="nav-item"> <a class="nav-link" href="./blog_category.php">Category</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Opportunities</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic7">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./opportunities.php">opportunities</a></li>
              <li class="nav-item"> <a class="nav-link" href="./opportunities_request_table.php">opportunities Request</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic8" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Seasonal Placement</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic8">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="./seasonal_placement.php">Seasonal Placement</a></li>
              <li class="nav-item"> <a class="nav-link" href="./seasonal_place_request_table.php">seasonal_placement Request</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="./faqs.php">
            <span class="menu-icon">
              <i class="mdi mdi-application"></i>
            </span>
            <span class="menu-title">FAQs</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="./news_letter.php">
            <span class="menu-icon">
              <i class="mdi mdi-application"></i>
            </span>
            <span class="menu-title">News Letter</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="./success_story.php">
            <span class="menu-icon">
              <i class="mdi mdi-application"></i>
            </span>
            <span class="menu-title">Success Story</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="./home_testimonial.php">
            <span class="menu-icon">
              <i class="mdi mdi-application"></i>
            </span>
            <span class="menu-title">Home Testimonial</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="./schedule_interview.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Schedule Interview</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="users.php">
            <span class="menu-icon">
              <i class="mdi mdi-account-group"></i>
            </span>
            <span class="menu-title">User Dashboard</span>
          </a>
        </li>
      </ul>
    </nav>