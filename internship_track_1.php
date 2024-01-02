<?php require('./includes/header.php');
if (!isset($_SESSION['std_auth']) || $_SESSION['std_auth'] !== true) {
    echo '<script>window.location.href = "index.php";</script>';
    exit(); // Stop further execution
} else {
    $email = $_SESSION['std_auth_user']['user_email'];
    $app_query = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc";
    $app_query_run = mysqli_query($con, $app_query);
    if (mysqli_num_rows($app_query_run) > 0) {
        $main_app = mysqli_fetch_assoc($app_query_run);
        $show_duration = $main_app['duration'];
        $timestamp = strtotime($main_app['created_at']);
        $show_day = date('d', $timestamp);
        $show_month = date('M', $timestamp);
        $show_month_count = date('m', $timestamp);
        $show_year = date('Y', $timestamp);
        $app_id = $main_app['id'];
        $show_start_date = "$show_year-$show_month-$show_day";
        $city_query = "SELECT * FROM tbl_cities WHERE city_id = '" . $main_app['city'] . "'";
        $city_run = mysqli_query($con, $city_query);
        if (mysqli_num_rows($city_run) > 0) {
            $city_name = mysqli_fetch_assoc($city_run);
        }

?>
        <section class="internship_track_1">
            <div class="container">
                <div class="row">
                    <div class="heading">
                        <h1>Track Progress</h1>
                        <a href="./program_option.php">Apply For New Program <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                    <div class="col-md-3">
                        <div class="progress_category">
                            <div class="heading">
                                <h1 class="active-btn click_btn" onclick="ontablink(event,'box1')" style="cursor: pointer;">
                                    <a href="#box1"> Your Dashboard</a>
                                </h1>
                                <i onclick="ontablink(event,'box1')" style="cursor: pointer;" class="fa-regular fa-user active-btn"></i>
                            </div>
                            <?php
                            $sql = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run) > 0) {
                                foreach ($sql_run as $data) {
                                    $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                    $program_query_run = mysqli_query($con, $program_query);
                                    if (mysqli_num_rows($program_query_run) > 0) {
                                        $programs = mysqli_fetch_assoc($program_query_run);

                            ?>
                                        <div class="nav_btn toggle_btn mt-3 active_toggle_content">
                                            <p><?= $programs['program_name'] ?></p>
                                            <p class="plus"><i class="fa-solid fa-plus"></i></p>
                                            <p class="minus"><i class="fa-solid fa-minus "></i></p>
                                        </div>
                                        <div class="progress_list toggle_content">
                                            <ul>
                                                <li id="event" class="click_btn" onclick="ontablink(event,'box2<?= $programs['program_id'] ?>')"> <span class="arrow_icon"><i class="fa-solid fa-angle-right"></i></span>Course Materials</li>

                                                <li class="click_btn" onclick="ontablink(event,'box3<?= $programs['program_id'] ?>')"> <span class="arrow_icon"> <i class="fa-solid fa-angle-right"></i></span>Grades</li>

                                                <li class="click_btn" onclick="ontablink(event,'box4<?= $programs['program_id'] ?>')"> <span class="arrow_icon"><i class="fa-solid fa-angle-right"></i></span>Course Info</li>
                                            </ul>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="overview change_box active-tab" id="box1">
                            <?php
                            $sql = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc limit 1";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run) > 0) {
                                foreach ($sql_run as $data) {
                                    $timestamp = strtotime($data['created_at']);
                                    $day = date('d', $timestamp);
                                    $month = date('M', $timestamp);
                                    $month_number = date('m', $timestamp);
                                    $year = date('Y', $timestamp);
                                    $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                    $program_query_run = mysqli_query($con, $program_query);
                                    if (mysqli_num_rows($program_query_run) > 0) {
                                        $programs = mysqli_fetch_assoc($program_query_run);
                            ?>
                                        <div class="main-box">
                                            <div class="heading">
                                                <div class="row flex-change">
                                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="name_text">
                                                            <h1><?= $data['name'] ?> <?= $data['last_name'] ?></h1>
                                                            <p><?= $city_name['city_name'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="img">
                                                            <img src="./admin/student_application_photo/<?= $data['profile_photo'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="program_name">
                                                <p> Program | <?= $programs['program_name'] ?></p>
                                            </div>
                                            <div class="progress_box">
                                                <div class="main_bar">
                                                    <?php
                                                    // Dynamic data from the database
                                                    $startDate =   "$year-$month_number-$day";
                                                    $durationMonths = $main_app['duration'];

                                                    // Calculate the end date based on the start date and duration
                                                    $endDate = date('Y-m-d', strtotime($startDate . ' + ' . $durationMonths . ' months'));

                                                    // Calculate the progress percentage
                                                    $currentDate = date('Y-m-d');

                                                    $progressPercentage = round((strtotime($currentDate) - strtotime($startDate)) / (strtotime($endDate) - strtotime($startDate)) * 100, 2);
                                                    ?>
                                                    <div class="progress_bar">
                                                        <div class="bar" style="width: <?php if ($progressPercentage >= 100) {
                                                                                            echo "100%";
                                                                                        } else {
                                                                                            echo $progressPercentage . "%";
                                                                                        } ?>;"></div>
                                                    </div>
                                                    <p class=""><?php if ($progressPercentage >= 100) {
                                                                    echo "complete";
                                                                } else {
                                                                    echo $progressPercentage . "%";
                                                                } ?></p>
                                                </div>
                                                <p>Overall Progress</p>
                                            </div>
                                            <div class="progress_area">
                                                <p>Current Percentage: </p>
                                                <?php
                                                $grade_query = "SELECT * FROM internship_grade_tbl WHERE app_id = '$app_id' order by grade_id desc limit 1";
                                                $grade_query_run = mysqli_query($con, $grade_query);
                                                $total_percentage = 0;
                                                $total_grades = 0;

                                                if (mysqli_num_rows($grade_query_run) > 0) {
                                                    foreach ($grade_query_run as $grade) {
                                                        if ($grade['grade_percent'] != '') {
                                                            $total_percentage += $grade['grade_percent'];
                                                            $total_grades++;
                                                        }
                                                    }
                                                }
                                                $average_percentage = ($total_grades > 0) ? ($total_percentage / $total_grades) : 0;
                                                ?>
                                                <p><?= number_format($average_percentage, 1) ?>%</p>
                                            </div>
                                            <div class="progress_area">
                                                <p>Mentor Grading:</p>
                                                <p><?php if ($grade['mentor_grading'] != '') {
                                                        echo $grade['mentor_grading'];
                                                    } else {
                                                        echo '0';
                                                    } ?>/10</p>
                                            </div>
                                            <div class="progress_area">
                                                <p>Milestone Completed:</p>
                                                <p><?php if ($grade['milestone_completed'] != '') {
                                                        echo $grade['milestone_completed'];
                                                    } else {
                                                        echo '0';
                                                    } ?>/8</p>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <?php
                            $sql = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run) > 0) {
                                foreach ($sql_run as $data) {
                                    $timestamp = strtotime($data['created_at']);
                                    $day = date('d', $timestamp);
                                    $month = date('M', $timestamp);
                                    $month_number = date('m', $timestamp);
                                    $year = date('Y', $timestamp);
                                    $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                    $program_query_run = mysqli_query($con, $program_query);
                                    if (mysqli_num_rows($program_query_run) > 0) {
                                        $programs = mysqli_fetch_assoc($program_query_run);
                                        $startDate =   "$year-$month_number-$day";
                                        $durationMonths = $main_app['duration'];
                                        // Calculate the end date based on the start date and duration
                                        $endDate = date('Y-m-d', strtotime($startDate . ' + ' . $durationMonths . ' months'));
                                        // Calculate the progress percentage
                                        $currentDate = date('Y-m-d');
                                        $progressPercentage1 = round((strtotime($currentDate) - strtotime($startDate)) / (strtotime($endDate) - strtotime($startDate)) * 100, 2);



                                        //for show overall percent
                                        $grade_query = "SELECT * FROM internship_grade_tbl WHERE app_id = '" . $data['id'] . "'";
                                        $grade_query_run = mysqli_query($con, $grade_query);
                                        $total_percentage = 0;
                                        $total_grades = 0;

                                        if (mysqli_num_rows($grade_query_run) > 0) {
                                            foreach ($grade_query_run as $grade) {
                                                if ($grade['grade_percent'] != '') {
                                                    $total_percentage += $grade['grade_percent'];
                                                    $total_grades++;
                                                }
                                            }
                                        }
                                        $average_percentage = ($total_grades > 0) ? ($total_percentage / $total_grades) : 0;
                            ?>
                                        <div class="down-box">
                                            <div class="program_progress">
                                                <p>Program | <?= $programs['program_name'] ?></p>
                                                <p><?= number_format($average_percentage, 1) ?>%</p>
                                            </div>
                                            <div class="program_status">
                                                <p>Program Completion Status:</p>
                                                <?php
                                                if ($progressPercentage1 >= 100) {
                                                ?>
                                                    <p>Completed</p>
                                                <?php
                                                } else {
                                                    echo "<p style='color:#BB5327'>Process</p>";
                                                }
                                                ?>
                                            </div>
                                            <?php
                                            if ($progressPercentage1 >= 100) {
                                            ?>
                                                <div class="complete_btn">
                                                    <button>Download Certificate</button>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>

                        <?php
                        $sql = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            foreach ($sql_run as $data) {
                                $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                $program_query_run = mysqli_query($con, $program_query);
                                if (mysqli_num_rows($program_query_run) > 0) {
                                    $programs = mysqli_fetch_assoc($program_query_run);

                        ?>
                                    <div class="course_materials change_box" id="box2<?= $programs['program_id'] ?>">
                                        <div class="main-box">
                                            <div class="heading">
                                                <p>Program | <?= $programs['program_name'] ?> | Course Materials</p>
                                            </div>
                                            <div class="courses">
                                                <?php
                                                $material_query = "SELECT * FROM internship_course_material_tbl WHERE material_status = 1 And program = '" . $data['course'] . "'";
                                                $material_query_run = mysqli_query($con, $material_query);
                                                if (mysqli_num_rows($material_query_run) > 0) {
                                                    foreach ($material_query_run as $material) {
                                                        $count = 1;
                                                ?>
                                                        <div class="course">
                                                            <p>File <?= $count++ ?> | <?= $material['material_name'] ?></p>
                                                            <a href="./admin/course_material_files/<?= $material['material'] ?>" target="_blank"><img src="./assets/images/download.png" alt=""></a>
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                    echo "Not Found";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                        <?php
                        $sql = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            foreach ($sql_run as $data) {
                                $timestamp = strtotime($data['created_at']);
                                $day = date('d', $timestamp);
                                $month = date('M', $timestamp);
                                $month_number = date('m', $timestamp);
                                $year = date('Y', $timestamp);
                                $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                $program_query_run = mysqli_query($con, $program_query);
                                if (mysqli_num_rows($program_query_run) > 0) {
                                    $programs = mysqli_fetch_assoc($program_query_run);
                                    $startDate =   "$year-$month_number-$day";
                                    $durationMonths = $main_app['duration'];

                                    // Calculate the end date based on the start date and duration
                                    $endDate = date('Y-m-d', strtotime($startDate . ' + ' . $durationMonths . ' months'));

                                    // Calculate the progress percentage
                                    $currentDate = date('Y-m-d');

                                    $progressPercentage = round((strtotime($currentDate) - strtotime($startDate)) / (strtotime($endDate) - strtotime($startDate)) * 100, 2);

                        ?>
                                    <div class="grade change_box" id="box3<?= $programs['program_id'] ?>">
                                        <div class="main-box">
                                            <div class="heading">
                                                <p>Program | <?= $programs['program_name'] ?>| Grades</p>
                                            </div>
                                            <div class="main-grade">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <p>Item</p>
                                                            </th>
                                                            <th>
                                                                <p>Status</p>
                                                            </th>
                                                            <th>
                                                                <p>Weight</p>
                                                            </th>
                                                            <th>
                                                                <p>Grade</p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $grade_query = "SELECT * FROM internship_grade_tbl WHERE app_id = '" . $data['id'] . "'";
                                                        $grade_query_run = mysqli_query($con, $grade_query);
                                                        $month_count = 1;
                                                        $total_percentage = 0;
                                                        $total_grades = 0;
                                                        if (mysqli_num_rows($grade_query_run) > 0) {
                                                            foreach ($grade_query_run as $grade) {
                                                                if ($grade['grade_percent'] != '') {
                                                                    $total_percentage += $grade['grade_percent'];
                                                                    $total_grades++;
                                                                }
                                                        ?>
                                                                <tr class="table_row">
                                                                    <td>
                                                                        <p>Month <?= $month_count++ ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p><?php if ($grade['grade_status_main'] == 2) {
                                                                                echo "Due";
                                                                            } elseif ($grade['grade_status_main'] == 1) {
                                                                                echo "Complete";
                                                                            } else {
                                                                                echo "--";
                                                                            } ?></p>
                                                                    </td>

                                                                    <td>
                                                                        <p><?php if ($grade['grade_weight'] != '') {
                                                                                echo $grade['grade_weight'];
                                                                                echo "%";
                                                                            } else {
                                                                                echo "--";
                                                                            } ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p><?php if ($grade['grade_percent'] != '') {
                                                                                echo $grade['grade_percent'];
                                                                                echo "%";
                                                                            } else {
                                                                                echo "--";
                                                                            } ?></p>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        $average_percentage = ($total_grades > 0) ? ($total_percentage / $total_grades) : 0;
                                                        ?>

                                                        <tr id="mentor_grades" style="border-top: 2px solid #BB5327;border-bottom: 0;">
                                                            <td class="padding">
                                                                <p>Mentor Grades</p>
                                                            </td>
                                                            <td class="padding">
                                                                <p>
                                                                <p><?php if ($grade['grade_status_main'] == 1) {
                                                                        echo 'Complete';
                                                                    } else {
                                                                        echo "Due";
                                                                    } ?></p>
                                                                </p>
                                                            </td>
                                                            <td class="padding">
                                                                <p>20%</p>
                                                            </td>
                                                            <td class="padding" id="show_percent">
                                                                <p><?= number_format($average_percentage, 2) ?>%</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="mentor_grades" style="border-top: 2px solid #BB5327;border-bottom: 0;">
                                                            <td class="padding">
                                                                <p>Total Grades</p>
                                                            </td>
                                                            <td class="padding" style="color: #D9C618;">
                                                                <?php
                                                                if ($progressPercentage >= 100) {
                                                                    echo "<p style='color:green;'>Complete</p>";
                                                                } else {
                                                                    echo "<p>In-Process</p>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="padding">
                                                                <p>100%</p>
                                                            </td>
                                                            <td class="padding">
                                                                <p><?= number_format($average_percentage, 2) ?>%</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                        <?php
                        $sql = "SELECT * FROM application_tbl WHERE email = '$email' order by created_at desc";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            foreach ($sql_run as $data) {
                                $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                $program_query_run = mysqli_query($con, $program_query);
                                if (mysqli_num_rows($program_query_run) > 0) {
                                    $programs = mysqli_fetch_assoc($program_query_run);

                        ?>
                                    <div class="course_info change_box" id="box4<?= $programs['program_id'] ?>">
                                        <div class="main-box">
                                            <div class="heading">
                                                <p>Program | <?= $programs['program_name'] ?> | Course Info</p>
                                            </div>
                                            <div class="course_info_box">
                                                <div class="title">
                                                    <p> <span>Course Title:</span> <?= $programs['program_name'] ?> (<?= $data['duration'] ?> Months)</p>
                                                </div>
                                                <?php
                                                $info_query = "SELECT * FROM internship_course_info_tbl WHERE info_status = 1 And program = '" . $data['course'] . "'";
                                                $info_query_run = mysqli_query($con, $info_query);
                                                if (mysqli_num_rows($info_query_run) > 0) {
                                                    foreach ($info_query_run as $info_name) {
                                                ?>
                                                        <?= $info_name['course_info'] ?>
                                                <?php
                                                    }
                                                } else {
                                                    echo "Wil provide Soon";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-3">
                        <div class="right_box">
                            <div class="schedule">
                                <h1>Schedule</h1>
                                <p><i class="fa-solid fa-location-dot"></i> Started at: Started at: <span><?= $show_day ?> <?= $show_month ?> <?= $show_year ?></span> </p>
                                <p> <img src="./assets/images/Certificate.png" alt=""> Estimated End Date: <span><?= $end_date = date('d-M-Y', strtotime($show_start_date . ' + ' . $show_duration . ' months')); ?></span> </p>
                            </div>
                            <div class="modal fade" id="request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="internship_request_from">
                                                <h1 style="font-size: 1.8rem; font-weight:700; line-height:40px; color:#BB5327">Write us a message.</h1>
                                                <p style="font-size: 0.9rem; font-weight:400; line-height:20px;">Tell us what you want to learn or if you have any questions. We're here to help !</p>
                                                <input type="hidden" class="request_id" name="request_id">
                                                <textarea class="form-control" name="message" cols="30" rows="5"></textarea>
                                                <button type="submit" id="request_btn" style="font-weight:600; background-color: #BB5327; color:#fff; padding:0.7rem 1.1rem; border:0;" class="my-3">OK</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom_text">
                                <h1>Your Learning, Your Way!</h1>
                                <p>Tell us what you want to learn or if </p>
                                <p>you have any questions.</p>
                                <p>We're here to help !</p>
                                <button value="<?= $app_id ?>" href="#!" class="request_btn">Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else {
        ?>
        <div class="text" style="text-align: center;padding:4rem;height:50vh">
            <h1>Apply for the program</h1>
            <a href="./application_1.php" style="text-decoration: none; color:#BB5327; font-size:1.5rem;font-weight:600">fill an application</a>
        </div>
        <?php
    }
    ?>
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
    <script>
        let tab_btns = document.getElementsByClassName("click_btn");
        let tab_boxes = document.getElementsByClassName("change_box");

        function ontablink(event, tab_name) {
            for (tab_btn of tab_btns) {
                tab_btn.classList.remove("active-btn");
                tab_btn.classList.remove("active-icon");
            }

            for (tab_box of tab_boxes) {
                tab_box.style.opacity = 0; // Set opacity to 0 for all tab contents
            }

            // Wait for a short period before showing the new tab content
            setTimeout(function() {
                for (tab_box of tab_boxes) {
                    tab_box.classList.remove("active-tab");
                    tab_box.style.paddingTop = ""; // Reset padding
                }

                let targetBox = document.getElementById(tab_name);
                targetBox.classList.add("active-tab");
                targetBox.style.opacity = 1; // Fade in the new tab content

                // Add padding to the top of the targetBox
                targetBox.style.paddingTop = "8rem";

                // Scroll to the targetBox smoothly
                targetBox.scrollIntoView({
                    behavior: "smooth"
                });
            }, 100); // Adjust the duration as needed

            event.currentTarget.classList.add("active-icon");
        }
    </script>


    <script>
        $(document).ready(function() {
            $('.request_btn').click(function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                // console.log(user_id);
                $('.request_id').val(user_id);
                $('#request_modal').modal('show');
            });
        });
    </script>
<?php require('./includes/end_html.php');
} ?>