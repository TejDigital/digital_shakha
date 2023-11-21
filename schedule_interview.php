<?php require('./includes/header.php'); ?>
<section class="schedule_1">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0">
            <div class="col-md-8 p-0 m-0">
                <div class="text_area">
                    <form class="interview_form" id="interview_form">
                        <div class="heading">
                            <h1>Schedule Interview</h1>
                            <p>Welcome to the interview scheduling portal. Please follow the steps below to select your interview dates and fill in all the required information.</p>
                        </div>
                        <div class="box">
                            <p>Is this interview ready to be scheduled? Please indicate your confirmation.</p>
                            <div class="btn-box">
                                <button>YES</button>
                                <button>NO</button>
                            </div>
                        </div>
                        <div class="box">
                            <p>Enter the unique confirmation code you received in your email, post Application:</p>
                            <input type="text" name="unique_id" placeholder="Enter Code here">
                        </div>
                        <div class="box">
                            <p>When do you want your interview to be conducted? Select a date</p>
                            <div class="date-time-box">
                                <div class="date">
                                    <div class="wrapper">
                                        <header>
                                            <input type="hidden" name="date" value="" id="date">
                                            <p class="current-date" id="selected-date-display"></p>
                                            <div class="icons">
                                                <span id="prev" class="material-symbols-rounded"></span>
                                                <span id="next" class="material-symbols-rounded"></span>
                                            </div>
                                        </header>
                                        <div class="calendar">
                                            <ul class="weeks">
                                                <li>Sun</li>
                                                <li>Mon</li>
                                                <li>Tue</li>
                                                <li>Wed</li>
                                                <li>Thu</li>
                                                <li>Fri</li>
                                                <li>Sat</li>
                                            </ul>
                                            <ul class="days"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="time">
                                    <p>Schedule at ( Time )</p>
                                    <div class="time_box">
                                        <label class="radio_box">
                                            <input type="radio" name="time" value="9:30 AM">
                                            <span>9:30 AM</span>
                                        </label>
                                        <label class="radio_box">
                                            <input type="radio" name="time" value="11:20 AM">
                                            <span>11:30 AM</span>
                                        </label>
                                        <label class="radio_box">
                                            <input type="radio" name="time" value="3:00 PM">
                                            <span>3:00 PM</span>
                                        </label>
                                        <label class="radio_box">
                                            <input type="radio" name="time" value="6:30 PM">
                                            <span>6:30 PM</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <input type="text" name="name" placeholder="Full Name">
                            <input type="email" name="email" placeholder="E-mail Address">
                            <input type="text" name="phone" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Phone Number">
                            <select name="position" >
                                <option value="">Select the position that you applied for</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <textarea name="message"  cols="30" rows="5" placeholder="Additional Comments"></textarea>
                        </div>
                        <div class="box">
                            <p>Review your selections and information. Click the "Submit" button to confirm your interview schedule.</p>
                            <button type="submit" name="submit" class="s_btn">Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 p-0 m-0">
                <div class="img_area">
                    <img src="./assets/images/schedule_1.png" alt="">
                    <img src="./assets/images/schedule_2.png" alt="">
                    <img src="./assets/images/schedule_3.png" alt="">
                    <img src="./assets/images/schedule_4.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<?php require('./includes/end_html.php'); ?>