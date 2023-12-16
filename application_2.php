<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');

if (!isset($_SESSION['std_auth']) || $_SESSION['std_auth'] !== true) {
    echo '<script>window.location.href = "index.php";</script>';
    exit(); // Stop further execution
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<section class="application_1">
    <div class="container">
        <div class="row">
            <div class="col-md-6  d-flex align-items-center justify-content-center">
                <div class="img_area">
                  <img src="./assets/images/application_img_2.png" alt="">
                </div>
            </div>
            <div class="col-md-6 app-click2">
                <form class="formID2" id="app_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="text">
                        <div class="heading">
                            <h1>Application</h1>
                            <p>Candidate Application Form</p>
                            <div class="step_text">
                                <p class="m-0"><span>Step 1 >> Step 2 >> </span>  Step 3 >> Step 4</p>
                                <p>Basic Details</p>
                            </div>
                        </div>
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
                        <div class="color_line">
                            <p></p>
                        </div>
                        <input type="text" placeholder="College Name*" name="college">
                        <select name="degree">
                            <option value="">Select Degree</option>
                            <option value="1">BCA</option>
                            <option value="2">MCA</option>
                            <option value="3">B-Tech</option>
                        </select>
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