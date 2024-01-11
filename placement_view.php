<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_id = '$id'";
    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);

        $pace_id = $row['placement_id'];

        $timestamp1 = strtotime($row['placement_date']);
        $day1 = date('d', $timestamp1);
        $month1 = date('M', $timestamp1);

        $timestamp2 = strtotime($row['placement_date_deadline']);
        $day2 = date('d', $timestamp2);
        $month2 = date('M', $timestamp2);
    }
}
?>
<section class="place_view_1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 left-main">
                <div class="heading">
                    <a href="./seasonal_placements.php">Placement <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <h1><?= $row['placement_name'] ?></h1>
                    <p>Application Opens: <b><?= $day1 ?> <?=$month1?></b></p>
                    <p>Application Deadline: <span><?= $day2 ?> <?=$month2?></span></p>
                </div>
                <div class="modal fade" id="placement_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
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
                                        <form class="placement_request" id="placement_request" enctype="multipart/form-data">
                                            <input type="hidden" name="placement_id" class="placement_id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Name" name="name" class="input_area">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Number" name="phone" class="input_area">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" placeholder="Email Address" name="email" class="input_area">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="wrapper d-flex justify-content-between ">
                                                        <label for="fileInput1" class="d-flex justify-content-between w-100 align-items-center file-label">
                                                            <p id="fileNameDisplay1" class="text-start m-0">Attach CV or Resume</p>
                                                            <input type="file" accept=".png , .jpg , .png , .jpeg , .pdf , .doc , .docx" name="image" class="input_box" id="fileInput1" onchange="checkFileSize(this)">
                                                            <i class="fa-solid fa-paperclip"></i>
                                                        </label>
                                                    </div>
                                                    <label id="fileInput1-error" class="error error-message" for="fileInput1"></label>
                                                </div>
                                                <div class="btn_area">
                                                    <button type="submit" id="submitBtm">Submit</button>
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
                <div class="des">
                    <p><?= $row['placement_description'] ?></p>
                    <a href="./program_option.php">Explore Programs <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <button class="placement_btn" value="<?= $pace_id ?>">Apply Now</button>
                </div>
            </div>
            <div class="col-md-5 img_area">
                <div class="img">
                    <img src="./assets/images/place_view_bg_1.png" alt="">
                </div>
            </div>
            <div class="col-md-3 category_main">
                <div class="category">
                    <ul>
                        <li>
                            <h2>Category</h2>
                        </li>
                        <li><a href="#!">placement</a></li>
                        <?php
                        $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_status = 1";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            foreach ($sql_run as $data) {
                        ?>
                                <li><a href="./placement_view.php?id=<?= $data['placement_id'] ?>"><?= $data['placement_name'] ?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<script>
    $(document).ready(function() {
        $('.placement_btn').click(function(e) {
            e.preventDefault();
            var val_id = $(this).val();
            $('.placement_id').val(val_id);
            $('#placement_modal').modal('show');
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