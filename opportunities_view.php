<?php require('./includes/header.php');
require('./admin/config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM opportunities_tbl WHERE opp_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>
<div class="modal fade" id="opportunities_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="heading">
                        <h1>Request a Callback</h1>
                        <p>Get personalised advice and responses to your questions 🙂</p>
                    </div>
                    <div class="form">
                        <form class="opportunities_request" id="opportunities_request" enctype="multipart/form-data">
                            <input type="hidden" name="opportunities_id" class="opportunities_id">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Name" name="name" class="input_area">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Number" name="phone" class="input_area" >
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email Address" name="email" class="input_area" >
                                </div>
                                <div class="col-md-6">
                                    <div class="wrapper d-flex justify-content-between ">
                                        <label for="fileInput1" class="d-flex justify-content-between w-100 align-items-center file-label" >
                                            <p id="fileNameDisplay1" class="text-start m-0">Attach CV or Resume</p>
                                            <input type="file" accept=".png , .jpg , .png , .jpeg , .pdf , .doc , .docx" name="image" class="input_box" id="fileInput1" onchange="checkFileSize(this)" >
                                            <i class="fa-solid fa-paperclip"></i>
                                        </label>
                                    </div>
                                    <label id="fileInput1-error" class="error error-message" for="fileInput1"></label>
                                </div>
                                <div class="btn_area">
                                    <button type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="end_text">
                        <p>By submitting this form, you agree to our privacy policy and consent to DigitalShakha contacting you for the purpose of addressing your query or providing assistance.</p>

                        <p>We look forward to connecting with you and providing the support you need. Your success is our priority.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="opportunities_view_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="nav_box">
                    <a href="./index.php"><img src="./assets/images/home.svg">Home<i class="fa-solid fa-angle-right"></i></a>
                    <a href="./opportunities.php">opportunities<i class="fa-solid fa-angle-right"></i></a>
                    <p class="m-0">Open Opportunities</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="opportunities_view_2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="heading">
                    <h1><?= $row['opp_name'] ?></h1>
                </div>
                <div class="text">
                    <?= $row['opp_description'] ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text">
                    <div class="btn_area">
                        <button class="opportunities_btn" value="<?= $row['opp_id'] ?>">Apply for this opening</button>
                    </div>
                    <div class="link_area">
                        <p>Share it to a friend:</p>
                        <a href="#!"><img src="./assets/images/link-2.svg" alt=""></a>
                        <a href="#!"><img src="./assets/images/Vector.svg" alt=""></a>
                        <a href="#!"><img src="./assets/images/linkedin.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<script>
    $(document).ready(function() {
        $('.opportunities_btn').click(function(e) {
            e.preventDefault();
            var val_id = $(this).val();
            $('.opportunities_id').val(val_id);
            $('#opportunities_modal').modal('show');
        });
    });
</script>
<script>
    function checkFileSize(input) {
        const fileInput = input;
        const inputId = fileInput.id;
        const idNumber = inputId.match(/\d+/)[0]; // Extract the number from the input ID
        const fileSizeMessage = document.getElementById(`fileNameDisplay${idNumber}`);
        const maxSizeInBytes = 1024 * 1024 * 3; // 1 MB (you can change this to your desired maximum file size)

        if (fileInput.files.length > 0) {
            const fileSize = fileInput.files[0].size;

            if (fileSize > maxSizeInBytes) {
                fileSizeMessage.innerHTML = ` <span style="color:red;">File size is too large. Please select a smaller file.</span> `;
                fileInput.value = ""; // Clear the file input
            } else {
                fileSizeMessage.innerHTML = `<span style=" font-size:0.7rem;color:#BB5327;"><b > ${fileInput.files[0].name} </b> </span>`;
            }
        }
    }
</script>
<?php require('./includes/end_html.php'); ?>