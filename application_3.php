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
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="img_area">
                    <img src="./assets/images/application_img_3.png" alt="">
                </div>
            </div>
            <div class="col-md-6 app-click3">
                <form class="formID3" id="app_form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id?>">
                    <div class="text">
                        <div class="heading">
                            <h1>Application</h1>
                            <p>Candidate Application Form</p>
                            <div class="step_text">
                                <p class="m-0"><span>Step 1 >> Step 2 >> Step 3 </span> >> Step 4</p>
                                <p>Basic Details</p>
                            </div>
                        </div>
                        <select name="course" required>
                            <option value="">Select Course </option>
                            <?php
                            $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run) > 0) {
                                foreach ($sql_run as $data) {
                            ?>
                                    <option value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <select name="duration" required>
                            <option value="">Select Duration*</option>
                            <option value="4">4 month</option>
                            <option value="6">6 month</option>
                        </select>
                        <select name="find" required>
                            <option value="">Where you got to know about us?</option>
                            <option value="1">From Friend</option>
                            <option value="2">From Instagram</option>
                        </select>
                        <input type="text" placeholder="Referral Code" name="referral_code" required>
                       

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