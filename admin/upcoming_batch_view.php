<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM upcoming_batch_tbl WHERE batch_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Batch view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./upcoming_batches.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-4">
                    <label>Batch Name</label>
                    <?php
                    $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run)) {
                        foreach ($sql_run as $data) {
                    ?>
                            <?php if ($row['batch_name'] != '') : ?>
                                <?php if ($row['batch_name'] == $data['program_id']) : ?>
                                    <p><?= $data['program_name'] ?></p>
                                <?php endif ?>
                            <?php else : ?>
                                <p>Not Found</p>
                            <?php endif ?>
                    <?php
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4">
                    <label>Mode</label>
                    <?php if ($row['batch_mode'] != '') : ?>
                        <p><?= $row['batch_mode'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Availability</label>
                    <?php if ($row['availability'] != '') : ?>
                        <?php if ($row['availability'] == 1) : ?>
                            <p><?= "Available" ?></p>
                        <?php else : ?>
                            <p><?= "Batch Full" ?></p>
                        <?php endif ?>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Date</label>
                    <?php if ($row['batch_date'] != '') : ?>
                        <p><?= $row['batch_date'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Start time</label>
                    <?php if ($row['batch_start_time'] != '') : ?>
                        <p><?= $row['batch_start_time'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>End time</label>
                    <?php if ($row['batch_end_time'] != '') : ?>
                        <p><?= $row['batch_end_time'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>

                <div class="col-md-4">
                    <label>Address</label>
                    <?php if ($row['batch_address'] != '') : ?>
                        <p><?= $row['batch_address'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>

                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['batch_status'] != '') : ?>
                        <p><?php if ($row['batch_status'] == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?></p>
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