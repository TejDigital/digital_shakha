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
                    <img src="./assets/images/application_img_4.png" alt="">
                </div>
            </div>
            <div class="col-md-6 app-click4">
                <form class="formID4" id="app_form4" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id?>">
                    <div class="text">
                        <div class="heading">
                            <h1>Application</h1>
                            <p>Candidate Application Form</p>
                            <div class="step_text">
                                <p class="m-0"><span>Step 1 >> Step 2 >> Step 3 >> Step 4 </span> </p>
                                <p>Basic Details</p>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="img">
                                <img src="./assets/images/qr 1.png" alt="">
                            </div>
                            <div class="wrapper d-flex justify-content-between ">
                                <label for="fileInput2" class="d-flex justify-content-between w-100 align-items-center file-label">
                                    <p id="fileNameDisplay2" class="text-start m-0">Upload Payment Screenshot</p>
                                    <input type="file" name="payment_ss" class="input_box" id="fileInput2" onchange="checkFileSize(this)" >
                                    <i class="fa-solid fa-paperclip"></i>
                                </label>
                            </div>
                        </div>
                        <label id="fileInput2-error" class="error error-message" for="fileInput2"></label>
                        <input type="text" placeholder="Transaction ID*" name="transaction_code">

                        <div class="btn_area">
                            <button type="submit" id="app_submit_btn" name="apply">Finish</button>
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