<?php require('./includes/header.php'); 
if (!isset($_SESSION['std_auth']) || $_SESSION['std_auth'] !== true) {
    echo '<script>window.location.href = "index.php";</script>';
    exit(); // Stop further execution
}
?>
<section class="internship_track_1">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h1>Track Progress</h1>
                <a href="#!">Apply For New Program <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </div>
            <div class="col-md-3">
                <div class="progress_category">
                    <div class="heading">
                        <p>UX UI Designer</p>
                        <div class="progress_list">
                            <ul>
                                <li class="click_btn active-btn active-icon" onclick="ontablink(event,'box1')"> <span class="arrow_icon"><i class="fa-solid fa-angle-right" ></i></span> Overview</li>

                                <li class="click_btn" onclick="ontablink(event,'box2')" id="event"> <span class="arrow_icon"><i class="fa-solid fa-angle-right"></i></span>Course Materials</li>
                                <li class="click_btn" onclick="ontablink(event,'box3')"> <span class="arrow_icon"> <i class="fa-solid fa-angle-right"></i></span>Grades</li>
                                <li class="click_btn" onclick="ontablink(event,'box4')"> <span class="arrow_icon"><i class="fa-solid fa-angle-right"></i></span>Course Info</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="overview change_box active-tab" id="box1">
                    <div class="main-box">
                        <div class="heading">
                            <div class="row flex-change">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="name_text">
                                        <h1>Saurabh Deshmukh</h1>
                                        <p>Bhilai </p>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="img">
                                        <img src="./assets/images/internship_track_profile.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="program_name">
                            <p> Program | UX UI Design</p>
                        </div>
                        <div class="progress_box">
                            <div class="main_bar">
                                <div class="progress_bar">
                                    <div class="bar"></div>
                                </div>
                                <p class="">60% </p>
                            </div>
                            <p>Overall Progress</p>
                        </div>
                        <div class="progress_area">
                            <p>Current Percentage: </p>
                            <p>89%</p>
                        </div>
                        <div class="progress_area">
                            <p>Mentor Grading:</p>
                            <p>8/10</p>
                        </div>
                        <div class="progress_area">
                            <p>Milestone Completed:</p>
                            <p>4/8</p>
                        </div>
                    </div>
                    <div class="down-box">
                        <div class="program_progress">
                            <p>Program | Web Development</p>
                            <p>89%</p>
                        </div>
                        <div class="program_status">
                            <p>Program Completion Status:</p>
                            <p>Completed</p>
                        </div>
                        <div class="complete_btn">
                            <button>Download Certificate</button>
                        </div>
                    </div>
                </div>
                <div class="course_materials change_box" id="box2">
                    <div class="main-box">
                        <div class="heading">
                            <p>Program | UX UI Design | Course Materials</p>
                        </div>
                        <div class="courses">
                            <div class="course">
                                <p>File 1 | UX UI Design</p>
                                <a href="#!"><img src="./assets/images/download.png" alt=""></a>
                            </div>
                            <div class="course">
                                <p>File 2 | UX UI Design</p>
                                <a href="#!"><img src="./assets/images/download.png" alt=""></a>
                            </div>
                            <div class="course">
                                <p>File 3 | UX UI Design</p>
                                <a href="#!"><img src="./assets/images/download.png" alt=""></a>
                            </div>
                            <div class="course">
                                <p>File 4 | UX UI Design</p>
                                <a href="#!"><img src="./assets/images/download.png" alt=""></a>
                            </div>
                            <div class="course">
                                <p>File 5 | UX UI Design</p>
                                <a href="#!"><img src="./assets/images/download.png" alt=""></a>
                            </div>
                            <div class="course">
                                <p>File 6 | UX UI Design</p>
                                <a href="#!"><img src="./assets/images/download.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grade change_box" id="box3">
                    <div class="main-box">
                        <div class="heading">
                            <p>Program | UX UI Design | Grades</p>
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
                                    <tr>
                                        <td>
                                            <p>Month 1 Basics</p>
                                        </td>
                                        <td>
                                            <p>Completed</p>
                                        </td>
                                        <td>
                                            <p>20%</p>
                                        </td>
                                        <td>
                                            <p>78%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Month 2</p>
                                        </td>
                                        <td>
                                            <p>Completed</p>
                                        </td>
                                        <td>
                                            <p>20%</p>
                                        </td>
                                        <td>
                                            <p>78%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Month 3</p>
                                        </td>
                                        <td>
                                            <p>Completed</p>
                                        </td>
                                        <td>
                                            <p>20%</p>
                                        </td>
                                        <td>
                                            <p>78%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Month 4</p>
                                        </td>
                                        <td>
                                            <p>Due</p>
                                        </td>
                                        <td>
                                            <p>20%</p>
                                        </td>
                                        <td>
                                            <p>--</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Month 5</p>
                                        </td>
                                        <td>
                                            <p>--</p>
                                        </td>
                                        <td>
                                            <p>20%</p>
                                        </td>
                                        <td>
                                            <p>--</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Month 6</p>
                                        </td>
                                        <td>
                                            <p>--</p>
                                        </td>
                                        <td>
                                            <p>20%</p>
                                        </td>
                                        <td>
                                            <p>--</p>
                                        </td>
                                    </tr>
                                    <tr id="mentor_grades" style="border-top: 2px solid #BB5327;border-bottom: 0;">
                                        <td class="padding">
                                            <p>Mentor Grades</p>
                                        </td>
                                        <td class="padding">
                                            <p>Due</p>
                                        </td>
                                        <td class="padding">
                                            <p>20%</p>
                                        </td>
                                        <td class="padding">
                                            <p>78%</p>
                                        </td>
                                    </tr>
                                    <tr class="mentor_grades" style="border-top: 2px solid #BB5327;border-bottom: 0;">
                                        <td class="padding">
                                            <p>Total Grades</p>
                                        </td>
                                        <td class="padding" style="color: #D9C618;">
                                            <p>In-Process</p>
                                        </td>
                                        <td class="padding">
                                            <p>100%</p>
                                        </td>
                                        <td class="padding">
                                            <p>--</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="course_info change_box" id="box4">
                    <div class="main-box">
                        <div class="heading">
                            <p>Program | UX UI Design | Course Info</p>
                        </div>
                        <div class="course_info_box">
                            <div class="title">
                                <p> <span>Course Title:</span> UX UI Design Program (6 Months)</p>
                            </div>
                            <div class="overview">
                                <p>Overview:</p>
                                <p> DigitalShakha's UX UI Design Program is a comprehensive 6-month course designed to equip you with the skills and knowledge needed to excel in the field of User Experience (UX) and User Interface (UI) design. This program offers a deep dive into the principles, tools, and practices required to create seamless and visually appealing digital experiences.</p>
                            </div>
                            <div class="courses">
                                <p>Course Highlights:</p>
                                <ul>
                                    <li>
                                        <p><span>Duration:</span> 6 months of intensive learning.</p>
                                    </li>
                                    <li>
                                        <p><span>Instructors:</span> Learn from industry experts with extensive experience in UX UI design.</p>
                                    </li>
                                    <li>
                                        <p><span>Curriculum:</span> A well-structured curriculum covering the fundamentals of UX UI design, including user research, wireframing, prototyping, and design principles.</p>
                                    </li>
                                    <li>
                                        <p><span>Practical Projects:</span> Gain hands-on experience by working on real-world projects, enhancing your design portfolio.</p>
                                    </li>
                                    <li>
                                        <p><span>Tool Proficiency:</span> Become proficient in industry-standard design tools such as Adobe XD, Figma, and Sketch.</p>
                                    </li>
                                    <li>
                                        <p><span>Portfolio Development:</span> Craft an impressive design portfolio to showcase your skills to potential employers.</p>
                                    </li>
                                    <li>
                                        <p><span>Career Support:</span> Benefit from career guidance, job placement assistance, and networking opportunities.</p>
                                    </li>
                                    <li>
                                        <p><span>Certification:</span> Upon successful completion, receive a certificate recognized in the industry.</p>
                                    </li>
                                </ul>

                            </div>
                            <div class="courses">
                                <p>Course Structure: </p>
                                <ul>
                                    <li>
                                        <p><span>Fundamentals of UX UI Design:</span> Understand the core principles, methodologies, and best practices.</p>
                                    </li>
                                    <li>
                                        <p><span>User Research:</span> Learn how to conduct user research to inform your design decisions.</p>
                                    </li>
                                    <li>
                                        <p><span>Wireframing and Prototyping:</span> Create wireframes and interactive prototypes for user testing.</p>
                                    </li>
                                    <li>
                                        <p><span>Visual Design:</span> Develop a keen eye for aesthetics and UI design elements.</p>
                                    </li>
                                    <li>
                                        <p><span>Design Tools:</span> Master design software and tools for efficient design work.</p>
                                    </li>
                                    <li>
                                        <p><span>Project Work:</span> Apply your knowledge in real-world projects to build a professional portfolio.</p>
                                    </li>
                                    <li>
                                        <p><span>Career Development:</span> Receive guidance on job hunting, interview preparation, and industry networking.</p>
                                    </li>
                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="right_box">
                    <div class="schedule">
                        <h1>Schedule</h1>
                        <p><i class="fa-solid fa-location-dot"></i> Started at: Started at: </p>
                        <p> <img src="./assets/images/Certificate.png" alt=""> Estimated End Date: <span>12 AUG 2023</span> </p>
                    </div>
                    <div class="bottom_text">
                        <h1>Your Learning, Your Way!</h1>
                        <p>Tell us what you want to learn or if </p>
                        <p>you have any questions.</p>
                        <p>We're here to help !</p>
                        <a href="#!">Request</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
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
            }

            document.getElementById(tab_name).classList.add("active-tab");
            document.getElementById(tab_name).style.opacity = 1; // Fade in the new tab content
        }, 100); // Adjust the duration as needed
        event.currentTarget.classList.add("active-icon");
    }
</script>
<?php require('./includes/end_html.php'); ?>