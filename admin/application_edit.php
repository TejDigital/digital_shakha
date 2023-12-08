<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM application_tbl WHERE id = '$id'";
    // $sql = "SELECT * FROM application_tbl inner join tbl_states on application_tbl.state=tbl_states.state_id inner join tbl_countries  on application_tbl.country = tbl_countries.country_id inner join tbl_cities on application_tbl.city =  tbl_cities.city_id  WHERE application_tbl.id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Application Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./application.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./application_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                <div class="text">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" value="<?= $row['name'] ?>" class="form-control mb-2" placeholder="First Name*">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" value="<?= $row['last_name'] ?>" class="form-control mb-2" placeholder="Last Name*">
                    <div class="check">
                        <p class="">Gender</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="male" name="gender" id="flexRadioDefault1" <?php if ($row["gender"] == "male") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadioDefault2" <?php if ($row["gender"] == "female") {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="other" name="gender" id="flexRadioDefault3" <?php if ($row["gender"] == "female") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexRadioDefault3">
                                Other
                            </label>
                        </div>
                    </div>
                    <label for="">Date of birth</label>
                    <input type="date" class="form-control mb-2" value="<?= $row['dob'] ?>" placeholder="Date of birth*" name="dob">
                    <label for="">Phone</label>
                    <input type="text" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control mb-2" value="<?= $row['phone'] ?>" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Mobile Number*" name="phone">
                    <label for="">Email</label>
                    <input type="email" class="form-control mb-2" value="<?= $row['email'] ?>" placeholder="E-mail Address*" name="email">
                    <div class="permanent_address">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Permanent Address</p>
                            </div>
                            <div class="col-md-7">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control mb-2" value="<?= $row['address_1'] ?>" placeholder="Street Address Line 1" name="address1">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control mb-2" value="<?= $row['address_2'] ?>" placeholder="Street Address Line 2" name="address2">
                                <div class="flex-box">
                                    <!-- <input type="text" class="form-control mb-2" value="<?= $row['country'] ?>" placeholder="Country" name="country"> -->
                                    <label for="">Country</label>
                                    <select name="country" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                        <?php
                                        $sql_country = "SELECT * from tbl_countries";
                                        $sql_country_run = mysqli_query($con, $sql_country);
                                        if (mysqli_num_rows($sql_country_run) > 0) {
                                            foreach ($sql_country_run as $country) {
                                        ?>
                                                <option <?php
                                                        if ($row['country'] == $country['country_id']) {
                                                            echo "selected"; 
                                                        }
                                                        ?> value="<?= $country['country_id']?>"><?= $country['country_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <!-- <input type="text" class="form-control mb-2" value="<?= $row['state'] ?>" placeholder="State" name="state"> -->
                                    <label for="">State</label>
                                    <select name="state" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                        <?php
                                        $sql_state = "SELECT * from tbl_states";
                                        $sql_state_run = mysqli_query($con, $sql_state);
                                        if (mysqli_num_rows($sql_state_run) > 0) {
                                            foreach ($sql_state_run as $state) {
                                        ?>
                                                <option <?php
                                                        if ($row['state'] == $state['state_id']) {
                                                            echo "selected"; 
                                                        }
                                                        ?> value="<?= $state['state_id']?>"><?= $state['state_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="flex-box">
                                    <!-- <input type="text" class="form-control mb-2" value="<?= $row['city'] ?>" placeholder="City" name="city"> -->
                                    <label for="">City</label>
                                    <select name="city" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                        <?php
                                        $sql_city = "SELECT * from tbl_cities";
                                        $sql_city_run = mysqli_query($con, $sql_city);
                                        if (mysqli_num_rows($sql_city_run) > 0) {
                                            foreach ($sql_city_run as $city) {
                                        ?>
                                                <option <?php
                                                        if ($row['state'] == $city['city_id']) {
                                                            echo "selected"; 
                                                        }
                                                        ?> value="<?= $city['city_id']?>"><?= $city['city_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="">Pin Code</label>
                                    <input type="text" maxlength="6" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control mb-2" value="<?= $row['pin_code'] ?>" placeholder="Postal Code" name="pin_code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="">Collage</label>
                    <input type="text" class="form-control mb-2" value="<?= $row['collage'] ?>" placeholder="College Name*" name="college">
                    <!-- <input type="text" class="form-control mb-2 " value="<?= $row['degree'] ?>" placeholder="Degree Specialization*" name="degree"> -->
                    <label for="">Degree</label>
                    <select name="degree" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option value="">Select Degree</option>
                            <option value="1">BCA</option>
                            <option value="2">MCA</option>
                            <option value="3">B-Tech</option>
                        </select>
                    <label for="">Course</label>
                    <select name="course" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                    <?php
                                        $sql = "SELECT * from program_tbl WHERE program_status = 1";
                                        $sql_run = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($sql_run) > 0) {
                                            foreach ($sql_run as $data) {
                                        ?>
                                                <option <?php
                                                        if ($row['course'] == $data['program_id']) {
                                                            echo "selected"; 
                                                        }
                                                        ?> value="<?= $data['program_id']?>"><?= $data['program_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                    </select>
                    <label for="">Where you got to know about us?</label>
                    <select name="find" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                        <option value="From Friend<">From Friend</option>
                        <option value="From Instagram">From Instagram</option>
                    </select>
                    <label for="">Payment status</label>
                    <select name="payment_status" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                        <option <?php if ($row['payment_status'] == 1) {
                                    echo "selected";
                                } ?> value="1">Done</option>
                        <option <?php if ($row['payment_status'] == 0) {
                                    echo "selected";
                                } ?> value="0">Pending</option>
                    </select>
                    <label for="">Referral code</label>
                    <input type="text" class="form-control mb-2" value="<?= $row['referral_code'] ?>" placeholder="Referral Code" name="referral_code">
                    <div class="row">
                        <input type="hidden" value="<?= $row['profile_photo'] ?>" name="old_photo">
                        <input type="hidden" value="<?= $row['payment_photo'] ?>" name="old_payment_ss">
                        <div class="col-md-6">
                            <img src="./student_application_photo/<?= $row['profile_photo'] ?>" style="width: 200px; height:100%" class="my-2" alt="">
                            <div class="wrapper d-flex justify-content-between ">
                                <label for="fileInput1" class="d-flex justify-content-between w-100 align-items-center form-control">
                                    <p id="fileNameDisplay1" class="text-start m-0">Candidate Passport Size Photo</p>
                                    <input type="file" name="photo" class="input_box" id="fileInput1" onchange="checkFileSize(this)" hidden>
                                    <i class="fa-solid fa-paperclip"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="./student_application_payment_ss/<?= $row['payment_photo'] ?>" style="width: 200px; height:100%" class="my-2" alt="">
                            <div class="wrapper d-flex justify-content-between ">
                                <label for="fileInput2" class="d-flex justify-content-between w-100 align-items-center form-control">
                                    <p id="fileNameDisplay2" class="text-start m-0">Upload Payment Screenshot</p>
                                    <input type="file" name="payment_ss" class="p-0 m-0" id="fileInput2" onchange="checkFileSize(this)" hidden>
                                    <i class="fa-solid fa-paperclip"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning" style="margin-top: 5rem;" name="app_update">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
?>
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
<?php
require('./includes/script.php');
?>