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
          <a class="nav-link" href="./application.php">
            <span class="menu-icon">
              <i class="mdi mdi-application"></i>
            </span>
            <span class="menu-title">Application</span>
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
          <a class="nav-link" href="./programs.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Programs</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="./seasonal_placement.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Seasonal Placement</span>
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