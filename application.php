<?php
// if (!isset($_SESSION['std_auth_user']['user_email']) && !$_SESSION['std_auth_user']['user_email']) {
//     $_SESSION['message'] = "Please Login first to access this page";
//     header('Location:./index.php');
//     exit();
// }
require('./includes/header.php');
require('./admin/config/dbcon.php');

?>
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
            <div class="col-md-6 p-0 app-click">
                <form class="formID" id="app_form" enctype="multipart/form-data">
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
                                <input type="radio" value="male" checked="checked" name="gender">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio_box"><span class="gender_name">Female</span>
                                <input type="radio" value="female" name="gender">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio_box"><span class="gender_name">Other</span>
                                <input type="radio" value="other" name="gender">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <input type="text" placeholder="Date of birth*" onfocus="(this.type='date')" name="dob">
                        <input type="text" placeholder="Mobile Number*"  maxlength="10"  onkeypress="return event.charCode>=48 && event.charCode<=57" name="phone">
                        <input type="email" placeholder="E-mail Address*" name="email">
                        <div class="permanent_address">
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Permanent Address</p>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" placeholder="Street Address Line 1" name="address1">
                                    <input type="text" placeholder="Street Address Line 2" name="address2">
                                    <div class="flex-box">
                                        <select name="country" id="country">
                                            <option value="">Select country</option>
                                            <?php
                                            $sql_country = "SELECT * FROM tbl_countries ORDER BY country_name ASC";
                                            $sql_country_run = mysqli_query($con, $sql_country);
                                            if (mysqli_num_rows($sql_country_run) > 0) {
                                                foreach ($sql_country_run as $country) {
                                            ?>
                                                    <option value="<?= $country['country_id'] ?>"><?= $country['country_name'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <select name="state" id="state">
                                        </select>
                                    </div>
                                    <div class="flex-box">
                                        <select name="city" id="city">
                                            
                                        </select>
                                        <input type="text" maxlength="6"  onkeypress="return event.charCode>=48 && event.charCode<=57"  placeholder="Postal Code" name="pin_code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" placeholder="College Name*" name="college">
                        <select name="degree">
                            <option value="">Select Degree</option>
                            <option value="1">BCA</option>
                            <option value="2">MCA</option>
                            <option value="3">B-Tech</option>
                        </select>
                        <select name="course">
                            <option value="">Select Course </option>
                        <?php
                        $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                        $sql_run = mysqli_query($con , $sql);
                        if(mysqli_num_rows($sql_run) > 0){
                            foreach($sql_run as $data){
                                ?>
                                <option value="<?=$data['program_id']?>"><?=$data['program_name']?></option>
                                <?php
                            }
                        }
                        ?>
                        </select>
                        <select name="find">
                            <option value="">Where you got to know about us?</option>
                            <option value="1">From Friend</option>
                            <option value="2">From Instagram</option>
                        </select>
                        <input type="text" placeholder="Referral Code" name="referral_code">
                        <div class="wrapper d-flex justify-content-between ">
                            <label for="fileInput1" class="d-flex justify-content-between w-100 align-items-center">
                                <p id="fileNameDisplay1" class="text-start m-0">Candidate Passport Size Photo</p>
                                <input type="file" name="photo" class="input_box" id="fileInput1" onchange="checkFileSize(this)" hidden>
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
                                    <input type="file" name="payment_ss" class="p-0 m-0" id="fileInput2" onchange="checkFileSize(this)" hidden>
                                    <i class="fa-solid fa-paperclip"></i>
                                </label>
                            </div>
                            <p>Review your selections and information. Click the "Apply" button to complete your
                                application process.</p>
                            <button type="submit" name="apply">Apply</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<?php
require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>

<script>
    function checkFileSize(input) {
        const fileInput = input;
        const inputId = fileInput.id;
        const idNumber = inputId.match(/\d+/)[0]; // Extract the number from the input ID
        const fileSizeMessage = document.getElementById(`fileNameDisplay${idNumber}`);
        const maxSizeInBytes = 1024 * 1024; // 1 MB (you can change this to your desired maximum file size)

        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files[0].size;

            if (fileSize > maxSizeInBytes) {
                fileSizeMessage.innerHTML = ` <span style="color:red;">File size is too large. Please select a smaller file.</span> `;
                fileInput.value = ""; // Clear the file input
            } else {
                fileSizeMessage.innerHTML = `<span style="color:#BB5327;"> Selected file: <b> ${fileInput.files[0].name} </b> </span>`;
            }
        }
    }
</script>


<?php require('./includes/end_html.php');
?>