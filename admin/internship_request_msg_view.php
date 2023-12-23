<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM internship_request_msg_tbl left join application_tbl on  internship_request_msg_tbl.app_id = application_tbl.id  WHERE request_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
        $course = $row['course'];
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Request view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_track_request_msg.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
            <div class="col-md-4">
                    <label>Student Name</label>
                    <?php if ($row['name'] != '') : ?>
                        <p><?= $row['name'] ?> <?= $row['last_name'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Course Name</label>
                    <?php
                    $sql = "SELECT * FROM program_tbl WHERE program_id = '$course'";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run)) {
                        $data = mysqli_fetch_assoc($sql_run);
                    ?>
                        <p><?= $data['program_name'] ?></p>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <label>Email</label>
                    <?php if ($row['email'] != '') : ?>
                        <p><?= $row['email'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>phone</label>
                    <?php if ($row['phone'] != '') : ?>
                        <p><?= $row['phone'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['request_status'] != '') : ?>
                        <p><?php if ($row['request_status'] == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12 my-3">
                    <label>Message</label>
                    <?php if ($row['request_msg'] != '') : ?>
                        <p><?= $row['request_msg'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
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