<!DOCTYPE php>
<php lang="en">

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
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/explore_opportunities.css">
    <link rel="stylesheet" href="./assets/css/internship_resources.css">
    <link rel="stylesheet" href="./assets/css/events.css">
    <link rel="stylesheet" href="./assets/css/application.css">
    <link rel="stylesheet" href="./assets/css/blog.css">
    <link rel="stylesheet" href="./assets/css/blog_view.css">
    <link rel="stylesheet" href="./assets/css/news_letter.css">
    <link rel="stylesheet" href="./assets/css/schedule_interview.css">
    <link rel="stylesheet" href="./assets/fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="./assets/splide-4.1.3/dist/css/splide.min.css">
    <title>Digitalshakha</title>
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <div class="container-fluid px-lg-5">
                <nav class="navbar navbar-expand-lg border-bottom my-navbar">
                    <a class="navbar-brand" href="index.php">
                        <img src="./assets/images/digital_logo.png" class="img-fluid logo1">
                        <img src="./assets/images/digital_logo.png" class="img-fluid logo2">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                                    <li class="list-group-item"><a href="#!">Program Options <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Internship Tracks <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Seasonal Placements <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Explore Programs <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" href="./resources.php" id="">resources</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./resumebuilding.php" class="">Resume Building <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Cover Letter Tips <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Interview Insights <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Networking Guide <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Success Stories <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Articles <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" href="#!" id="">employers</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="#!" class="">Partner with Us <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Post an Internship <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Employer Stories <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="#!">Contact <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link hover-link nav-after-effect" href="#!" id="">students</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./login.php" class="">Student Reg./Login <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./explore_opportunities.php" class="">Explore Opportunities <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./application.php" class="">Application <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./schedule_interview.php" class="">Schedule Interviews <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./internship_resources.php" class="">Internship Resources <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" href="#!" id="">events</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./events.php" class="">Our Events <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./event_register.php" class="">Register <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item drop-list">
                                <a class="nav-link nav-after-effect hover-link" href="#!" id="">updates</a>
                                <ul class="list-group bg-dark drop-item">
                                    <li class="list-group-item"><a href="./blog.php" class="">Blog <i class="color-ball"></i></a></li>
                                    <li class="list-group-item"><a href="./news_letter.php" class="">Newsletters <i class="color-ball"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item list-group-item padding2">
                                <a class="nav-link nav-after-effect" href="#!" id="">
                                    contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>