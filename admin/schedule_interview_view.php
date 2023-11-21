<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM schedule_interview_tbl WHERE id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> schedule interview view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./schedule_interview.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-3">
                    <label>Name</label>
                    <?php if ($row['name'] != '') : ?>
                        <p><?= $row['name'] ?></p>
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
                    <label>Unique ID</label>
                    <?php if ($row['unique_id'] != '') : ?>
                    <p><?= $row['unique_id'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Date</label>
                    <?php if ($row['date'] != '') : ?>
                    <p><?= $row['date'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>time</label>
                    <?php if ($row['time'] != '') : ?>
                    <p><?= $row['time'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Position</label>
                    <?php if ($row['position'] != '') : ?>
                    <p><?= $row['position'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
              
                <div class="col-md-3">
                    <label>Interview Status</label>
                    <?php if ($row['interview_status']!= '') : ?>
                    <p><?php if($row['interview_status'] == 1){
                        echo "Done";
                    } else{
                        echo "pending";
                    }
                    ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <label>Message</label>
                    <?php if ($row['message']!= '') : ?>
                    <p><?= $row['message'] ?></p>
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