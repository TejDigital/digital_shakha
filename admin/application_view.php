<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM application_tbl left join program_tbl on application_tbl.course = program_tbl.program_id WHERE id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Application view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./application.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-3 mb-3">
                    <label>Profile Photo</label>
                    <?php if ($row['profile_photo'] != '') : ?>
                        <img src="./student_application_photo/<?= $row['profile_photo'] ?>" style="width: 70%; height:200px;" alt="">
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif; ?>
                </div>

                <div class="col-md-3">
                    <label>Name</label>
                    <?php if ($row['name'] != '') : ?>
                        <p><?= $row['name'] ?> <?= $row['last_name'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>

                <div class="col-md-3">
                    <label>Email</label>
                    <?php if ($row['email'] != '') : ?>
                        <p><?= $row['email'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Phone</label>
                    <?php if ($row['phone'] != '') : ?>
                    <p><?= $row['phone'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Gender</label>
                    <?php if ($row['gender'] != '') : ?>
                    <p><?= $row['gender'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Date of birth</label>
                    <?php if ($row['dob'] != '') : ?>
                    <p><?= $row['dob'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Collage</label>
                    <?php if ($row['collage'] != '') : ?>
                    <p><?= $row['collage'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Degree</label>
                    <?php if ($row['degree'] != '') : ?>
                    <p><?= $row['degree'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Selected Course</label>
                    <?php if ($row['course'] != '') : ?>
                    <p><?php if($row['course'] == $row['program_id']){echo $row['program_name'];}?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Where you got to know about us?</label>
                    <?php if ($row['know_about_as'] != '') : ?>
                    <p><?= $row['know_about_as'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Referral Code</label>
                    <?php if ($row['referral_code']!= '') : ?>
                    <p><?= $row['referral_code'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Payment Status</label>
                    <?php if ($row['payment_status']!= '') : ?>
                    <p><?php if($row['payment_status'] == 1){
                        echo " Done";
                    }else{
                        echo "Pending";
                    }
                    ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <h3>Address</h3>
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <label>Address 1</label>
                            <?php if ($row['address_1']!= '') : ?>
                            <p><?= $row['address_1'] ?></p>
                            <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                        </div>
                        <div class="col-md-6 my-3">
                            <label>Address 2</label>
                            <?php if ($row['address_2']!= '') : ?>
                            <p><?= $row['address_2'] ?></p>
                            <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <label> City</label>
                            <?php if ($row['city']!= '') : ?>
                            <p><?= $row['city'] ?></p>
                            <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <label>Postal Code</label>
                            <?php if ($row['pin_code']!= '') : ?>
                            <p><?= $row['pin_code'] ?></p>
                            <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <label>State</label>
                            <?php if ($row['state']!= '') : ?>
                            <p><?= $row['state'] ?></p>
                            <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <label>Country</label>
                            <?php if ($row['country']!= '') : ?>
                            <p><?= $row['country'] ?></p>
                            <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
?>
<?php
require('./includes/script.php');
?>