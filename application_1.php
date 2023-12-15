<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');

if (!isset($_SESSION['std_auth']) || $_SESSION['std_auth'] !== true) {
    echo '<script>window.location.href = "index.php";</script>';
    exit(); // Stop further execution
}

?>
<section class="application_1">
    <div class="container">
        <div class="row m-0">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="img_area">
                    <img src="./assets/images/application_img_1.png" alt="">
                </div>
            </div>
            <div class="col-md-6 app-click">
                <form class="formID" id="app_form" enctype="multipart/form-data">
                    <div class="text">
                        <div class="heading">
                            <h1>Application</h1>
                            <p>Candidate Application Form</p>
                            <div class="step_text">
                                <p class="m-0"><span>Step 1</span> >> Step 2 >> Step 3 >> Step 4</p>
                                <p>Basic Details</p>
                            </div>
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
                        <div class="wrapper d-flex justify-content-between ">
                            <label for="fileInput1" class="d-flex justify-content-between w-100 align-items-center">
                                <p id="fileNameDisplay1" class="text-start m-0">Candidate Passport Size Photo</p>
                                <input type="file" name="photo" class="input_box" id="fileInput1" onchange="checkFileSize(this)" hidden>
                                <i class="fa-solid fa-paperclip"></i>
                            </label>
                        </div>

                    </div>
                    <div class="btn_area">
                        <button type="submit" name="apply">Save & Next</button>
                        <p>Review your selections and information. Click the "Save & Next" button to save the details filled and move forward with your application process.</p>
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