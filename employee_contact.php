<?php require('./includes/header.php'); ?>
<section class="employee_contact_1">
    <div class="container-fluid p-0 m-0">
        <div class="row p-0 m-0">
            <div class="col-md-6 p-0 m-0">
                <div class="img">
                    <img src="./assets/images/employee_content.png" alt="">
                </div>
            </div>
            <div class="col-md-6 p-0 m-0">
                <div class="text">
                    <div class="heading">
                        <h1>Partnership Inquiry</h1>
                        <p> Let's Connect</p>
                    </div>
                    <p>Thank you for expressing interest in partnering with DigitalShakha. To better understand your organization and explore potential collaboration opportunities, please provide the following details:</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="employee_contact_2">
    <div class="container">
        <div class="heading">
            <h1>Organization Information</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input_box">
                    <input type="text" placeholder="Organization Name" class="input_area" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input_box">
                    <input type="text" placeholder="Industry/Field" class="input_area" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input_box">
                    <input type="text" placeholder="Organization Website (if applicable)" class="input_area" required>
                </div>
            </div>
        </div>
        <div class="heading">
            <h1>Contact Information</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="input_box">
                    <input type="text" placeholder="Your Full Name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="input_area" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input_box">
                    <input type="text" placeholder="Your Position/Title" class="input_area" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input_box">
                    <input type="Email" placeholder="Email Address" class="input_area" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input_box">
                    <input type="text" onkeypress="return event.charCode>=48 && event.charCode<=57" maxlength="10" placeholder="Phone Number" class="input_area" required>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="heading">
                    <h1>Partnership Details</h1>
                </div>
                <div class="col-md-12">
                    <div class="input_box2">
                        <select class="input_area" required>
                            <option value="">Type of Partnership Interest</option>
                            <option value="Educational Programs">Educational Programs</option>
                            <option value="Skill Development Initiatives">Skill Development Initiatives</option>
                            <option value="Joint Events and Workshops">Joint Events and Workshops</option>
                            <option value="Other (Please Specify)">Other (Please Specify)</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="input_box2">
                            <textarea name="" id="" cols="30" rows="5" class="input_area" placeholder="Briefly Describe Your Organization's Goals and Values" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="heading">
                    <h1>Partnership Details</h1>
                </div>
                <div class="col-md-12">
                    <div class="input_box2">
                        <select class="input_area" required>
                            <option value="">Type of Partnership Interest</option>
                            <option value="Online Search">Online Search</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Referral">Referral</option>
                            <option value="Other (Please Specify)">Other (Please Specify)</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="input_box2">
                            <textarea name="" id="" cols="30" rows="5" class="input_area" placeholder="Any Specific Questions or Information You Would Like to Share" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input_box2">
                            <input type="checkbox" class="checkbox" required>
                            <p>By submitting this form, you agree to allow DigitalShakha to contact you regarding your partnership inquiry. Rest assured, your information will be handled with confidentiality and used exclusively for communication purposes.</p>
                        </div>
                    </div>
                    <div class="btn_area">
                        <button>Submit Your Inquiry</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <div class="img">
                    <img src="./assets//images/employee_content_2.png" alt="">
                </div>
            </div>
        </div>
</section>
<section class="employee_contact_3">
    <div class="container">
        <div class="heading">
            <h1>Alternatively, Contact Us Directly</h1>
            <p>If you prefer direct communication or have urgent inquiries, please feel free to reach out to us via email or phone</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <p>MAIL US</p>
                    <p><a href="#!">hr.digitalshakha@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p>CALL US</p>
                    <p><a href="#!">info.digitalshakha@gmail.com</a></p>
                </div>
            </div>
        </div>
        <div class="text">
            <p>Thank you for taking the time to complete our Partnership Inquiry Form. Our team will review your information and reach out to you shortly to discuss potential collaboration opportunities. We appreciate your interest in partnering with DigitalShakha.</p>
        </div>
        <div class="row end_text">
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
<?php require('./includes/end_html.php'); ?>