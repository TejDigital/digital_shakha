<?php require('./includes/header.php'); ?>
<section class="application_1">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0">
            <div class="col-md-6 p-0">
                <div class="img_area">
                    <img src="./assets/images/application_bg_1.png" alt="">
                    <img src="./assets/images/application_bg_2.png" alt="">
                    <img src="./assets/images/application_bg_3.png" alt="">
                </div>
            </div>
            <div class="col-md-6 p-0">
                <div class="text">
                    <div class="heading">
                        <h1>Application</h1>
                        <p>Candidate Application Form</p>
                    </div>
                    <input type="text" name="first_name" placeholder="First Name*">
                    <input type="text" name="last_name" placeholder="Last Name*">
                    <div class="check">
                        <p class="">Gender</p>
                        <label class="radio_box"><span class="gender_name">Male</span>
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio_box"><span class="gender_name">Female</span>
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio_box"><span class="gender_name">Other</span>
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <input type="date">
                    <input type="text" placeholder="Mobile Number*">
                    <input type="text" placeholder="E-mail Address*">
                    <div class="permanent_address">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Permanent Address</p>
                            </div>
                            <div class="col-md-7">
                                <input type="text" placeholder="Street Address Line 1">
                                <input type="text" placeholder="Street Address Line 2">
                                <div class="flex-box">
                                    <input type="text" placeholder="Postal Code">
                                    <input type="text" placeholder="City">
                                </div>
                                <div class="flex-box">
                                    <input type="text" placeholder="State">
                                    <input type="text" placeholder="Country">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" placeholder="College Name*">
                    <input type="text" placeholder="Degree Specialization*">
                    <select name="" id="">
                        <option value="">Select Course </option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                    <select name="" id="">
                        <option value="">Where you got to know about us?</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                    <input type="text" placeholder="Referral Code">
                    <div class="wrapper d-flex justify-content-between ">
                        <label for="fileInput1" class="d-flex justify-content-between w-100 align-items-center">
                            <p id="fileNameDisplay1" class="text-start m-0">Candidate Passport Size Photo</p>
                            <input type="file" name="offer_letter" class="input_box" id="fileInput1" hidden>
                            <i class="fa-solid fa-paperclip"></i>
                        </label>
                    </div>

                    <div class="payment">
                        <div class="img">
                            <img src="./assets/images/qr 1.png" alt="">
                        </div>
                        <div class="wrapper d-flex justify-content-between ">
                        <label for="fileInput2" class="d-flex justify-content-between w-100 align-items-center">
                            <p id="fileNameDisplay2" class="text-start m-0">Upload Payment Screenshot</p>
                            <input type="file" name="offer_letter" class="input_box" id="fileInput2" hidden>
                            <i class="fa-solid fa-paperclip"></i>
                        </label>
                    </div>
                        <p>Review your selections and information. Click the "Apply" button to complete your
                            application process.</p>
                        <a href="#!">Apply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<script>
    const fileInput1 = document.getElementById('fileInput1');
    const fileNameDisplay1 = document.getElementById('fileNameDisplay1');

    fileInput1.addEventListener('change', function() {
        const selectedFile1 = fileInput1.files[0];

        if (selectedFile1) {
            fileNameDisplay1.textContent = `Selected file: 
            ${selectedFile1.name}`;
        } else {
            fileNameDisplay1.textContent = '';
        }
    });

    const fileInput2 = document.getElementById('fileInput2');
    const fileNameDisplay2 = document.getElementById('fileNameDisplay2');

    fileInput2.addEventListener('change', function() {
        const selectedFile2 = fileInput2.files[0];

        if (selectedFile2) {
            fileNameDisplay2.textContent = `Selected file: 
            ${selectedFile2.name}`;
        } else {
            fileNameDisplay2.textContent = '';
        }
    });
</script>
<?php require('./includes/end_html.php');
?>